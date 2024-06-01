<?php


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

        require_once(__DIR__ . '/Controllers/' . $this->controller . '.php');
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
