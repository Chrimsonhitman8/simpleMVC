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

 class Home_model {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }
/*
    public function save_message($data){

        $this->db->query("INSERT INTO messages (name,email,subject,message) VALUES (:name,:email,:subject,:message)");
        $this->db->bind(":name",$data["name"]);
        $this->db->bind(":email",$data["email"]);
        $this->db->bind(":subject",$data["subject"]);
        $this->db->bind(":message",$data["message"]);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
*/
 }
