<?php
//Composer autoload
require 'vendor/autoload.php';
//Loading the class and create new instance
use SHD\Checker as Checker;
$checker = new Checker;


//Performing our actions
echo $checker->checkPalindrome("A man, a plan, a canal – Panamas");

?>