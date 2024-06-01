<?php

class AuthController extends Controller
{

    public function __construct(PDO $conex)
    {
    }

    public function login()
    {
        $this->render('auth', '', 'login');
    }

    public function register()
    {
        $this->render('auth', '', 'register');
    }
}
