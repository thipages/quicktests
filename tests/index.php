<?php
include ("../vendor/autoload.php");
include("Tests_Foo.php");
use thipages\quick\tests\QTests;
$html=QTests::getOutput(Tests_Foo::class,false);
echo($html);