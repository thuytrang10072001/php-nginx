<?php

// namespace App\Core;
// use App\Controllers\CustomerController;

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';
namespace App;
class App
{

    private $__controller, $__action, $__params, $__route;
    function __construct()
    {
        global $routes;

        // $this->__route = new Route();

        // $this->__controller = $routes['DEFAULT_CONTROLLER'];
        // $this->__action = "index";
        // $this->__params = array();
        $this->handleUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl()
    {
        $url = $this->getUrl();
        echo 'Hello World';
        echo $url;
        // $url = $this->__route->handleRoute($url);

        // $urlArr = array_filter(explode('/', $url));
        // $urlArr = array_values($urlArr);
        
        // $urlCheck = "";
        // if (!empty($urlArr)){
        //     foreach($urlArr as $key => $item)
        //     {
        //         $urlCheck.=$item.'/';
        //         $fileCheck = rtrim($urlCheck, '/'); 
        //         $fileArray=explode('/', $fileCheck);
        //         $fileArray[count($fileArray) - 1] = ucfirst($fileArray[count($fileArray) -1]);
        //         $fileCheck = implode('/', $fileArray);
              
        //         if(!empty($urlArr[$key-1])){
        //             unset($urlArr[$key-1]);
        //         }
    
        //         if (file_exists('controllers/' . $fileCheck . 'Controller' . '.php')) {
        //             $urlCheck = $fileCheck;
        //             break;
        //         }
    
        //     }

        //     $urlArr = array_values($urlArr);
           
        // }
       

        // if (!empty($urlArr[0])) {
        //     $urlCheck = $urlCheck . 'Controller';
        //     $this->__controller = ucfirst($urlArr[0]) . 'Controller';
        // } else {
        //     $urlCheck = ucfirst($this->__controller). 'Controller';
        //     $this->__controller = ucfirst($this->__controller).  'Controller';
        // }

        // // echo '<pre>';
        // // print_r('controllers/'  . $urlCheck);
        // // echo "<br>".$this->__controller. "<br>";
        // // // file_exists('controllers/' . ($this->__controller) . 'Controller.php') ? print_r("true"): print_r("false");

        // // echo '</pre>';
        // if (file_exists('controllers/'  . $urlCheck .  '.php')) {
           
        //     require_once 'controllers/' . $urlCheck  . '.php';
        //     if (class_exists("\Controllers\\".ucfirst(str_replace("/", "\\", $urlCheck)))) {
        //         $this->__controller = "\Controllers\\".ucfirst(str_replace("/", "\\", $urlCheck));
    
        //         $this->__controller = new $this->__controller();
              
        //         unset($urlArr[0]);
        //     }
        // } else{
        //     echo "Page Not Found2";
        //     die;
        // }
        // // echo '<pre>';
        // // print_r($this->__controller);
        // // echo '</pre>';
        // if (!empty($urlArr[1])) {
        //     $this->__action = $urlArr[1];
        //     unset($urlArr[1]);
        // }

        // // echo '<pre>';
        // // print_r($this->__controller);
        // // echo '<br>';
        // // print_r($this->__action);
        // // echo '</pre>';

        // $this->__params = array_values($urlArr);
        // // method_exists($this->__controller, $this->__action) ? print_r("true") : print_r("false");
        
        // if (method_exists($this->__controller, $this->__action)) {
        //     call_user_func_array([$this->__controller, $this->__action], $this->__params);
        // } else
        //     echo "Page Not Found";
           
    }
}