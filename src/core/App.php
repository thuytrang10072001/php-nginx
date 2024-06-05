<?php

namespace App\core;
use App\controllers\CustomerController;

class App {
    private $view;

    public function __construct() {
        $this->view = (new CustomerController())->index();
    }
}