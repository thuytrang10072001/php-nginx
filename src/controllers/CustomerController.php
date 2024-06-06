<?php
    namespace App\Controllers;
    use App\Core\Controller;

    class CustomerController extends Controller {
        public function list() {
            $customerModel = $this->model('Customer');
            $customers = $customerModel->getCustomers();
            $this->view('customer/list', ['customers' => $customers]);
        }

        public function show($id) {
            $customer = $this->model->getCustomerById($id);
            $this->view('customers/show', ['customer' => $customer]);
        }
    }