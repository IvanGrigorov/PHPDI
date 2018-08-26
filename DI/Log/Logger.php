<?php 
/**
 * File: Logger.php
 * Project: PHPDI
 * File Created: Sunday, 25th February 2018 7:12:16 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 2:32:42 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */

require_once(dirname(__FILE__)."/../Lib/Config.php");
require_once(dirname(__FILE__)."/ErrorLogger.php");
require_once(dirname(__FILE__)."/../Errors/WorkflowErrors.php");
require_once(dirname(__FILE__)."/../Utils/Validator.php");

use WorkflowErrors;

final class Logger {

    private $filePathToLogInstantiations;
    private static $instance = null;


    private function __construct() {
        $this->filePathToLogInstantiations = Config::LOG_FILE_NAME;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    private function log($backtrace, $injection) {
        file_put_contents($this->filePathToLogInstantiations, "==================== \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogInstantiations, "file: ".$backtrace[0]["file"]. " \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogInstantiations, "line: ".$backtrace[0]["line"]. " \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogInstantiations, "injection: ".$injection. " \r\n", FILE_APPEND); 
        file_put_contents($this->filePathToLogInstantiations, "==================== \r\n", FILE_APPEND); 
    }

    public function tryLoggingInjection($backtrace, $injection) {
        if (Config::IS_LOGGING_ENABLED) {
            try {
                Validator::checkIfFileExists($this->filePathToLogInstantiations);
                $this->log($backtrace, $injection);
            }
            catch(\WorkflowErrors\FileNotFoundException $e) {
                var_dump($e->getMessage());
            }
        }
    }
}