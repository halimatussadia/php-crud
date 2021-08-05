<?php
//
//
//
//$students = array(
//
//    'rohim ',
//    'korim ',
//    'salam ',
//    'sadi ',
//
//);
////
////array_push($students,'halima');
////array_unshift($students,'imran ');
//
//$students[3] = 'Sadia ';
//
//$n = count($students);
//for($i=0;$i<$n; $i++){
//    echo $students[$i];
//}
//
////$foods = [
////    'vegetable' => 'alu, capsicum, sweet-potato',
////    'fruits' => 'apple, orange',
////    'drinks' => 'milk',
////];
////
////foreach ($foods as $key=>$value){
////    echo $key. ' = '. $value;
////    echo '<br>';
////}
//
////$keys = array_keys($students);
////for($i=0; $i<count($keys);$i++){
////    $key = $keys[$i];
////    echo $students[$key];
////}
//
////$values = array_values($students);
////
////for($i=0; $i<count($values);$i++){
////    $value = $values[$i];
////    echo $value;
////}
//
////$vegetable = explode(', ','potato, capsicum, sweet-potato');
////print_r($vegetable);
////echo "<br>";
////$vegetableString = join(', ',$vegetable);
////echo $vegetableString;
//
//$foods = [
//    'vegetable' => explode(', ','potato, brinjal, carrot, capsicum'),
//    'fruits' => explode(', ','apple, banana, orange'),
//    'drinks' => explode(' ,','milk, apple juice')
//];
//
//print_r($foods);
//
//echo "<br>";
//echo $foods['vegetable'][2];
//
//echo "<br>";
//
//array_push($foods['drinks'],'orange juice');
//
//print_r($foods);
//
//echo "<br>";
//
//$sample = [
//    'test' => [
//        'test_again' => [
//            'a ',
//            'b ',
//            'c ',
//            'd '
//        ]
//    ]
//];
//
//echo $sample['test']['test_again'][2];
//
//echo "<br>";
//
//$sample2 = [
//    [1, 2, 3, 4],
//    [11, 22, 33, 44],
//    [111, 222, 333, 444],
//    [1111, 2222, 3333,[5,6,7]],
//];
//
//echo $sample2[3][3][2];
//
//echo "<br>";
//
//$student = [
//  'fname' => 'kamal',
//  'lname' => 'ahmed' ,
//  'age' => '15' ,
//  'class' => 8,
//  'section' => 'B'
//];
//
//print_r($student);
//
//echo "<br>";
//echo $student['fname']. " " .$student['lname'];
//
//echo "<br>";
//printf("%s %s",$student['fname'], $student['lname']);
//
//echo "<br>";
//
//$serialized = serialize($student);
//echo $serialized;
//
//echo "<br>";
//
// print_r(unserialize($serialized));
//
//echo "<br>";
//
//$jsondata = json_encode($student);
//echo $jsondata;
//
//echo "<br>";
//
//print_r(json_decode($jsondata,true));
//
//echo "<br>";
////json javascript notation object


$person = [
    'fname' => 'hello',
    'lname' => 'world'
];

$newperson = $person; // copy by value|| deep copy, shallow copy || copy reference
$newperson['lname'] = 'PHP';

print_r($person);
echo "<br>";
print_r($newperson);

echo "<br>";

function printData(&$person){
    $person['fname'] .= ' changed';
    print_r($person);
}

printData($person);
echo "<br>";
print_r($person);


echo "<br>";


//
//$person = [
//    'fname' => 'hello',
//    'lname' => 'world'
//];
//
// array_pop($person);
// print_r($person);

$name = 0;

if(isset($name)){
    echo 'name is set';
}else{
    echo 'name is not set';
}

echo "<br>";

if(empty($name)){
    echo 'name is empty';
}else{
    echo 'name is not empty';
}

echo "<br>";

if(isset($name) && (is_numeric($name) || $name != '')){
    echo "name is set and it's not empty";
}else{
    echo "name is either not set and it's empty";
}





