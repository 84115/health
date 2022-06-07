<?php

use Illuminate\Support\Facades\Route;
use \UKFast\HealthCheck\Controllers\HealthCheckController;

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
    // $domain = 'http://health.james-ball.co.uk/health';
    // $json = json_decode(file_get_contents($domain), true);
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
