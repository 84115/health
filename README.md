## Middleware

You can register custom middleware to run on requests to the `/health` endpoint. You can add this to the middleware array in the `config/healthcheck.php` config file you created using the config above, as shown in the example below:

```php
/**
 * A list of middleware to run on the health-check route
 * It's recommended that you have a middleware that only
 * allows admin consumers to see the endpoint.
 *
 * See UKFast\HealthCheck\BasicAuth for a one-size-fits all
 * solution
 */
'middleware' => [
    App\Http\Middleware\CustomMiddleware::class
],
```

Now your `CustomMiddleware` middleware will be ran on every request to the `/health` endpoint.

Out of the box, the health check package provides:

 * BasicAuth - Requires that basic auth credentials be sent in order to see full status
 * AddHeaders - Adds X-check-status headers to the response, so you can avoid having to parse JSON

### Checks

##### Scheduler Health Check

The scheduler health check works by using a time limited cache key on your project every minute. You will need to register the
CacheSchedulerRunning command to run every minute in your projects `Kernel.php`.

You can customise the cache key and length of time in minutes before the scheduler not running will trigger an error.

```php
$schedule->command(CacheSchedulerRunning::class)->everyMinute();
```

## Creating your own health checks

It's very simple to create your own health checks.

In this example, we'll create a health check for Redis.

You first need to create your health-check class, you can put this inside `App\HealthChecks`.
In this case, the class would be `App\HealthChecks\RedisHealthCheck`

Every health check needs to extend the base `HealthCheck` class and implement a `status()` method. You should also set the `$name` property for display purposes.

```php
<?php

namespace App\HealthChecks;

use UKFast\HealthCheck\HealthCheck;

class RedisHealthCheck extends HealthCheck
{
    protected $name = 'my-fancy-redis-check';

    public function status()
    {
        return $this->okay();
    }
}
```

Now we've got our basic class setup, we can add it to the list of checks to run in our `config/healthcheck.php` file.

Open up `config/healthcheck.php` and go to the `'checks'` array. Add your class to the list of those checks:

```php
'checks' => [
    // ...
    App\HealthChecks\RedisHealthCheck::class,
]
```

If you hit the `/health` endpoint now, you'll see that there's a `my-fancy-redis-check` property and it should return `OK` for the status.

We can now go about actually implementing the check properly.

Go back to the `status()` method in the `RedisHealthCheck` class.

Add in the following code:

```php
public function status()
{
    try {
        Redis::ping();
    } catch (Exception $e) {
        return $this->problem('Failed to connect to redis', [
            'exception' => $this->exceptionContext($e),
        ]);
    }

    return $this->okay();
}
```

You'll need to import the following at the top as well

```php
use Illuminate\Support\Facades\Redis;
use UKFast\HealthCheck\HealthCheck;
use Exception;
```

Finally, hit the `/health` endpoint, depending on if your app can actually hit Redis, you'll see the status of Redis. If it's still returning `OK` try changing `REDIS_HOST` to something that doesn't exist to trip the error.


## Licence

This project is licenced under the MIT Licence (MIT). Please see the [Licence](LICENCE) file for more information.