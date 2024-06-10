<?php

    namespace Controllers;
    use Core\Controller;
    use Respect\Validation\Validator as v;

    class LoginController extends Controller {

        function getDataLogin(){
            $uri = 'http://localhost:8080/customer/list';


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

        
                if (isset($_POST["email"])) {
                    $email = test($_POST["email"]);
                    if(!v::email()->validate($email)){
                        return false;
                    }
                }
        
                if (isset($_POST["pass"])) {
                    $pass = test($_POST["pass"]);
                    if(!v::alnum('#', '@', '_')->validate($pass)){
                        return false;
                    }
                }

                return ['email' => $email, 'pass' => $pass];
            }
        }

        public function index(){
            unset($_SESSION['admin']); 

            $this->view('Login', ['customers' => []]);
        }

        public function login() {
            $data = $this->getDataLogin();
            if(!$data){
                $_SESSION['errorInput'] = "Login unsuccessful\nBecause input invalid!";
                header('Location: /');
                exit();
            }
            
            $login = $this->model('Login','');

            $check = $login->login($data['email']);
            if($check){
                if(password_verify($data['pass'], $check['pass'])){
                    $_SESSION['admin'] = $data;
                    header('Location: /customer/list');
                    exit();
                }else{
                    $_SESSION['errorInput'] = "Login unsuccessful\nBecause incorrect password!";
                    header('Location: /');
                    exit();
                }
            }else{
                $_SESSION['errorInput'] = "Login unsuccessful\nBecause incorrect email!";
                header('Location: /');
                exit();
            }
            
        }

    }   
?>
