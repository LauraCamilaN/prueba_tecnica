<?php


class TicketController extends Controller
{
    public function __construct(PDO $conex)
    {
    }

    public function index()
    {
        $this->render('panel', 'modules/tickets', 'index');
    }

    public function list()
    {
    }
}
