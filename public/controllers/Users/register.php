<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:36
 */

require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Users/registerModel.php';

class register extends Controller
{
    public $filePath;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Users',
            'register'
        ];
    }

    public function Post()
    {
        $model = new registerModel();

        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        // Node.js hashes using $2a$ hashes, php uses $2y$ hashes, but otherwise they are compatible.
        $hash = str_replace('$2y$', '$2a$', password_hash($password, PASSWORD_BCRYPT));

        $id = $model->insert('users', [
            'email' => $email,
            'name' => $name,
            'hash' => $hash
        ]);

        if (empty($id)) {
            // Something went wrong there...
        } else {
            setcookie('session', $id, time() + 86400, '/');
            header('Location: /');
        }
    }

    public function View($uri = false, $query = false)
    {
        parent::View();
    }
}