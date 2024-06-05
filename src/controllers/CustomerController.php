<?php
    namespace App\controllers;
    use App\core\Controller;

    class CustomerController extends Controller {
        public function index() {
            $customerModel = $this->model('Customer');
            $customers = $customerModel->getCustomers();
            $this->view('customer', ['customers' => $customers]);
        }
    }