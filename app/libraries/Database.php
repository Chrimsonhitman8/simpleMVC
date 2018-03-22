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

 class Database{

    private $dbhost = DB_HOST;
    private $dbname = DB_NAME;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;

    private $conn;
    private $stmt;
    private $error;

    public function __construct(){
        //database source name
        $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try{
            $this->conn = new PDO($dsn,$this->dbuser,$this->dbpass,$option);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }

    }

    public function query($sql){
        $this->stmt = $this->conn->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
          switch(true){
            case is_int($value):
              $type = PDO::PARAM_INT;
              break;
            case is_bool($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
            default:
              $type = PDO::PARAM_STR;
          }
        }
        $this->stmt->bindValue($param, $value, $type);
      }

      public function execute(){
          return $this->stmt->execute();
      }

      // Get result set as array of objects
      public function result_set(){
          $this->execute();
          return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      public function single(){
          $this->execute();
          return $this->stmt->fetch(PDO::FETCH_OBJ);
      }

      public function row_count(){
        return $this->stmt->rowCount();
      }
 }
