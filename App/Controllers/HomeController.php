<?php

require_once(__DIR__ . '/../Models/Company.php');
require_once(__DIR__ . '/../Models/Project.php');
require_once(__DIR__ . '/../Models/Ticket.php');
require_once(__DIR__ . '/../Models/User.php');

class HomeController extends Controller
{
    private $companyModel;
    private $projectModel;
    private $userModel;
    private $ticketModel;

    public function __construct(PDO $conex)
    {
        $this->companyModel = new Company($conex);
        $this->projectModel = new Project($conex);
        $this->userModel = new User($conex);
        $this->ticketModel = new Ticket($conex);
    }

    public function index()
    {
        $this->render('panel', '', 'home');
    }

    public function companies()
    {
        $companies = $this->companyModel->countAll();

        echo json_encode($companies);
    }

    public function projects()
    {
        $projects = $this->projectModel->countAll();

        echo json_decode($projects);
    }

    public function tickets()
    {
        $tickets = $this->ticketModel->countAll();

        echo json_decode($tickets);
    }

    public function users()
    {
        $users = $this->userModel->countAll();

        echo json_decode($users);
    }
}
