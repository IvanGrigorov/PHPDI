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

namespace GlobalExcpetions;
require_once (dirname(__FILE__)."/AbstractException.php");
use \AbstractException as AbstractException;

    final class ParameterNotGIvenException extends AbstractException {

        //public function _construct($paramName) {
        //    parent::_construct("Parameter: ".$paramName." is missing or not passed to the function ");
        //}

        public function __construct() {
            parent::__construct("Parameter are missing or not passed to the function ");
        }
    }

    final class ParameterNotSetException extends AbstractException {

        public function __construct($parameter) {
            parent::__construct($parameter . " is not set in the object config");
        }
    }


