<?php
    namespace App\Core;
    use App\Models\Customer;

    class Controller {
        public function model($model) {
            return new Customer();
        }

        public function view($view, $data = []) {
            require_once './src/views/'. $view . '.php';
        }
    }