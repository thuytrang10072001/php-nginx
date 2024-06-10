<?php
    namespace Controllers;
    use Core\Controller;
    use Models\Customer\Customer;

    class CustomerController extends Controller {

        public function list() {
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

        public function show($id) {
            $customerModel = $this->model('Repository','customer');
            $data = $customerModel->getCustomerById($id);
            $customer = new Customer($data['id'], $data['name'], $data['phone'],
                                    $data['address'], $data['email']);
            $this->view('customer/Show', ['customer' => $customer]);
        }

        public function insert($customer){
            $customerModel = $this->model('Repository','customer');
            $count = $customerModel->insertCustomer($customer);
            if($count){
                return true;
            }
            return false;
        }

        public function update($customer){
            $customerModel = $this->model('Repository','customer');
            $count = $customerModel->updateCustomer($customer);
            if($count){
                return true;
            }
            return false;
        }

        public function delete($customerId){
            $customerModel = $this->model('Repository','customer');
            $count = $customerModel->deleteCustomer($customerId);
            if($count){
                return true;
            }
            return false;
        }
    }   
?>