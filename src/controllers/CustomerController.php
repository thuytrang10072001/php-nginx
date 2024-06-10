<?php
    namespace Controllers;
    use Core\Controller;
    use Models\Customer\Customer;
    use Respect\Validation\Validator as v;

    class CustomerController extends Controller {

        function getDataFromPost(){
            $name = $phone = $email = $address = $id = "";


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
                    if(!v::alpha(' ')->validate($name)){
                        return false;
                    }
                }
            
                if (isset($_POST["phone"])) {
                    $phone = test_input($_POST["phone"]);
                    if(!v::regex('/^0\d{9,10}$/')->validate($phone)){
                        return false;
                    }
                }
            
                if (isset($_POST["address"])) {
                    $address = test_input($_POST["address"]);
                    if(!v::regex('/[a-zA-Z0-9\s,]+/')->validate($address)){
                        return false;
                    }
                }
            
                if (isset($_POST["email"])) {
                    $email = test_input($_POST["email"]);
                    if(!v::email()->validate($email)){
                        return false;
                    }
                }


                // method $_POST["id] exists to use UPDATE
                if (isset($_POST["id"])) {
                    $id = test_input($_POST["id"]);
                    $customer = new Customer($id,$name, $phone, $address, $email);
                    return $customer;
                }

                // $_POST['idDelete'] exists to use DELETE
                else if (isset($_POST["idDelete"])){
                    $customerId = test_input($_POST["idDelete"]);
                    return $customerId;
                }
                
                // to use CREATE
                else if(isset($_POST["name"]) && isset($_POST["phone"]) &&
                    isset($_POST["address"]) && isset($_POST["email"])){
                        $customer = new Customer('',$name, $phone, $address, $email);
                        unset($_POST["name"]);
                        unset($_POST["phone"]);
                        unset($_POST["address"]);
                        unset($_POST["email"]);
                        return $customer;
                    }
            }

        }

        public function list() {
            if (!isset($_SESSION['admin'])){
                header("Location: http://localhost:8080");    
                exit();
            }else{
                $customerModel = $this->model('Repository','customer');

                $data = $customerModel->getCustomers();
                $customers = array();
                foreach ($data as $customer) {
                    array_push($customers, new Customer($customer['id'], $customer['name'], 
                                                $customer['phone'], $customer['address'],
                                                $customer['email']));
                }
                $this->view('customer/List', ['customers' => $customers]);
            }
        }

        public function show($id) {
            if (!isset($_SESSION['admin'])){
                header("Location: http://localhost:8080");    
                exit();
            }else{
                $customerModel = $this->model('Repository','customer');
                $data = $customerModel->getCustomerById($id);
                $customer = new Customer($data['id'], $data['name'], $data['phone'],
                                    $data['address'], $data['email']);

                $this->view('customer/Show', ['customer' => $customer]);
            }
        }

        public function insert(){
            if (!isset($_SESSION['admin'])){
                header("Location: http://localhost:8080");    
                exit();
            }else{
                $customer = $this->getDataFromPost();
                if(!$customer){
                    $_SESSION['errorInput'] = "Insert unsuccessful\nBecause input invalid!";
                    header('Location: /customer/list');
                    exit();
                }

                $customerModel = $this->model('Repository','customer');
    
                $check = $customerModel->insertCustomer($customer);
                if(!$check){
                    $_SESSION['errorInput'] = "Adding failed customers\nBecause email already exists!";
                    header('Location: /customer/list');
                    exit();
            
                }else{
                    header('Location: /customer/list');
                }
            }
        }

        public function update(){
            if (!isset($_SESSION['admin'])){
                header("Location: http://localhost:8080");    
                exit();
            }else{
                $customer = $this->getDataFromPost();

                if(!$customer){
                    $_SESSION['errorInput'] = "Insert unsuccessful\nBecause input invalid!";
                    header('Location: /customer/list');
                    exit();
                }

                $customerModel = $this->model('Repository','customer');
                $count = $customerModel->updateCustomer($customer);
                if(!$count){
                    $_SESSION['errorInput'] = "Update failed customers\nBecause email already exists!";
                    header('Location: /customer/list');
                    exit();
                }else{
                    header('Location: /customer/list');
                }
            }
        }

        public function delete(){
            if (!isset($_SESSION['admin'])){
                header("Location: http://localhost:8080");    
                exit();
            }else{
                $customerId = $this->getDataFromPost();
                $customerModel = $this->model('Repository','customer');

                $count = $customerModel->deleteCustomer($customerId);
                if(!$count){
                    $_SESSION['errorInput'] = "Delete customer failed!";
                    header('Location: /customer/list');
                    exit();
                }else{
                    header('Location: /customer/list');
                }
            }
        }
    }   
?>