<?php

    namespace Controllers;
    use Core\Controller;

    class LoginController extends Controller {

        public function index(){
            $this->view('Login', ['customers' => []]);
        }

        public function login($email, $pass) {
            $login = $this->model('Login','');
            $data = $login->login($email, $pass);
            if($data){
                $_SESSION['admin'] = $data;
            }
            return $data;
        }

    }   
?>
