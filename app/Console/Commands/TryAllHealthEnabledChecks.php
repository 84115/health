<?php

namespace App\Console\Commands;

use GIDIX\PushNotifier\SDK\PushNotifier;
use Illuminate\Console\Command;

class TryAllHealthEnabledChecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health:try-all-enabled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tries all enabled HealthChecks and sends to Pushnotifier.de which fail.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $config = config('healthcheck');

        $pushNotifier = new PushNotifier([
            'api_token' => env('PUSHNOTIFIERDE_API_TOKEN'),
            'package' => env('PUSHNOTIFIERDE_API_PACKAGE'),
        ]);

        $login = $pushNotifier->login(env('PUSHNOTIFIERDE_USERNAME'), env('PUSHNOTIFIERDE_PASSWORD'), true);
    
        $devices = $pushNotifier->getDevices();

        foreach ($config['checks'] as $check) {
            $class = new $check;

            if ($class->status()->isProblem()) {
                $pushNotifier->sendNotification($devices, $class->name, $class->domain ?? 'http://dev.james-ball.co.uk');
            }
        }

        return 0;
    }
}
