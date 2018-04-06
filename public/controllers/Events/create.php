<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 03/04/2018
 * Time: 00:22
 */
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Events/createModel.php';

class create extends Controller
{
    public $filePath;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'create'
        ];
    }

    private function _Validate()
    {
        if (empty($_POST['title'])) {
            $this->_Errors['title'] = 'Name must not be empty.';
        }

        if (empty($_POST['description'])) {
            $this->_Errors['description'] = 'Description must not be empty.';
        }

        return empty($this->_Errors);
    }

    public function Post()
    {
        if ($this->_Validate()) {
            $model = new createModel();
            $id = $model->insert('events', $_POST);

            if (empty($id)) {
                // Something went wrong there...
            } else {
                header('Location: /events/view/'.$id);
            }
        }
    }

    public function View($uri = false)
    {
        // If user is not logged in, redirect to the login page.
        if (empty($_COOKIE['session'])) {
            header('Location: /login?redirect=events/create');
        }

        parent::View();
    }
}