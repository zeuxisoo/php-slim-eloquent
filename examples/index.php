<?php
require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';
require_once dirname(__FILE__).'/Models/User.php';

use Slim\Slim;
use Models\User;

$app = new Slim();
$app->add(new Zeuxisoo\Laravel\Database\Eloquent\ModelMiddleware);
$app->get('/', function() use ($app) {
    $connection     = $app->db->getConnection();
    $connectionUser = $connection->table('user')->find(1);

    $modelUser = User::find(1);

    echo "<h3>Connection</h3>";
    foreach($connectionUser as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }
    echo "<hr>";
    echo "<h3>Model</h3>";
    foreach($modelUser->getAttributes() as $name => $value) {
        echo "<p>";
        echo "<strong>{$name}</strong>: ",$value;
        echo "</p>";
    }
});
$app->run();
