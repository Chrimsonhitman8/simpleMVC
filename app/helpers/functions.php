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

/**
 * Contains functions for help other classes
 */

 function redirect($url){
    header('Location: '.URLROOT.$url);
 }

 function flash($name = "",$message = "",$class = "success"){

    $class = "alert alert-dismissible alert-".$class;

    $_SESSION[$name."_message"] = $message;
    $_SESSION[$name."_class"] = $class;

 }