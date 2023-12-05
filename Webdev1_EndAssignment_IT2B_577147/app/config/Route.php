<?php
class Route
{
    private $pattern;
    private $methods;
    private $controller;
    private $function;
    private $string;
    private $getParams;
    private $postParams;

    public function __construct($methods, $controller, $functionInput = null , $pattern = null, $string = null, $getParams = null, $postParams = null)
    {
        $this->pattern = $pattern;
        $this->methods = $methods;
        $this->controller = $controller;

        if(!isset($functionInput)){
            $functionInput = 'index';
        }
        $this->function = $functionInput;

        $this->string = $string;
        $this->getParams = $getParams;
        $this->postParams = $postParams;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function getString()
    {
        return $this->string;
    }

    public function getGetParams()
    {
        return $this->getParams;
    }

    public function getPostParams()
    {
        return $this->postParams;
    }
    public function getController(){
        return $this->controller;
    }
}
