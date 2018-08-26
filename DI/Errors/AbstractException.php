<?php 
/**
 * File: GlobalExceptions.php
 * Project: PHPDI
 * File Created: Saturday, 17th February 2018 6:29:41 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Saturday, 3rd March 2018 7:39:16 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

require_once (dirname(__FILE__)."/../Log/ErrorLogger.php");
require_once (dirname(__FILE__)."/../Lib/Config.php");

abstract class AbstractException extends Exception {

    //public function _construct($paramName) {
    //    parent::_construct("Parameter: ".$paramName." is missing or not passed to the function ");
    //}

    public function __construct($msg) {
        parent::__construct($msg);
        if (Config::IS_FULL_ERROR_LOGGING_ENABLED) {
            ErrorLogger::getInstance()->tryLoggingError($this);
        }

    }
}




