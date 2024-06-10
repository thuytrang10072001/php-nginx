<?php
namespace App;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Core\Router;
use PDO;  

class App
{

    private $__controller, $__action, $__params, $__route;
    function __construct()
    {
        global $routes;

        $this->__route = new Router();

        $this->__controller = $routes['DEFAULT_CONTROLLER'];
        $this->__action = "index";
        $this->__params = array();
        $this->handleUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $url = $_SERVER['REQUEST_URI'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->__route->handleRoute($url);
        // cutomer/list
        $urlArr = array_filter(explode('/', $url));
        $urlCheck = "";
        // 0 -> customer; 1 -> list
        if (!empty($urlArr)){
            foreach($urlArr as $key => $item)
            {
                $urlCheck.=$item.'/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArray=explode('/', $fileCheck);

                $fileArray[count($fileArray) - 1] = ucfirst($fileArray[count($fileArray) -1]);
                $fileCheck = implode('/', $fileArray);
                
                if(!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }

                if (file_exists('./src/controllers/' . $fileCheck . 'Controller' . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
    
            }

            $urlArr = array_values($urlArr);
           
        }
       

        if (!empty($urlArr[0])) {
            $urlCheck = $urlCheck . 'Controller';
            $this->__controller = ucfirst($urlArr[0]) . 'Controller';
        } else {
            $urlCheck = ucfirst($this->__controller). 'Controller';
            $this->__controller = ucfirst($this->__controller).  'Controller';
        }

        if (file_exists('./src/controllers/'  . $urlCheck .  '.php')) {          
            require_once './src/controllers/' . $urlCheck  . '.php';

            if (class_exists("\Controllers\\".ucfirst(str_replace("/", "\\", $urlCheck)))) {
                $this->__controller = "\Controllers\\".ucfirst(str_replace("/", "\\", $urlCheck));
                $this->__controller = new $this->__controller();

                unset($urlArr[0]);
            }
        } else{
            echo "Page Not Found2";
            die;
        }

        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // echo '<pre>';
        // print_r($this->__controller);
        // echo '<br>';
        // print_r($this->__action);
        // echo '</pre>';

        $this->__params = array_values($urlArr);
        
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else

            echo "Page Not Found";
           
    }
}