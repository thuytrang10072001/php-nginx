<?php 
    use Controllers\LoginController;
    use Controllers\CustomerController;
    $uri = 'http://localhost:8080/customer/list';

    unset($_SESSION['admin']); 

    if(isset($_SESSION['alertLogin'])){
        echo "<script>
                setTimeout(function() {
                    alert('Login unsuccessful\\n Because incorrect email or password!');
                }, 100);
            </script>";
        unset($_SESSION['alertLogin']);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_POST["email"])) {
            $email = test($_POST["email"]);
        }

        if (isset($_POST["pass"])) {
            $pass = test($_POST["pass"]);
        }

        $controller = new LoginController();
        $customer = new CustomerController();

        // Check action login exists in LoginController
        if (method_exists($controller, 'login')) {
            $check = $controller->login($email, $pass);
            unset($_POST["pass"]);
            unset($_POST["email"]);
            if($check){
                header("Location: /customer/list"); //Load page 
                exit();
            }else{
                $alert = "Login unsuccessful \\n Because incorrect email or password!";
                $_SESSION['alertLogin'] = $alert;
                header("Location: /");
            }

        } else
            echo "Page Not Found";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/style.css" />
    <style type="text/css">
        .login{
            background-color: rgba(13, 12, 12, 0.76);
            height: 100vh;
        }
        .login__form {
            box-sizing: border-box;
            margin-bottom: 10%;

        }

        #form-login{
            width: 30%;
            margin: auto;
            padding: 5%;
            background-color: white;
            border-radius: 20px;
        }
        .login__form--title{
            text-align: center;
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 30px;
            color: white;
        }
    </style>
</head>
<body>
    <section class="login d-flex align-items-center">
        <div class="container">
            <div class="row">
            <div class="login__form d-flex flex-column align-items-center">
                <div class="login__form--title">Login</div>
                <form id="form-login" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" pattern=".{6,}" required
                                title="Only letters, numbers, special @,#,_ allowed">
                    </div>
                    <button type="submit" class="btn btn-dark">Login</button>
                </form>
            </div>
            </div>
            
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
    <script src="../asset/js/login.js"> </script> 
</body>
</html>