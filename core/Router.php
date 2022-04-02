<?php

namespace app\core;

use Closure;

class Router
{

    protected array $routes = [];
    public Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, Closure $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback == false) {
            echo "Not found";
        }
        echo call_user_func($callback);
    }
}