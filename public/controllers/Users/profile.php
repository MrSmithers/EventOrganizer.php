<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 02/04/2018
 * Time: 23:40
 */
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Users/profileModel.php';

class profile extends Controller
{
    public $filePath;
    public $user;
    public $userEvents;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Users',
            'profile'
        ];
    }

    public function View($uri = false)
    {
        parent::View();

        $requestUri = explode('?', $_SERVER['REQUEST_URI']);
        // Remove the leading '/' and explode on '/'
        $uriArray = explode('/', substr ($requestUri[0],1));
        // Uri will be in the form 'profile/$_id' where $_id is the userId stored in the Mongo database.

        if (!$uriArray || empty($uriArray[1])) _404();

        $id = $uriArray[1];

        $model = new profileModel();

        $this->user = $model->findOneById('users', $id);

        // User not found
        if (empty($this->user)) _404();
    }
}