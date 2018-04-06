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

    private function _Validate()
    {
        if (empty($_POST['email'])) {
            $this->_Errors['email'] = 'Email cannot be empty';
        } elseif (!preg_match("/[a-zA-Z0-9]@[a-zA-Z0-9]./i", $_POST['email'])) {
            $this->_Errors['email'] = 'Please enter a valid email';
        }

        if (empty($_POST['name'])) {
            $this->_Errors['name'] = 'Name cannot be empty';
        }

        if (empty($_POST['password'])) {
            $this->_Errors['password'] = 'Password must not be empty';
        } elseif (strlen($_POST['password']) < 8) {
            $this->_Errors['password'] = 'Password must be at least 8 characters long';
        } elseif (!preg_match("/[a-zA-Z]/i", $_POST['password']) || !preg_match('/[0-9]/i', $_POST['password'])) {
            $this->_Errors['password'] = 'Password must contain at least one number and one letter';
        }

        return empty($this->_Errors);
    }
    public function Post()
    {
        if ($this->_Validate()) {
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
    }

    public function View($uri = false)
    {
        parent::View();
    }
}