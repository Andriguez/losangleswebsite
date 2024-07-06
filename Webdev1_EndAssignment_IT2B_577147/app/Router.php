<?php
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
        require __DIR__.'/config/routes.php';
        return $routes;
    }

    public function handleRequest()
    {
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $requestedPath = $parsedUrl['path'];

        foreach ($this->routes as $route) {
            $this->handleParameters($route);

            try {
                $matchResult = $this->matchRoute($route, $requestedPath);

                if ($matchResult['result']) {
                    $this->checkRequestMethod($route);

                    if ($route->getPattern() !== null && str_starts_with($route->getPattern(), '/^\/admin(?:\/')) {
                        $this->handleAdminRoute($route, $requestedPath);
                        exit;
                    } else if($route->getFilePath() !== null && $route->getController() == null){
                        $this->redirectToFile($route);
                        //exit;
                    }else {
                        $this->redirect($route);
                    }
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
            $this->respondInvalidParameters($invalidParameters, $allowedParameters);
        }
    }

    private function matchRoute($route, $requestedPath)
    {
        if ($route->getPattern() !== null) {
            ob_start();
            $result =  preg_match($route->getPattern(), $requestedPath, $matches);
            return ['result' => $result, 'matches' => $matches];


        } elseif ($route->getString() !== null) {
            $result = ($route->getString() === $requestedPath);
            return ['result' => $result, 'matches' => []];
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
        if (file_exists($filename)) {
            ob_start();
            $controllerName = 'controllers\\'.$route->getController();
            require $filename;
        } else {
            $this->respondNotFound();
        }

        // Extract parameters based on the pattern
        if ($route->getPattern()) {
            $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
            $requestedPath = $parsedUrl['path'];

            $result = $this->matchRoute($route, $requestedPath);

            // The first element in $matches will contain the entire match,
            $parameters = array_slice($result['matches'], 1);

            if (isset($parameters[0])) {
                foreach ($parameters as $k => $v){
                    $parameters[$k] = str_replace('_', ' ', $parameters[$k]);
                }
                //$parameters[0] = str_replace('_', ' ', $parameters[0]);
            }

        } else {
            $parameters = []; // No pattern, set parameters to an empty array
        }

        // dynamically call relevant controller method
        try {
            $controllerObj = new $controllerName;
            $controllerObj->{$route->getFunction()}(...$parameters);
            $content = ob_get_clean();
            $responseCode = $controllerObj::class == \Controllers\errorHandlerController::class ? $_GET['p'] : 200;
            $this->respond($responseCode, $content);

        } catch (Exception $e) {
            echo $e;
            $this->respondServerError('Controller: '.$route->getController().' Function: '.$route->getFunction());
        }
    }

    private function handleAdminRoute($route, $requestedPath)
    {
        try {
            $matches = [];
            $isMatch = preg_match($route->getPattern(), $requestedPath, $matches);

            if ($isMatch) {
                // Extract the function part from the matched groups
                $adminFunction = $matches[1] ?? 'index';
                $param = $matches[2] ?? null;

                // Create an instance of AdminController and call the specified function
                require __DIR__ . '/controllers/adminController.php';
                $adminController = new controllers\adminController();

                ob_start();

                // Check if the method exists in AdminController
                if (method_exists($adminController, $adminFunction)) {
                    $adminController->{$adminFunction}($param);
                    $content = ob_get_clean();
                    $this->respond(200, $content);
                }
            }

            // If the pattern doesn't match, respond with a "Not Found" error
            $this->respondNotFound();
        } catch (Exception $e) {
            echo $e;
            $this->respondServerError('Controller: '.$route->getController().' Function: '.$route->getFunction());
        }
    }

    private function redirectToFile($route){
        try{
            $filepath = __DIR__.$route->getFilePath();

                if(file_exists($filepath)){
                    require_once __DIR__.$route->getFilePath();
                    $this->respond(200, 'file found');
                }
                else { $this->respondNotFound();  }
        } catch (Exception $e){
            echo $e;
            $this->respondServerError('File: '.$route->getFilePath.' Not Found or Not accessible.');
        }
    }

    private function respondInvalidParameters($invalidParameters, $allowedParameters)
    {
        echo '<p><b>Invalid request:</b> parameters not allowed.</p>';
        echo '<pre>';
        foreach ($invalidParameters as $invalidKey => $invalidName) {
            echo $invalidKey . ': ' . $invalidName . "\n";
        }
        echo '<p>expected parameters:</p>';
        foreach ($allowedParameters as $validKey => $validName) {
            echo $validKey . ': ' . $validName . "\n";
        }
        echo '</pre>';
        http_response_code(400);
        exit();
    }

    private function respondMethodNotAllowed($allowedMethods)
    {
        $message = 'Method Not Allowed';
        $this->errorHandler(405, $message);
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
        //$this->respond(404, '<h1>404 Not Found</h1><p>Page not recognized...</p>');
        $this->errorHandler(404, 'page not found');
    }

    function errorHandler($code, $message){
        $_SERVER['REQUEST_URI'] = "/error/";
        $_GET['p'] = $code;
        $_GET['i'] = $message;

        $this->handleRequest();
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