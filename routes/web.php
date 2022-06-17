<?php

use Illuminate\Support\Facades\Route;
use GIDIX\PushNotifier\SDK\PushNotifier;
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

    $status = $content['status'];

    unset($content['status']);

    return view('welcome', [
        'status' => $status,
        'healths' => $content,
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
