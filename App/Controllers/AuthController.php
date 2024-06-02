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

    public function registerUser()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        if ($data['birth_day'] == '') {
            $this->userModel->create([
                'names' => $data['names'],
                'last_names' => $data['last_names'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => MD5($data['password']),
                'status' => 1,
                'city_id' => $data['city'],
                'country_id' => 1,
                'company_id' => $data['company']
            ]);
        } else {
            $this->userModel->create([
                'names' => $data['names'],
                'last_names' => $data['last_names'],
                'birth_date' => $data['birth_day'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'password' => MD5($data['password']),
                'status' => 1,
                'city_id' => $data['city'],
                'country_id' => 1,
                'company_id' => $data['company']
            ]);
        }
    }
}
