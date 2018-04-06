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
    public $redirect;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Users',
            'login'
        ];
    }

    private function _Validate()
    {
        if (empty($_POST['email'])) {
            $this->_Errors['email'] = 'Email cannot be empty';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->_Errors['email'] = 'Please enter a valid email';
        }

        if (empty($_POST['password'])) {
            $this->_Errors['password'] = 'Password cannot be empty';
        }

        return empty($this->_Errors);
    }

    public function Post()
    {
        if ($this->_Validate()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new loginModel();
            $user = $model->findOne('users', ['email' => $email]);

            if (empty($user)) {
                $this->_Errors['email'] = 'Email does not exist';
                // Error no user
            } else {
                // Node.js hashes using $2a$ hashes, php uses $2y$ hashes, but otherwise they are compatible.
                $hash = str_replace('$2y$', '$2a$', $user->hash);
                $verify = password_verify($password, $hash);

                if ($verify) {
                    // user login correct
                    if (isset($_POST['remember-me'])) {
                        // 12 month cookie.
                        setcookie('session', $user->_id, time() + 86400 * 365, '/');
                    } else {
                        // 24 hour cookie.
                        setcookie('session', $user->_id, time() + 86400, '/');
                    }
                    if (empty($_POST['redirect'])) {
                        header('Location: /');
                    } else {
                        header("Location: /{$_POST['redirect']}");
                    }
                } else {
                    // Password incorrect
                    $this->_Errors['password'] = 'Password is incorrect';
                }
            }
        }
    }

    public function View($uri = false)
    {
        parent::View();

        $this->redirect = (!empty($_GET) && isset($_GET['redirect'])) ? $_GET['redirect'] : '';
    }
}