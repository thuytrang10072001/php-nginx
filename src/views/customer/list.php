<?php             
    use Respect\Validation\Validator as v;

    $name = $phone = $email = $address = "";
    $nameErr = $phoneErr = $emailErr = $addressErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        $name = test_input($_POST["name"]);
        if (!v::alpha(' ')->validate($name)) {
            $nameErr = "Only letters and white space allowed";
        }
        
        $address = test_input($_POST["phone"]);
        if (![0-9]{3}-[0-9]{3}-[0-9]{3}) {
            $addressErr = "Only numbers and length of 9 numbers ";
        }
    
        $address = test_input($_POST["address"]);
        if (!v::alnum(' ', ',')->validate($address)) {
            $addressErr = "Only letters, numbers, and commas allowed";
        }
    
        $email = test_input($_POST["email"]);
        if (!v::email()->validate($email);) {
             $emailErr = "Invalid email format";
        }
        
    
        // Nếu không có lỗi, thêm đối tượng Customer vào mảng
        if (empty($nameErr) && empty($addressErr) && empty($emailErr)) {
            $array[] = new Customer($name, $phone, $address, $email);
            header("Location: " . $_SERVER['PHP_SELF']); // Chuyển hướng
            exit();
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer List</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../../asset/css/style.css" />
    </head>
    <style>
      

    </style>
    <body>
        <section class="customer">
        <div class="customer__title text-center ">Customer List</div>
            <div class="customer__list">
                <button type="button" data-id="<?php echo $customer['id']; ?>" class="btn btn-success btn-add"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add  <i class="fa-solid fa-plus"></i>
                </button>
                <table  class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>                
                    <tbody class="table-body">
                            <?php foreach($data['customers'] as $customer): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($customer->getId()); ?></td>
                                    <td><?php echo htmlspecialchars($customer->getName()); ?></td>
                                    <td><?php echo htmlspecialchars($customer->getPhone()); ?></td>
                                    <td><?php echo htmlspecialchars($customer->getAddress());?></td>
                                    <td><?php echo htmlspecialchars($customer->getEmail()); ?></td>
                                    <td>
                                        <button data-id="<?php echo $customer->getId(); ?>" class="btn btn-secondary btn-detail" >
                                            Detail  <i class="fa-regular fa-eye"></i>
                                        </button>
                                        <button data-id="<?php echo $customer->getId(); ?>" class="btn btn-primary" >
                                            Update  <i class="fa-regular fa-pen-to-square">
                                            </i>
                                        </button>
                                        <button data-id="<?php echo $customer->getId(); ?>" class="btn btn-danger" >
                                            Delete  <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" required></input>
                            <span class="error"><?php echo '* '.$nameErr;?></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Phone:</label>
                            <input type="tel" class="form-control" id="phone" required></input>
                            <span class="error"><?php echo '* '.$phoneErr;?></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="address" required></input>
                            <span class="error"><?php echo '* '.$addressErr;?></span>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" required></input>
                            <span class="error"><?php echo '* '.$emailErr;?></span>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Add</button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
        <script src="../../asset/js/customer.js"> </script>                 
    </body>
</html>

