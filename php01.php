<?php

include_once "function.php";



function triangle($n)
{
    $k = 2 * $n - 2;
    for ($i = 0; $i < $n; $i++)
    {
        for ($j = 0; $j < $k; $j++)
            echo " ";
        $k = $k - 1;
        for ($j = 0; $j <= $i; $j++ )
        {
            echo "* ";
        }
        echo "\n";
    }
}

$n = 5;
triangle($n);