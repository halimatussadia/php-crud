<?php


$fruits = array('apple', 'orange', 'mango', 'pineapple', 'banana', 'dates');

$foods = ['a' =>'apple', 'b' => 'orange', 'c'=> 'mango', 'd' => 'pineapple', 12 => 'dates', '13' => 'banana'];

$foods1 = array_slice($foods,0,3);
$foods2 = array_slice($foods,3,null,true);
$foodMerge = array_merge($foods1,$foods2);

$arrayPlus = $foods1 + $foods2 ;
print_r($arrayPlus);

//print_r($foods1);
//echo "<br>";
//print_r($foods2);
//echo "<br>";
//print_r($foodMerge);


