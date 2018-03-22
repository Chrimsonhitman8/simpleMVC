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

session_start();

// include the bootstrap file
require_once("../app/bootstrap.php");

// instantiate the core class
$core = new Core;