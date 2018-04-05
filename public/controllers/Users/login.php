<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:36
 */

require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Users/loginModel.php';

class login extends Controller
{
    public $filePath;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Users',
            'login'
        ];
    }

    public function Post()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $model = new loginModel();
        $user = $model->findOne('users', ['email' => $email]);

        if (empty($user)) {
            // Error no user
        } else {
            // Node.js hashes using $2a$ hashes, php uses $2y$ hashes, but otherwise they are compatible.
            $hash = str_replace('$2y$', '$2a$', $user->hash);
            $verify = password_verify($password, $hash);

            if ($verify) {
                // user login correct
                setcookie('session', $user->_id, time() + 86400, '/');
                header('Location: /');
            } else {
                // Password incorrect

            }
        }
    }

    public function View($uri = false, $query = false)
    {
        parent::View();
    }
}