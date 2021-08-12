<?php

namespace Framework\Router;

use Framework\Exceptions\BadRouteException;

class Router
{
    private array $routes;
    private string $controllerName;
    private string $actionName;
    private Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = include('routes.php');
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    private function checkClass(): bool
    {
        if (class_exists($this->controllerName) && method_exists($this->controllerName, $this->actionName)) {
            return true;
        }
        return false;
    }

    public function run()
    {
        try {
            $uri = $this->getURI();
            foreach ($this->routes as $uriPattern => $path) {
                if (preg_match("~$uriPattern~", $uri)) {
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    $segments = explode('/', $internalRoute);
                    array_shift($segments);

                    $this->controllerName = "App\\Controller\\" . ucfirst(array_shift($segments) . 'Controller');
                    $this->actionName = array_shift($segments);
                    echo $this->controllerName . " " . $this->actionName;

                    if ($this->request->isPost()) {
                        $this->request->setBody();
                        $params = $this->request->getBody();
                    } else {
                        $params = $segments;
                    }
                    print_r($params);

                    if (!$this->checkClass()) {
                        throw new BadRouteException("Bad route exception 404");
                    } else {
                        $result = [new $this->controllerName(), $this->actionName];
                        $result($params);
                        break;
                    }
                }
            }
        } catch (BadRouteException $e) {
            echo $e->getMessage();
        }
    }
}
