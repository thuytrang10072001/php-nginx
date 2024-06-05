<?php             
    use Respect\Validation\Validator as v;

    $name = $email = $address = "";
    $nameErr = $emailErr = $addressErr = "";
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
                    <?php foreach($data['customers'] as $customer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($customer['name']); ?></td>
                            <td><?php echo htmlspecialchars($customer['address']);?></td>
                            <td><?php echo htmlspecialchars($customer['email']); ?></td>
                        </tr>
                     <?php endforeach; ?>
            </tbody>
        </table>
        <!-- <h2>PHP Form Validation Example</h2>
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
        <script src="/asset/js/customer.js"> </script>                  -->
    </body>
</html>

