<?php

include_once __DIR__."/../../DI/AutoLoader/AutoLoader.php";
include_once __DIR__."/../../DI/Errors/WorkflowErrors.php";

use PHPUnit\Framework\TestCase;
use WorkflowErrors;


class AutoLoaderTest extends TestCase {

    public function test_AutoLoader_load_shouldReturnFalseWithInvalidPath(): void
    {
        // Arrange
        $autoloader = new AutoLoader();
        $fileToUpload = "invalidPath";

        // Act and Assert

        $autoloader->load($fileToUpload);
        $this->assertFalse(in_array($fileToUpload, get_included_files()));

    }

    public function test_AutoLoader_load_shouldReturnTrueWithValidPath(): void
    {
        // Arrange
        $autoloader = new AutoLoader();
        $fileToUpload = __DIR__."\..\..\DI\Lib\Config.php";

        // Act and Assert

        $autoloader->load($fileToUpload);
        var_dump(get_included_files());
        $this->assertTrue(in_array(realpath($fileToUpload), get_included_files()));

    }
}