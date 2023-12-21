<?php
 require_once __DIR__.'/config/Route.php';
class Router
{
    private $routes;
    private static Router $instance;

    private function __construct()
    {
        $this->routes = $this->createRoutes();
    }
    public static function getInstance():Router{
        if(empty(self::$instance)){
            self::$instance = new Router();
        }
        return self::$instance;
    }
    private function createRoutes(): array
    {
        $routes = [
            new Route(['GET','HEAD'],'connectController', null,'/^\/feed(?:\/([a-z0-1_-]+))?$/'),
            new Route(['GET','HEAD'],'homeController', null,null, '/'),
            new Route(['GET','HEAD'],'artistsController',  null,'/^\/artists(?:\/([a-z0-1_-]+))?$/'),
            new Route(['GET','HEAD'],'eventsController',  null,'/^\/events(?:\/([a-z0-1_-]+))?$/'),
            new Route(['GET','HEAD'],'aboutController',  null,'/^\/about(?:\/([a-z0-1_-]+))?$/'),
            new Route(['GET','HEAD'],'loginController',  null,null,'/login'),
            new Route(['POST'],'loginController',  'access',null, '/login/access'),
            new Route(['GET'],'loginController',  'logOut',null, '/logout'),
            new Route(['GET','HEAD'],'registerController',  null,'/^\/register(?:\/([a-z0-1_-]+))?$/'),

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
                    $this->redirect($route);
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
            ob_start();
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

    private function redirect($route){
        $filename = __DIR__ . '/controllers/'.$route->getController().'.php';
        //if ($api) {
        // $filename = __DIR__ . '/api/controllers/' . $controllerName . '.php';
        //}
        if (file_exists($filename)) {
            ob_start();
            $controllerName = 'controllers\\'.$route->getController();
            require $filename;
        } else {
            $this->respondNotFound();
        }

        // dynamically call relevant controller method
        try {
            //$reflectionClass = new ReflectionClass($controller);
            //$controllerObj = $reflectionClass->newInstance();
            $controllerObj = new $controllerName;
            $controllerObj->{$route->getFunction()}();
            $content = ob_get_clean();
            Router::getInstance()->respond(200, $content);

        } catch (Exception $e) {
            echo $e;
            $this->respondServerError('Controller: '.$route->getController().' Function: '.$route->getFunction());
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
        $this->respond(405, '<h1>405 Method Not Allowed</h1>', ['allow' => implode(', ', $allowedMethods)]);
    }

    private function respondServerError($controller)
    {
        $content = '<h1>500 Internal Server Error</h1>';
        $content .= '<p>Specified route-handler does not exist.</p>';
        $content .= '<pre>' . htmlspecialchars($controller) . '</pre>';
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