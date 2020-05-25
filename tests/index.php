<?php
include ("../vendor/autoload.php");
include("Tests_Foo.php");
use thipages\quick\QTag;
use thipages\quick\tests\QTests;
$html=QTests::test(Tests_Foo::class,false);
echo($html);