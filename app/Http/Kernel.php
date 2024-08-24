<?php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
       
    ];

    protected $middlewareGroups = [
        'web' => [
           
        ],

        'api' => [
            'throttle:5,1',  // Limits requests to 5 per minute
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
       
    ];
}


