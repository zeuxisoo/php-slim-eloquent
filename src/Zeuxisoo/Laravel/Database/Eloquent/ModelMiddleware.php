<?php
namespace Zeuxisoo\Laravel\Database\Eloquent;

use Slim\Middleware;
use Illuminate\Database\Capsule\Manager as Capsule;

class ModelMiddleware extends Middleware {

    private function makeCapsule($databases) {
        $capsule = new Capsule;

        foreach($databases as $name => $database) {
            $capsule->addConnection($database, $name);
        }

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    }

    public function call() {
        $app       = $this->app;
        $databases = $app->config('databases');
        $capsule   = $this->makeCapsule($databases);

        $app->container->singleton('db', function() use ($capsule) {
            return $capsule;
        });

        $this->next->call();
    }

}
