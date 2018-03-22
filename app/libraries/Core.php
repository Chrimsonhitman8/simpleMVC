<?php

/**
 * Simple MVC
 *
 * An open source MVC framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018, Chamodya Wimansha
 *
 * @package	SimpleMVC
 * @author	chamodya wimansha
 * @copyright	Copyright (c) 2018, chamodya wimansha
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	
 * @since	Version 1.0.0
 */

class Core{

    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    function __construct(){

        if($url = $this->get_url()){
            //check for the controller in the controllers folder
            if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php" )){
                $this->controller = ucwords($url[0]);
            }

            //check for the method in url
            if(isset($url[1])){
                $this->method = $url[1];
            }
            // Get params
            if($url){
                // unset the controller
                unset($url[0]);
                // unset the method
                unset($url[1]);
                // if the array is not empty store them in params
                $this->params = array_values($url);
            }
        }
        // print_r($this->controller);
        // echo "<br>";
        // print_r($this->method); 
        // echo "<br>";               
        // print_r($this->params);
        // die();        

        //set the current menu item
        $_SESSION["current-menu-item"] = $this->controller;

        // require the controller
        require_once "../app/controllers/" . $this->controller . ".php";
        //instantiating the controller class
        $this->controller = new $this->controller;

        //check for the method in the class
        if(!method_exists($this->controller,$this->method)){
            // if not, set the method to default
            $this->method = "index";
        }
        
        // calling the method in the controller class with parameters
        call_user_func_array([$this->controller,$this->method],[$this->params]);

    }

    private function get_url(){
        //if url is set, get the url
        if(isset($_GET["url"])){
            $url = $_GET["url"];
            //remove the last "/"
            $url = rtrim($url,"/");
            // sanitize the url to remove any harmful characters
            $url = filter_var($url,FILTER_SANITIZE_URL);
            //split the url by "/"
            $url = explode("/",$url);

            return $url;
        }else{
            return false;
        }
    }

}