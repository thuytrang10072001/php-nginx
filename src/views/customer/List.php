<?php         
    use Models\Customer\Customer;
    use Controllers\CustomerController;
    use Respect\Validation\Validator as v;

    $name = $phone = $email = $address = $id = "";
    $uri = 'http://localhost:8080/customer/list';
    if (!isset($_SESSION['admin'])){
        header("Location: http://localhost:8080");    
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if (isset($_POST["id"])) {
            $id = test_input($_POST["id"]);
        }

        if (isset($_POST["name"])) {
            $name = test_input($_POST["name"]);
        }
    
        if (isset($_POST["phone"])) {
            $phone = test_input($_POST["phone"]);
        }
    
        if (isset($_POST["address"])) {
            $address = test_input($_POST["address"]);
        }
    
        if (isset($_POST["email"])) {
            $email = test_input($_POST["email"]);
        }

        $controller = new CustomerController();

        // method $_POST["id] exists to use UPDATE
        if (isset($_POST["id"])) {
            $id = test_input($_POST["id"]);
            $customer = new Customer($id,$name, $phone, $address, $email);
            if (method_exists($controller, 'update')) {
                $controller->update($customer);
                unset($_POST['id']);
            } else
                echo "Page Not Found";
        }

        // $_POST['idDelete'] exists to use DELETE
        else if (isset($_POST["idDelete"])){
            $customerId = test_input($_POST["idDelete"]);
            if (method_exists($controller, 'delete')) {
                $controller->delete($customerId);
                unset($_POST['idDelete']);
            } else
                echo "Page Not Found";
        }
        
        // to use CREATE
        else if(isset($_POST["name"]) && isset($_POST["phone"]) &&
            isset($_POST["address"]) && isset($_POST["email"])){
                $customer = new Customer('',$name, $phone, $address, $email);
                if (method_exists($controller, 'insert')) {
                    unset($_POST["name"]);
                    unset($_POST["phone"]);
                    unset($_POST["address"]);
                    unset($_POST["email"]);
                    $controller->insert($customer);
                } else
                    echo "Page Not Found";
            }

        header("Location: /customer/list"); //Load page 
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
        <script>
            function logOut(){
                location='../';
            }
        </script>
    </head>
    <body>
        <section class="customer">
        <div class="customer__title text-center ">Customer List</div>
            <div class="customer__list">
                <div class="customer__list--btn d-flex justify-content-between">
                    <button  type="button" data-id="<?php echo $customer['id']; ?>" class="btn btn-success btn-add"  data-bs-toggle="modal" data-bs-target="#modalForm">
                        Add  <i class="fa-solid fa-plus"></i>
                    </button>
                    <button onclick="logOut()" type="button" class="btn btn-dark btn-log-out">
                        Log out 
                    </button>
                </div>
                
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
                                        <button  class="btn btn-primary btn-update" 
                                                data-id="<?php echo $customer->getId(); ?>" data-name="<?php echo $customer->getName();?>"  
                                                data-phone="<?php echo $customer->getPhone();?>" data-address="<?php echo $customer->getAddress();?>"
                                                data-email="<?php echo $customer->getEmail(); ?>"
                                                data-bs-toggle="modal" data-bs-target="#modalForm">
                                            Update  <i class="fa-regular fa-pen-to-square">
                                            </i>
                                        </button>
                                        <button  data-id="<?php echo $customer->getId(); ?>" data-name="<?php echo $customer->getName(); ?>"
                                                class="btn btn-danger btn-delete" 
                                                data-bs-toggle="modal" data-bs-target="#modalDelete">
                                            Delete  <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id='form' >
                        <div class="mb-3 show-id" style="display: none">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="id" name='id' disabled ></input>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name='name' pattern="[a-zA-Z\s]+" title="Only letters and white space allowed" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name='phone' pattern="^0\d{9,10}$" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="address"  pattern="[a-zA-Z0-9\s,]+" title="Only letters, numbers, commas and white space allowed" name='address' required></input>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name='email' required></input>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-submit" >Add</button>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure delete this customer?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id='formDelete' >
                        <div class="mb-3" >
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="idDelete" name='idDelete' readonly ></input>                
                        </div>
                        <div class="mb-3 show-id">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="nameDelete" name='nameDelete' readonly ></input>                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-delete-submit">Delete</button>
                        </div>
                    </form>      
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>            
        <script src="../../asset/js/customer.js"> </script>                 
    </body>
</html>
