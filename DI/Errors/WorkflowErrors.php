<?php 
/**
 * File: WorkflowErrors.php
 * Project: PHPDI
 * File Created: Sunday, 25th February 2018 7:12:16 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Friday, 2nd March 2018 9:02:31 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */
namespace WorkflowErrors;
require_once (dirname(__FILE__)."/AbstractException.php");
use \AbstractException as AbstractException;

    final class ConvertingInterfaceToClassNameException extends AbstractException {

        public function __construct($interface) {
            parent::__construct("Interface name is not correctly given: ".$interface);
        }
    }

    final class FileNotFoundException extends AbstractException {

        public function __construct($filepath) {
            parent::__construct("File not found: ".$filepath);
        }
    }

    final class ConstantNotDefinedException extends AbstractException {

        public function __construct($constantName) {
            parent::__construct("Constant not defined: ".$constantName);
        }
    }

    
    final class InterfaceNotInheritedException extends AbstractException {

        public function __construct($interface) {
            parent::__construct("Mapped class do not inherits the given Inteface: ". $interface);
        }
    }

    final class InterfaceNotLoadedException extends AbstractException {

        public function __construct($interface) {
            parent::__construct($interface . " is not declared in the required stack");
        }
    }

    final class ReferenceInjectionPropertiesMissingInConfigException extends AbstractException {

        public function __construct($injection) {
            parent::__construct("Configs: className, isSingleton or lazy properties not set for injection: ".$injection);
        }
    }

    final class ValueTypeInjectionPropertiesMissingInConfigException extends AbstractException {

        public function __construct() {
            parent::__construct("Configs: value, type or name properties not set for injection");
        }
    }

    final class DefaultValueForReferenceInjectionWithParamMissingException extends AbstractException {

        public function __construct($injection, $param) {
            parent::__construct("Default value for injection: ". $injection ." with param: ". $param ." missing.");
        }
    }

