<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        table, th, td {
        border:1px solid black;
        }

        .error{
            color: red
        }
    </style>
    <body>
        <?php   
            session_start();
            require_once __DIR__ . '/vendor/autoload.php';
            use App\User\Customer;

            if(isset($_SESSION["array"]) && count($_SESSION["array"]) > 0) {
                $array = $_SESSION["array"];
            } else {
                $array = array();
                // Thêm một số phần tử mẫu vào mảng
                array_push($array, new Customer("Le Van A", "ABC Street", "levana@gmail.com"));
                array_push($array, new Customer("Le Van B", "ABC Street", "levanb@gmail.com"));
                array_push($array, new Customer("Le Van C", "ABC Street", "levanc@gmail.com"));
                array_push($array, new Customer("Le Van D", "ABC Street", "levand@gmail.com"));
                array_push($array, new Customer("Le Van E", "ABC Street", "levane@gmail.com"));
            }
          
        ?>       
        <table  style="width:30%">
            <thead>
                <tr>
                    <th><?php echo "Tên" ?></th>
                    <th><?php echo "Địa chỉ" ?></th>
                    <th><?php echo "Email" ?></th>
                </tr>
            </thead>                
            <tbody>
                <?php if (count($array) > 0): ?>
                    <?php foreach($array as $x): ?>
                        <tr>
                            <td><?php echo $x->getName() ?></td>
                            <td><?php echo $x->getAddress() ?></td>
                            <td><?php echo $x->getEmail() ?></td>
                        </tr>
                     <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php
            use Respect\Validation\Validator as v;
            // define variables and set to empty values
            $name = $email = $address = "";
            $nameErr = $emailErr = $addressErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                     $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["address"])) {
                    $addressErr = "Address is required";
                } else {
                    $address = test_input($_POST["address"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z0-9, ]*$/",$address)) {
                       $addressErr = "Only letters and white space allowed";
                    }
                }
               
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if email address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }
                array_push($array, new Customer($name,$address,$email));
                $_SESSION["array"] = $array;
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }   
              
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
        ?>

        <h2>PHP Form Validation Example</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            Tên: <input type="text" name="name">
            <span class="error"> <?php echo '*' . $nameErr . ;?></span>
            <br><br>
            Địa chỉ: <input type="text" name="address">
            <span class="error"> <?php echo '*' . $addressErr . ;?></span>
            <br><br>
            Email: <input type="text" name="email">
            <span class="error"> <?php echo '*' . $emailErr . ;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
        </form>            
    </body>
</html>

 