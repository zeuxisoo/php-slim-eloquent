<?php
namespace Zeuxisoo\Laravel\Database\Eloquent;

use Slim\Middleware;
use Illuminate\Database\Capsule\Manager as Capsule;

class ModelMiddleware extends Middleware {

    private function makeCapsule() {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => ''
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    }

    public function call() {
        $app     = $this->app;
        $capsule = $this->makeCapsule();

        $app->container->singleton('db', function() use ($capsule) {
            return $capsule;
        });

        $this->next->call();
    }

}
