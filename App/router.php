<?php
session_start();

class Router
{
    private $method;
    private $controller;

    public function __construct()
    {
        $this->matchRouter();
    }

    public function matchRouter()
    {
        $url = explode('/', URL);

        $this->controller = !empty($url[1]) ? $url[1] : 'Home';
        $this->method = !empty($url[2]) ? $url[2] : 'index';
        $this->controller = $this->controller . 'Controller';

        $this->checkAuthentication();

        require_once(__DIR__ . '/Controllers/' . $this->controller . '.php');
    }

    private function checkAuthentication()
    {
        if (!isset($_SESSION['name_user']) && $this->controller !== 'AuthController' && !in_array($this->method, ['login', 'auth', 'register', 'getStates', 'getCities', 'getCompanies', 'registerUser', 'duplicateUser'])) {
            require_once(__DIR__ . '/Views/auth/login.php');
            exit();
        }
    }

    public function run()
    {
        $database = new Database();
        $conex = $database->getConex();

        $controller = new $this->controller($conex);
        $method = $this->method;

        $controller->$method();
    }
}
