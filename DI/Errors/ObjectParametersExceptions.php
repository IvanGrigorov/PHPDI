<?php 
/**
 * File: ObjectParametersExceptions.php
 * Project: PHPDI
 * File Created: Saturday, 17th February 2018 6:12:12 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Friday, 2nd March 2018 8:50:19 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

namespace ObjectParametersExceptions;
require_once (dirname(__FILE__)."/AbstractException.php");
use \AbstractException as AbstractException;

    final class MissingParametersException extends AbstractException {
        public function __construct() {
            parent::__construct("Missing parameters in injection config");
        }
    }

    final class MissingNameInParametersException extends AbstractException {
        public function __construct($paramName) {
            parent::__construct("Missing name: " .$paramName. " from the input config");
        }
    }

    final class MissingValueForParametersException extends AbstractException {
        public function __construct($paramName) {
            parent::__construct("Value for parameter: " .$paramName. " not given");
        }
    }

    final class InvocatorNotAllowedException extends AbstractException {
        public function __construct($invocatorClassName, $className) {
            parent::__construct($invocatorClassName. " is not part of the allowed invocators for ". $className);
        }
    }
    