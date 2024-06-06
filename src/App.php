<?php

require_once 'Router.php';  
// namespace App\Core;
// use App\Controllers\CustomerController;

// class App {
//     // private $view;

//     // public function __construct() {
//     //     $this->view = (new CustomerController())->list();
//     // }
//     protected $controller = 'CustomerController';
//     protected $method = 'list';
//     protected $params = [];

//     public function __construct() {
//         $url = $this->parseUrl();
//         if (file_exists('./src/controllers/' . $url[0] . 'Controller.php')) {
//             $this->controller = $url[0] . 'Controller';
//             unset($url[0]);
//         }

//         require_once './src/controllers/' . $this->controller . '.php';
//         $this->controller = new $this->controller;

//         if (isset($url[1])) {
//             if (method_exists($this->controller, $url[1])) {
//                 $this->method = $url[1];
//                 unset($url[1]);
//             } else if (is_numeric($url[1])) {
//                 $this->method = 'show';
//                 $this->params = [$url[1]];
//                 unset($url[1]);
//             }
//         }

//         $this->params = $url ? array_values($url) : [];

//         call_user_func_array([$this->controller, $this->method], $this->params);
//     }

//     public function parseUrl() {
//         if (isset($_GET['url'])) {
//             echo explode('', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
//             return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
//         }
//     }
// }