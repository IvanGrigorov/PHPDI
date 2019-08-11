<?php

include_once __DIR__."/../../DI/Utils/ConfigValidator.php";
include_once __DIR__."/../../DI/Errors/GlobalExceptions.php";
include_once __DIR__."/../../DI/Errors/WorkflowErrors.php";

use PHPUnit\Framework\TestCase;;
use PHPUnit\Framework\Error\Notice;
use GlobalExcpetions\ParameterNotGIvenException;
use WorkflowErrors\ConvertingInterfaceToClassNameException;


class ConfigValidatorTest extends TestCase {


    protected function setUp(): void
    {
        Notice::$enabled = FALSE;
    }


    /////////////////////////////////////////////////
    // areAllNodesForReferenceInjectionInserted /////
    /////////////////////////////////////////////////

    public function test_ConfigValidator_areAllNodesForReferenceInjectionInserted_shouldReturnFalseIfClassNameNotSet(): void
    {
        // Arrange
        $json = '{"isSingleton":true,"lazy":true}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForReferenceInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForReferenceInjectionInserted_shouldReturnFalseIfIsSingletonNotSet(): void
    {
        // Arrange
        $json = '{"className":"Class","lazy":true}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForReferenceInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForReferenceInjectionInserted_shouldReturnFalseIfLazyNotSet(): void
    {
        // Arrange
        $json = '{"className":"Class","isSingleton":true}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForReferenceInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForReferenceInjectionInserted_shouldReturnTrueIfEverithingIsSet(): void
    {
        // Arrange
        $json = '{"className":"Class","isSingleton":true,"lazy":true}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForReferenceInjectionInserted($jsonDecoded);

        // Assert
        $this->assertTrue($validation);

    }


    /////////////////////////////////////////////////
    // areAllNodesForValueTypeInjectionInserted /////
    /////////////////////////////////////////////////

    public function test_ConfigValidator_areAllNodesForValueTypeInjectionInserted_shouldReturnFalseIfNameNotSet(): void
    {
        // Arrange
        $json = '{"type":"Test","value":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForValueTypeInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForValueTypeInjectionInserted_shouldReturnFalseIfTypeNotSet(): void
    {
        // Arrange
        $json = '{"name":"Test","value":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForValueTypeInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForValueTypeInjectionInserted_shouldReturnFalseIfValueNotSet(): void
    {
        // Arrange
        $json = '{"type":"Test","type":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForValueTypeInjectionInserted($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_areAllNodesForValueTypeInjectionInserted_shouldReturnTrueIfEverithingIsSet(): void
    {
        // Arrange
        $json = '{"name":"Test","type":"Test","value":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::areAllNodesForValueTypeInjectionInserted($jsonDecoded);

        // Assert
        $this->assertTrue($validation);

    }


    ///////////////////////////////
    // isParamDefaultValueSet /////
    ///////////////////////////////

    public function test_ConfigValidator_isParamDefaultValueSet_shouldReturnFalseIfDefaulValuetNotSet(): void
    {
        // Arrange
        $json = '{"Test":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::isParamDefaultValueSet($jsonDecoded);

        // Assert
        $this->assertFalse($validation);

    }

    public function test_ConfigValidator_isParamDefaultValueSet_shouldReturnTrueIfDefaultValueIsSet(): void
    {
        // Arrange
        $json = '{"defaultValue":"Test"}';
        $jsonDecoded = json_decode($json, true);

        // Act 
        $validation = ConfigValidator::isParamDefaultValueSet($jsonDecoded);

        // Assert
        $this->assertTrue($validation);

    }
    
}