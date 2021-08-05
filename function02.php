<?php
function is_Even($n){ //parameter
    if($n%2==0)  {
        return true;
    }
    return false;
}

//factorial

function factorial($n){
    if(gettype($n) != 'integer'){
        return 'invalid';
    }
    $result = 1;
    for($i =$n; $i>1; $i--){
       $result *=$i;
    }
    return $result;
}


//default value

function serve($foodType, $numberOfFood = 2)
{
    echo "$numberOfFood cup $foodType has been serve";
}

//unlimited parameter

function sum(...$numbers){
    $result = 0;
    for($i=0;$i<count($numbers);$i++){
        $result += $numbers[$i];
    }
    return $result;
}

