<?php
/**
 * File: Utils.php
 * Project: PHPDI
 * File Created: Saturday, 24th February 2018 2:43:29 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 2:32:37 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */


require_once(dirname(__FILE__)."/../Errors/GlobalExceptions.php");
require_once(dirname(__FILE__)."/../Errors/WorkflowErrors.php");

use GlobalExceptions;
use WorkflowErrors;


final class Utils {

    public function __construct() {

    }
    

    public function extractClassNameFromInterfaceName($interface) {
        if (!isset($interface)) {
            throw new \GlobalExceptions\ParameterNotGIvenException();
        }
        $replacesCount = 1;
        $className = str_replace("I", "_", $interface, $replacesCount); 
        if ($className === $interface) {
            throw new \WorkflowErrors\ConvertingInterfaceToClassNameException($interface);
        }
        return $className;


    }
}