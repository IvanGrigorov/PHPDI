<?php

/**
 * File: URLParser.1.php
 * Project: PHPDI
 * File Created: Monday, 5th March 2018 2:54:41 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Monday, 5th March 2018 5:45:39 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */


class Proxy {

    private $objectToDecorate = null;
    private $initialisedObject = null;
    private $params = null;
    
    public function __construct($objectToDecorate, $params = null) {
        if ($params != null) {
            $this->objectToDecorate = $objectToDecorate;
            $this->params = $params;
        }
        else {
            $this->objectToDecorate = $objectToDecorate;
        }
    }

    public function __call($name, $params) {
        $this->tryToDecorate();
        return call_user_func_array(array($this->initialisedObject, $name), $params);
    } 

    public function __get($name) {
        $this->tryToDecorate();
        return($this->initialisedObject->$name);
    }
    
    public function __set($name, $value) {
        $this->tryToDecorate();
        $this->initialisedObject->$name = $value;
    }

    private function tryToDecorate() {
        if ($this->initialisedObject === null) {
            if ($this->params == null) {
                $this->initialisedObject = new $this->objectToDecorate();
            }
            else {
                $this->initialisedObject = new $this->objectToDecorate(...$this->params);
            }
        }
    }
}

?>