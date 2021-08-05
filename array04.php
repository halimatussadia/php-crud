<?php
$foods = ['a' =>'apple', 'b' => 'orange', 'c'=> 'mango', 'd' => 'pineapple', 12 => 'dates', '13' => 'banana'];
$numbers = [1,2,3,4,56,88,66,90];


if(in_array(56,$numbers)){
    echo "56 number is found";
}else{
    echo "56 number is not found";
}

echo "<br>";

if(key_exists('b', $foods)){
    echo "key b is exists";
}



