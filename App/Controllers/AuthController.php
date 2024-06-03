<?php

require_once(__DIR__ . '/../Models/State.php');
require_once(__DIR__ . '/../Models/City.php');
require_once(__DIR__ . '/../Models/Company.php');
require_once(__DIR__ . '/../Models/User.php');

class AuthController extends Controller
{
    private $stateModel;
    private $cityModel;
    private $companyModel;
    private $userModel;

    public function __construct(PDO $conex)
    {
        $this->stateModel = new State($conex);
        $this->cityModel = new City($conex);
        $this->companyModel = new Company($conex);
        $this->userModel = new User($conex);
    }

    public function login()
    {
        $this->render('auth', '', 'login');
    }

    public function auth()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->user($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['name_user'] = $user['names'] . ' ' . $user['last_names'];
                $_SESSION['user_id'] = $user['id'];
                $this->render('panel', '', 'home');
            } else {
                $_SESSION['error'] = 'Credenciales inválidas';
                $this->render('auth', '', 'login');
            }
        } else {
            $this->render('auth', '', 'login');
        }
    }

    public function register()
    {
        $this->render('auth', '', 'register');
    }

    public function getStates()
    {
        $states = $this->stateModel->getAll();

        $data = [
            'states' => $states,
        ];

        echo json_encode($data);
    }

    public function getCities()
    {
        $id = $_GET['id'];
        $cities = $this->cityModel->findCities($id);

        $data = [
            'cities' => $cities
        ];

        echo json_encode($data);
    }

    public function getCompanies()
    {
        $companies = $this->companyModel->getAll();

        $data = [
            'companies' => $companies
        ];

        echo json_encode($data);
    }

    public function duplicateUser()
    {
        $email = $_GET['email'];

        $user = $this->userModel->duplicate($email);

        if ($user) {
            echo json_encode($user);
        }
    }

    public function registerUser()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);


        $this->userModel->create([
            'names' => $data['names'],
            'last_names' => $data['last_names'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'status' => 1,
            'city_id' => $data['city'],
            'country_id' => 1,
            'company_id' => $data['company']
        ]);
    }

    public function logout()
    {
        session_destroy();
        $this->render('auth', '', 'login');
    }
}
