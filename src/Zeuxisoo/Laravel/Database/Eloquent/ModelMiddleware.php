<?php
namespace Zeuxisoo\Laravel\Database\Eloquent;

use Slim\Middleware;

class ModelMiddleware extends Middleware {

    public function call() {
        $app = $this->app;

        $this->next->call();
    }

}
