<?php

$fruits = array(
    'apple',
    'orange',
    'mango',
    'pineapple',
    'banana',
    'dates'
);

//$fruits1 = array_slice($fruits,2);
$fruits1 = array_slice($fruits,2,-1);
print_r($fruits1);
echo "<br>";
$fruits1 = array_slice($fruits,2,3,true);
print_r($fruits1);
echo "<br>";
print_r($fruits);

echo "<br>";

$foods = [
   'a' =>'apple',
   'b' => 'orange',
   'c'=> 'mango',
   'd' => 'pineapple',
    12 => 'dates',
    '13' => 'banana',
];

$foods1 = array_slice($foods,1,null,true);
print_r($foods1);
echo "<br>";
print_r($foods);

