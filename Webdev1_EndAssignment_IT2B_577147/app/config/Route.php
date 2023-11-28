<?php
class Route
{
    private $pattern;
    private $methods;
    private $function;
    private $string;
    private $getParams;
    private $postParams;

    public function __construct($methods, $function, $pattern = null, $string = null, $getParams = null, $postParams = null)
    {
        $this->pattern = $pattern;
        $this->methods = $methods;
        $this->function = $function;
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
}
