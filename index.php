<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once(dirname(__FILE__)."/DI/Lib/DIContract.php");

        $contract =  DIContract::getInstance();


        $test = $contract->getInjection("IURLParser");
        $testValueType = $contract->getInjectedValueType("named", "string");
        $test = $contract->getInjectionWithParams("IURLParser", 
        ["params" => array([
            "name" => "url",
            "value"=> "test"])
        ]);
        $result = $test->parseUrlTest("one", "two", "three");

        $test2 = $contract->getInjectionWithParams("IURLParser", 
        ["params" => array([
            "name" => "url"])
        ]);


        ?>
    </body>
</html>

