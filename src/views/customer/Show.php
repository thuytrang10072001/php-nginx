<?php 
    if (!isset($_SESSION['admin'])){
        echo "<script>location='../../'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../asset/css/style.css" />
</head>
<body>
    <section class="customer__detail">
        <span class="customer__title">Information Detail</span>
        <div class="customer__detail--info">
            ID: <span id="id" class=""><?php echo htmlspecialchars($data['customer']->getId())?></span><br><br>
            Name: <span id="name" class=""><?php echo htmlspecialchars($data['customer']->getName())?></span><br><br>
            Phone: <span id="phone" class=""><?php echo $data['customer']->getPhone();?></span><br><br>
            Address: <span id="address"><?php echo $data['customer']->getAddress()?></span><br><br>
            Email: <span id="email"><?php echo $data['customer']->getEmail()?></span><br><br>
        </div>
        <button data-id="<?php echo $customer['id']; ?>" class="btn btn-dark btn-back" >
            <i class="fa-solid fa-left-long"></i> Back
        </button>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
    <script src="../../asset/js/customer.js"> </script>   
</body>
</html>