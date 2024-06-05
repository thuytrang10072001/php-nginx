<?php
    namespace App\core;
    use App\models\Customer;

    class Controller {
        public function model($model) {
            return new Customer();
        }

        public function view($view, $data = []) {
            require_once './src/views/'. $view . '.php';
        }
    }