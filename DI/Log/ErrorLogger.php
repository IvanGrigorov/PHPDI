<?php 
/**
 * File: Logger.php
 * Project: PHPDI
 * File Created: Sunday, 4th March 2018 4:54:18 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 2:32:38 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

require_once(dirname(__FILE__)."/../Lib/Config.php");

final class ErrorLogger {

    private $filePathToLogInstantiations;
    private static $instance = null;

    private function __construct() {
        $this->filePathToLogErrors = Config::ERROR_FILE_NAME;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new ErrorLogger();
        }
        return self::$instance;
    }

    private function log($error) {
        $currentDateTime = new DateTime();
        file_put_contents($this->filePathToLogErrors, "==================== \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogErrors, "error: ".$error. " \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogErrors, "time: ".$currentDateTime->format('Y-m-d-H-i-s'). " \r\n", FILE_APPEND);  
        file_put_contents($this->filePathToLogErrors, "==================== \r\n", FILE_APPEND); 

    }

    public function tryLoggingError($error) {
        if (Config::IS_ERROR_LOGGING_ENABLED) {
            try {
                Validator::checkIfFileExists($this->filePathToLogErrors);
                $this->log($error);
            }
            catch(\WorkflowErrors\FileNotFoundException $e) {
                var_dump($e->getMessage());
            }
        }
    }
}