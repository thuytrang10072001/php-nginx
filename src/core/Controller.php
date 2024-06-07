<?php
    namespace Core;
    // use Models\Customer\Repository;

    class Controller {
        public function model($model) {
            require_once './src/models/' . $model . '/Repository.php';
            return new Repository();
        }

        public function view($view, $data = []) {
            require_once './src/views/'. $view . '.php';
        }
    }