<?php
namespace Core;

class Router{
    function handleRoute($url){
        global $routes;
        unset($routes['DEFAULT_CONTROLLER']);
        // echo "<pre>";
        // print_r($routes);
        $url = trim($url, '/');

        $handleUrl = $url;

        // if(!empty($routes)){
        //     foreach($routes as $key => $value){
        //         if(preg_match('~'.$key.'~is', $url)){
        //             $handleUrl = preg_replace('~'.$key.'~is', $value, $url);
        //         }
        //     }

        // }

        return $handleUrl;
    }
}
?>