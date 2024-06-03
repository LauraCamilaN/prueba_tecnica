<?php

require_once(__DIR__ . '/../Models/UserHistory.php');
require_once(__DIR__ . '/../Models/Company.php');
require_once(__DIR__ . '/../Models/Project.php');
require_once(__DIR__ . '/AuthController.php');

class UserHistoryController extends Controller
{
    private $userHistoryModel;
    private $companyModel;
    private $projectModel;

    public function __construct(PDO $conex)
    {
        if (!isset($_SESSION['name_user'])) {
            $this->render('auth', '', 'login');
            exit();
        }
        $this->userHistoryModel = new UserHistory($conex);
        $this->companyModel = new Company($conex);
        $this->projectModel = new Project($conex);
    }

    public function index()
    {
        $this->render('panel', 'modules/user_stories', 'index');
    }

    public function list()
    {
        $usersHistories = $this->userHistoryModel->list();

        echo json_encode($usersHistories);
    }

    public function create()
    {
        $this->render('panel', 'modules/user_stories', 'create');
    }

    public function getCompanies()
    {
        $companies = $this->companyModel->companiesProjects();

        echo json_encode($companies);
    }

    public function getProjects()
    {
        $id = $_GET['id'];
        $projects = $this->projectModel->findProjects($id);

        echo json_encode($projects);
    }

    public function store()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $this->userHistoryModel->create([
            'description' => $data['description'],
            'user_id' => $data['user'],
            'project_id' => $data['project']
        ]);
    }

    public function edit()
    {
        $this->render('panel', 'modules/user_stories', 'edit');
    }

    public function dataEdit()
    {
        $id = $_GET['id'];

        $userHistory = $this->userHistoryModel->listEdit($id);

        echo json_encode($userHistory);
    }

    public function update()
    {
        $id = $_GET['id'];

        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $this->userHistoryModel->update($id, [
            'description' => $data['description'],
            'project_id' => $data['project']
        ]);
    }

    public function show()
    {
        $this->render('panel', 'modules/user_stories', 'show');
    }
}
