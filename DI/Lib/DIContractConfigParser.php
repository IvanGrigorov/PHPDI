<?php
/*
 * File: DIContractConfigParser.php
 * Project: PHPDI
 * File Created: Thursday, 22nd March 2018 9:51:49 pm
 * Author: Ivan Grigorov
 * Contact:  ivangrigorov9 at gmail.com
 * -----
 * Last Modified: Saturday, 24th March 2018 3:08:06 pm
 * Modified By: Ivan Grigorov
 * -----
 * License: MIT
 */



final class DIContractConfigParser {

    private $filePathToConfig;
    private $decodedConfig;

    public function __construct($filePathToConfig) {
        $this->filePathToConfig = $filePathToConfig;
        $this->decodeConfig();
    }

    private function getConfigContentFromFile() {
        $configContent = file_get_contents($this->filePathToConfig);
        return $configContent;
    }

    private function decodeConfig() {
        $this->decodedConfig = json_decode($this->getConfigContentFromFile(), true);
    }

    public function getMappedObject() {
        if ($this->decodedConfig["mapInstances"]) {
            return $this->decodedConfig["mapInstances"];
        }
        return null;
    }

    public function getMapValueTypes() {
        if ($this->decodedConfig["mapValueTypes"]) {
            return $this->decodedConfig["mapValueTypes"];
        }
        return null;    }

    public function getMapParameterBasedObjects() {
        if ($this->decodedConfig["mapParameterBasedObjects"]) {
            return $this->decodedConfig["mapParameterBasedObjects"];
        }
        return null;    }
}