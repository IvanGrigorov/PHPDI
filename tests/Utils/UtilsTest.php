<?php

include_once __DIR__."/../../DI/Utils/Utils.php";
include_once __DIR__."/../../DI/Errors/GlobalExceptions.php";
include_once __DIR__."/../../DI/Errors/WorkflowErrors.php";

use PHPUnit\Framework\TestCase;
use GlobalExcpetions\ParameterNotGIvenException;
use WorkflowErrors\ConvertingInterfaceToClassNameException;


class UtilsTest extends TestCase {

    public function test_Utils_extractClassNameFromInterfaceName_shouldThrowExceptionWhenParamNotGiven(): void
    {
        // Arrange
        $utils = new Utils();

        // Act and Assert

        $this->expectException(ArgumentCountError::class);
        $utils->extractClassNameFromInterfaceName();

    }

    public function test_Utils_extractClassNameFromInterfaceName_shouldThrowExceptionWhenWrongInterfaceGiven(): void
    {
        // Arrange
        $utils = new Utils();
        $interface = "Test";

        // Act and Assert

        $this->expectException(ConvertingInterfaceToClassNameException::class);
        $utils->extractClassNameFromInterfaceName($interface);

    }

    public function test_Utils_extractClassNameFromInterfaceName_shouldReturnCorrectClassName(): void
    {
        // Arrange
        $utils = new Utils();
        $interface = "ITest";

        // Act and Assert

        $className = $utils->extractClassNameFromInterfaceName($interface);
        $this->assertEquals("_Test", $className);
    }

    
}