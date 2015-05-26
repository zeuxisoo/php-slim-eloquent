<?php
require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';

use Slim\Slim;

$app = new Slim();
$app->add(new Zeuxisoo\Laravel\Database\Eloquent\ModelMiddleware);
$app->get('/', function() use ($app) {
    echo "This is a test";
});
$app->run();
