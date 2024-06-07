<?php
    namespace Controllers;
    use Core\Controller;
    use Models\Customer\Customer;

    class CustomerController extends Controller {

        public function list() {
            $customerModel = $this->model('customer');

            $data = $customerModel->getCustomers();
            $customers = array();
            foreach ($data as $customer) {
                array_push($customers, new Customer($customer['id'], $customer['name'], 
                                            $customer['phone'], $customer['address'],
                                            $customer['email']));
            }
            $this->view('customer/list', ['customers' => $customers]);
        }

        public function show($id) {
            $customerModel = $this->model('customer');
            $data = $customerModel->getCustomerById($id);
            $customer = new Customer($data['id'], $data['name'], $data['phone'],
                                    $data['address'], $data['email']);
            $this->view('customer/show', ['customer' => $customer]);
        }

        public function insert($customer){
            $customerModel = $this->model('customer');
        }


    }   