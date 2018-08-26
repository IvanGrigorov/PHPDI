<?php
/**
 * File: Validator.php
 * Project: PHPDI
 * File Created: Saturday, 17th February 2018 3:29:32 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 2:32:35 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

require_once(dirname(__FILE__)."/../Errors/ObjectParametersExceptions.php");
require_once(dirname(__FILE__)."/../Errors/GlobalExceptions.php");
require_once(dirname(__FILE__)."/../Errors/WorkflowErrors.php");
require_once(dirname(__FILE__)."/../Lib/Config.php");


use ObjectParametersExceptions; 
use GlobalExceptions;
use WorkflowErrors;


final class ConfigValidator {

    public static function areAllNodesForReferenceInjectionInserted($json) {
        if (!$json["className"] || !$json["isSingleton"] || !$json["lazy"]) {
            return false;
        }
        return true;
    }

    public static function areAllNodesForValueTypeInjectionInserted($json) {
        if (!$json["name"] || !$json["type"] || !$json["value"]) {
            return false;
        }
        return true;
    }

    public static function isParamDefaultValueSet ($json) {
        if (!$json["defaultValue"]) {
            return false;
        }
        return true;
    }

}