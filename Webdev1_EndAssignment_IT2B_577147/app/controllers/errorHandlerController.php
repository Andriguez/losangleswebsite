<?php
namespace Controllers;

class errorHandlerController
{
    protected $code;
    protected $message;
    private navbarController $navbar;
    public function __construct(){
        $this->navbar = new navbarController();
        $this->code = $_GET['p'];
        $this->message = $_GET['i'];
        http_response_code($this->code);
    }
    public function index(){
        $this->navbar->displayNavbar();
        require __DIR__ . '/../views/errorPage/index.php';
    }
}