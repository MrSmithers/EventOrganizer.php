<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 05/04/2018
 * Time: 19:39
 */
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Events/deleteModel.php';

class delete extends Controller
{
    public $filePath;
    public $id;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'delete'
        ];
    }

    public function Confirm()
    {
        if (empty($_GET['id'])) _404();

        $id = $_GET['id'];

        $model = new eventsDeleteModel();

        $model->delete('events', $id);

        header('Location: /events');
    }

    public function View($uri = false)
    {
        parent::View();

        if (empty($_COOKIE['session'])) _404();
        if (empty($_GET['id'])) _404();
        $this->id = $_GET['id'];

        $model = new eventsDeleteModel();

        $event = $model->findOneById('events', $this->id);

        if (empty($event) || $event->userId != $_COOKIE['session']) _404();
    }
}