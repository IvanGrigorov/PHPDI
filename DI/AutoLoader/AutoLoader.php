<?php
/**
 * File: AutoLoader.php
 * Project: PHPDI
 * File Created: Wednesday, 28th February 2018 9:44:41 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 2:32:40 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

 require_once(dirname(__FILE__)."/../Log/ErrorLogger.php");
require_once(dirname(__FILE__)."/../Utils/Validator.php");



 final class AutoLoader {
     
    public function __construct() {

    }

    public function load($path) {
        try { 
            Validator::checkIfFileExists($path);
            require_once($path);
        }   
        catch (Exception $e) {
            ErrorLogger::getInstance()->tryLoggingError($e);
        }
    }

 }