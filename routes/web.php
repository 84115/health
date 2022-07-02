<?php

use Illuminate\Support\Facades\Route;
use GIDIX\PushNotifier\SDK\PushNotifier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use UKFast\HealthCheck\Controllers\HealthCheckController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $controller = new HealthCheckController;
    $response = $controller->__invoke(app());
    $content = json_decode($response->content(), true);

    // if (Cache::has('content')) {
    //     $content = Cache::get('content');
    // } else {
    //     $content = json_decode($response->content(), true);

    //     Cache::forever('content', $content);
    // }

    $status = $content['status'];

    unset($content['status']);

    $content = collect($content)
        ->map(fn ($value, $key) => [
            'label' => $key,
            'status' => $value['status'],
        ]) // Do this since groupBy removes string indexes
        ->groupBy(fn ($value, $key) => Str::before($key, '-'));

    // dd($content);

    return view('welcome', [
        'status' => $status,
        'groups' => $content,
    ]);
});

// /notify/james-ball.co.uk/Debug/hello%20world
Route::get('/notify/{domain}/{source}/{message}', function ($domain, $source, $message) {
    $source = urldecode($source);
    $message = urldecode($message);
    $domain = "https://$domain";

    $pushNotifier = new PushNotifier([
        'api_token' => env('PUSHNOTIFIERDE_API_TOKEN'),
        'package' => env('PUSHNOTIFIERDE_API_PACKAGE'),
    ]);

    $pushNotifier->login(env('PUSHNOTIFIERDE_USERNAME'), env('PUSHNOTIFIERDE_PASSWORD'), true);

    $devices = $pushNotifier->getDevices();

    $pushNotifier->sendNotification($devices, "$source - {$message}", $domain);
});
