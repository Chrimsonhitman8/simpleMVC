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

class Controller{

    //get the model
    public function model($model){
        //require the model
        require_once("../app/models/". $model .".php");
        //instantiate the model
        return new $model();
    }

    // get the view
    public function view($view, $page_data = []){
        //check for the file
        if(file_exists("../app/views/". $view .".php")){
            //require the file
            require_once("../app/views/". $view .".php");
        }else{
            //require the file
            require_once("../app/views/404.php");
        }
    }
}