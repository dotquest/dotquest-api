<?php

use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\APC;

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
    return view('welcome');
});

Route::get('/metrics', function () {

    $clientGuzz = new \GuzzleHttp\Client();

    $response = $clientGuzz->request('GET', "http://localhost:8080/fpm-status?json");
    $content = json_decode(str_replace(" ", "", $response->getBody()));


    $adapter = new APC();
    $registry = new CollectorRegistry($adapter);
    $renderer = new RenderTextFormat();

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'accepted_connections_total', '', ['type']);
    $gauge->set($content->acceptedconn, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'active_processes', '', ['type']);
    $gauge->set($content->activeprocesses, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'idle_processes', '', ['type']);
    $gauge->set($content->idleprocesses, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'listen_queue', '', ['type']);
    $gauge->set($content->listenqueue, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'listen_queue_length', '', ['type']);
    $gauge->set($content->listenqueuelen, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'max_active_processes', '', ['type']);
    $gauge->set($content->maxactiveprocesses, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'max_children_reached', '', ['type']);
    $gauge->set($content->maxchildrenreached, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'max_listen_queue', '', ['type']);
    $gauge->set($content->maxlistenqueue, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'slow_requests', '', ['type']);
    $gauge->set($content->slowrequests, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'start_time_seconds', '', ['type']);
    $gauge->set($content->starttime, ['php-fpm']);

    $gauge = $registry->getOrRegisterGauge('php_fpm', 'total_processes', '', ['type']);
    $gauge->set($content->totalprocesses, ['php-fpm']);

    $result = $renderer->render($registry->getMetricFamilySamples());

    header('Content-type: ' . RenderTextFormat::MIME_TYPE);
    return $result;
});
