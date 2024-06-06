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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../../asset/css/style.css" />
    </head>
    <style>
      

    </style>
    <body>
        <section class="customer">
        <div class="customer__title text-center ">Customer List</div>
            <div class="customer__list d-flex ">
                <table  style="width:50%" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>                
                    <tbody class="table-body">
                            <?php foreach($data['customers'] as $customer): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($customer['name']); ?></td>
                                    <td><?php echo htmlspecialchars($customer['address']);?></td>
                                    <td><?php echo htmlspecialchars($customer['email']); ?></td>
                                    <td><button data-id="<?php echo $customer['id']; ?>" class="btn-detail" onclick=>Chi tiết</button>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="customer__list--detail ">
                    <span style="font-size: 28px">Information Detail</span>
                    <div class="customer__detail--info">
                        Name: <span id="name">Anna</span><br><br>
                        Address: <span id="address">Francisco State</span><br><br>
                        Email: <span id="email">anna@gmail.com</span><br><br>
                    </div>
                </div>
            </div>
            <h2>PHP Form Validation Example</h2>
            <form class="customer__form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <span class="customer__form--info"> Tên:</span>
                <input type="text" name="name">         
                <span class="customer__form--error"> <?php echo $nameErr  ;?></span>
                <br><br>
                <span class="customer__form--info">Địa chỉ:</span>
                <input type="text" name="address">
                <span class="customer__form--error"> <?php echo $addressErr  ;?></span>
                <br><br>
                <span class="customer__form--info"> Email:</span>
                <input type="text" name="email">
                <span class="customer__form--error"> <?php echo $emailErr ;?></span>
                <br><br>

                <div class="btn"><input type="submit" name="submit" value="Submit"></div>  
            </form>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
        <script src="/asset/js/customer.js"> </script>                 
    </body>
</html>

