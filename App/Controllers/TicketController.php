<?php

require_once(__DIR__ . '/../Models/Ticket.php');
require_once(__DIR__ . '/../Models/UserHistory.php');
require_once(__DIR__ . '/AuthController.php');

class TicketController extends Controller
{
    private $ticketModel;
    private $histoyUserModel;

    public function __construct(PDO $conex)
    {
        if (!isset($_SESSION['name_user'])) {
            $this->render('auth', '', 'login');
            exit();
        }
        $this->ticketModel = new Ticket($conex);
        $this->histoyUserModel = new UserHistory($conex);
    }

    public function index()
    {
        $this->render('panel', 'modules/tickets', 'index');
    }

    public function list()
    {
        $tickets = $this->ticketModel->list();

        echo json_encode($tickets);
    }

    public function create()
    {
        $this->render('panel', 'modules/tickets', 'create');
    }

    public function getHistoriesUsers()
    {
        $historiesUsers = $this->histoyUserModel->getAll();

        echo json_encode($historiesUsers);
    }

    public function states()
    {
        $states = $this->ticketModel->states();

        echo json_encode($states);
    }

    public function store()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $this->ticketModel->create([
            'user_story_id' => $data['history'],
            'ticket_state_id' => $data['status'],
            'comments' => $data['comments'],
        ]);
    }

    public function show()
    {
        $this->render('panel', 'modules/tickets', 'show');
    }

    public function edit()
    {
        $this->render('panel', 'modules/tickets', 'edit');
    }

    public function lisEdit()
    {
        $id = $_GET['id'];
        $data = $this->ticketModel->listEdit($id);

        echo json_encode($data);
    }

    public function update()
    {
        $id = $_GET['id'];
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $this->ticketModel->update($id, [
            'user_story_id' => $data['history'],
            'ticket_state_id' => $data['status'],
            'comments' => $data['comments']
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $this->ticketModel->deleted($id);
    }
}
