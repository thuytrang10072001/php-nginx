<?php             
    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    use App\User\Customer;
    use Respect\Validation\Validator as v;

    // if (!isset($_SESSION['array'])) {
    //     $_SESSION['array'] = [
    //         new Customer("Le Van A", "ABC Street", "levana@gmail.com"),
    //         new Customer("Le Van B", "ABC Street", "levanb@gmail.com"),
    //         new Customer("Le Van C", "ABC Street", "levanc@gmail.com"),
    //         new Customer("Le Van D", "ABC Street", "levand@gmail.com"),
    //         new Customer("Le Van E", "ABC Street", "levane@gmail.com")
    //     ];
    //  }
    
    // $array = $_SESSION['array'];

    $array = array();
    array_push($array, new Customer("Le Van A", "ABC Street", "levana@gmail.com"));
    array_push($array, new Customer("Le Van B", "ABC Street", "levanb@gmail.com"));
    array_push($array, new Customer("Le Van C", "ABC Street", "levanc@gmail.com"));
    array_push($array, new Customer("Le Van D", "ABC Street", "levand@gmail.com"));
    array_push($array, new Customer("Le Van E", "ABC Street", "levane@gmail.com"));

    $name = $email = $address = "";
    $nameErr = $emailErr = $addressErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
             $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!v::alpha(' ')->validate($name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
            // check if name only contains letters and whitespace
            if (!v::alnum(',', ' ')->validate($address)) {
               $addressErr = "Only letters, number and white space allowed";
            }
        }
       
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if(!v::email()->validate($email)){
                $emailErr = "Invalid email format";
            }
        }

        if (empty($nameErr) && empty($addressErr) && empty($emailErr)) {
            $newCustomer = new Customer($name, $address, $email);
            array_push($array, $newCustomer);
            $_SESSION['array'] = $array;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }   
      
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
          
?>
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
        .info{
            width: 70px;
            display: inline-block
        }

    </style>
    <body>
        <table  style="width:30%">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                </tr>
            </thead>                
            <tbody class="table-body">
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
        <h2>PHP Form Validation Example</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <span class="info"> Tên:</span>
            <input type="text" name="name">         
            <span class="error"> <?php echo $nameErr  ;?></span>
            <br><br>
            <span class="info">Địa chỉ:</span>
             <input type="text" name="address">
            <span class="error"> <?php echo $addressErr  ;?></span>
            <br><br>
            <span class="info"> Email:</span>
            <input type="text" name="email">
            <span class="error"> <?php echo $emailErr ;?></span>
            <br><br>

            <div class="btn"><input type="submit" name="submit" value="Submit"></div>  
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
        <script src="/asset/js/customer.js"> </script>                 
    </body>
</html>

