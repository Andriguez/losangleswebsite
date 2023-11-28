<?php
require_once __DIR__.'/config/Route.php';
class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = $this->createRoutes();
    }

    private function createRoutes(): array
    {
        $routes = [
            new Route(['GET','HEAD'],'connect', '/^\/connect(?:\/([a-z0-1_-]+))?$/'),
            new Route(['GET','HEAD'],'homepage', null,'/'),
            new Route(['GET','HEAD'],'artists',  '/^\/artists(?:\/([a-z0-1_-]+))?$/'),

        ];

        return $routes;
    }

    public function handleRequest()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $requestedPath = $parsedUrl['path'];

        foreach ($this->routes as $route) {
            $this->handleParameters($route);

            try {
                if ($this->matchRoute($route, $requestedPath)) {
                    $this->checkRequestMethod($route);
                    $this->callRouteFunction($route);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $this->respondNotFound();
    }

    private function handleParameters($route)
    {
        if ($route->getGetParams() !== null) {
            $this->handleParametersType($route->getGetParams(), $_GET);
        }
        if ($route->getPostParams() !== null) {
            $this->handleParametersType($route->getPostParams(), $_POST);
        }
    }

    private function handleParametersType($allowedParameters, $parameters)
    {
        $invalidParameters = array_diff(array_keys($parameters), $allowedParameters);

        if (!empty($invalidParameters)) {
            $this->respondInvalidParameters($invalidParameters);
        }
    }

    private function matchRoute($route, $requestedPath)
    {
        if ($route->getPattern() !== null) {
            return preg_match($route->getPattern(), $requestedPath, $matches);
        } elseif ($route->getString() !== null) {
            return $route->getString() === $requestedPath;
        }

        throw new Exception("Missing required parameter (string or pattern) in route.");
    }

    private function checkRequestMethod($route)
    {
        if (!in_array($_SERVER['REQUEST_METHOD'], $route->getMethods())) {
            $this->respondMethodNotAllowed($route->getMethods());
        }
    }

    private function callRouteFunction($route)
    {
        if ($route->getFunction() !== null) {
            $handler = 'redirectTo_' . $route->getFunction();

            if (!is_callable($handler)) {
                $this->respondServerError($route->getFunction());
            }

            call_user_func_array($handler, isset($matches) ? [$matches] : []);
        } else {
            throw new Exception("Missing required parameter (function) in route.");
        }
    }

    private function respondInvalidParameters($invalidParameters)
    {
        echo '<p><b>Invalid request:</b> parameters not allowed.</p>';
        echo '<pre>';
        foreach ($invalidParameters as $invalidKey => $invalidName) {
            echo $invalidKey . ': ' . $invalidName . "\n";
        }
        echo '</pre>';
        exit();
    }

    private function respondMethodNotAllowed($allowedMethods)
    {
        respond(405, '<h1>405 Method Not Allowed</h1>', ['allow' => implode(', ', $allowedMethods)]);
    }

    private function respondServerError($function)
    {
        $content = '<h1>500 Internal Server Error</h1>';
        $content .= '<p>Specified route-handler does not exist.</p>';
        $content .= '<pre>' . htmlspecialchars($function) . '</pre>';
        $this->respond(500, $content);
    }

    private function respondNotFound()
    {
        $this->respond(404, '<h1>404 Not Found</h1><p>Page not recognized...</p>');
    }

    public function respond($code, $html, $headers = [])
    {
        $defaultHeaders = ['content-type' => 'text/html; charset=utf-8'];
        $headers = $headers + $defaultHeaders;
        http_response_code($code);
        foreach ($headers as $key => $value) {
            header($key . ': ' . $value);
        }
        echo $html;
        exit();
    }

}

 function redirectTo_homepage()
{
    $content = '<p>Showing the frontpage</p>';
    $r = new Router();
    $r->respond(200, $content);
}

 function redirectTo_connect()
{
    $content = '<p>Showing the connect page </p>';

    $r = new Router();
    $r->respond(200, $content);
}
function redirectTo_artists()
{
    $content = '<p>Showing the artists page </p>';

    $r = new Router();
    $r->respond(200, $content);
}

//must add the rest of the functions for displaying pages

