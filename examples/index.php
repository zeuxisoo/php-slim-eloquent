<?php
date_default_timezone_set('Asia/Hong_Kong');

// Load autoloader
require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';

// Load model without autoloader
require_once dirname(__FILE__).'/Models/User.php';

// Import slim framework and user model
use Slim\Slim;
use Models\User;

// Read database config
$config = require('config.php');

// Boot application
$app = new Slim();
$app->config('databases', $config['databases']);
$app->add(new Zeuxisoo\Laravel\Database\Eloquent\ModelMiddleware);
$app->get('/', function() use ($app) {
    $connectionDefault     = $app->db->getConnection();
    $connectionDefaultUser = $connectionDefault->table('user')->find(1);

    $connectionTesting     = $app->db->getConnection('testing');
    $connectionTestingUser = $connectionTesting->table('user')->find(1);

    $modelDefaultUser = User::find(1);
    $modelTestingUser = User::on('testing')->find(1);

    $paginateUser = User::paginate();

    echo "<h3>Connection (Default)</h3>";
    foreach($connectionDefaultUser as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }

    echo "<hr>";

    echo "<h3>Connection (Testing)</h3>";
    foreach($connectionTestingUser as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }

    echo "<hr>";

    echo "<h3>Model (Default)</h3>";
    foreach($modelDefaultUser->getAttributes() as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }

    echo "<hr>";

    echo "<h3>Model (Testing)</h3>";
    foreach($modelTestingUser->getAttributes() as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }

    echo "<hr>";

    echo "<h3>Paginate</h3>";
    echo "<pre>";
    print_r($paginateUser->toArray());
    echo "</pre>";
});
$app->run();
