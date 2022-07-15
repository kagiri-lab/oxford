<?php


require_once __DIR__ . '/../vendor/autoload.php';

use app\routes\API;
use app\routes\Dashboard;
use app\routes\Migrate;
use app\routes\Web;

use kilyte\Application;

$app = new Application(dirname(__DIR__));

// $app->on(Application::EVENT_BEFORE_REQUEST, function () {
//     // echo "Before request from second installation";
// });

$webroutes = new Web($app);
$apiroutes = new API($app);
$dashboard = new Dashboard($app);
$migration = new Migrate($app);

$app->run();
