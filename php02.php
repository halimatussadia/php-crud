<?php
$name = "sadia";
echo $name;
echo "<br>";
$name = "php";
echo $name;
echo "<br>";

//constant

define('PI',3.141);
echo PI;


//Function

include_once "function02.php";

$x=13;
if(is_Even($x)){ //argument
    echo "$x is an Even number";
}else{
    echo "$x is an odd number";
}

echo "<br>";

//Factorial

$x = 5;
echo "Factorial $x is " . factorial($x);
echo "<br>";

//default value pass
$ft = 'Tea';

$n = 4;

serve($ft,$n);
echo "<br>";

//unlimited argument pass

echo sum(5,6,7,8,9);

echo "<br>";

function triangle($n)
{
    $k = 2 * $n -2;
    for ($i = 0; $i<$n; $i++){
        for ($j = 0; $j<$k; $j++)
            echo " ";
        $k = $k - 1;

        for ($j= 0 ; $j<=$i ; $j++){
            echo "* ";
        }

        echo "\n";
    }
}



