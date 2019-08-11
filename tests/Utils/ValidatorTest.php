<?php

include_once __DIR__."/../../DI/Utils/Validator.php";
include_once __DIR__."/../../DI/Errors/GlobalExceptions.php";
include_once __DIR__."/../../DI/Errors/WorkflowErrors.php";

use PHPUnit\Framework\TestCase;
use GlobalExcpetions\ParameterNotGIvenException;
use WorkflowErrors\FileNotFoundException;


class ValidatorTest extends TestCase {


    //////////////////////////
    // checkIfFileExists /////
    //////////////////////////


    public function test_Validator_checkIfFileExists_shouldThrowExceptionWhenFileDoesNotExist(): void
    {
        // Arrange
        $invalidFilePath = "TEST";

        // Act and Assert

        $this->expectException(FileNotFoundException::class);
        Validator::checkIfFileExists($invalidFilePath);

    }

    public function test_Validator_checkIfFileExists_shouldThrowExceptionWhenWrongInterfaceGiven(): void
    {
        // Arrange
        $validFilePath = __DIR__."/UtilsTest.php";

        // Act 
        Validator::checkIfFileExists($validFilePath);

        // Assert 
        $this->assertTrue(true);
    }

    
}