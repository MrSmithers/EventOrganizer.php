<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 05/04/2018
 * Time: 13:23
 */
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Events/editModel.php';

class edit extends Controller
{
    public $filePath;
    public $event;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'edit'
        ];
    }

    public function Post()
    {
        $id = $_POST['eventId'];
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $date = $_POST['datetime'];

        $model = new eventEditModel();

        $model->update('events', $id, [
            'title' => $title,
            'description' => $desc,
            'datetime' => $date
        ]);

        header("Location: /events/view/$id");

    }

    public function View($uri = false)
    {
        parent::View();

        if (empty($_COOKIE['session'])) _404();
        if (empty($_GET['id'])) _404();

        $id = $_GET['id'];

        $model = new eventEditModel();

        $this->event = $model->findOneById('events', $id);

        if (empty($this->event) || $this->event->userId != $_COOKIE['session']) _404();
    }
}