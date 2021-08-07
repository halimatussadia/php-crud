<?php
define('DB_NAME', 'D:/localhost/intern_project/test/data/db.txt');
function seed()
{
    $data = array(
        array(
            "id" => 1,
            "fname" => 'Kamal',
            "lname" => 'Ahmed',
            "age" => 10,
            "roll" => 1,
        ),
        array(
            "id" => 2,
            "fname" => 'Jamal',
            "lname" => 'Ahmed',
            "age" => 9,
            "roll" => 2,
        ),
        array(
            "id" => 3,
            "fname" => 'Tanjila',
            "lname" => 'Akhi',
            "age" => 8,
            "roll" => 3,
        ),
        array(
            "id" => 4,
            "fname" => 'Halima',
            "lname" => 'Sadia',
            "age" => 7,
            "roll" => 4,
        ),
        array(
            "id" => 5,
            "fname" => 'Sabikon',
            "lname" => 'Nahar',
            "age" => 6,
            "roll" => 5,
        ),
    );

    $serializeData = serialize($data);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);

}

function generateReport()
{
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?php printf('%s %s', $student['fname'], $student['lname']) ?></td>
                <td><?php printf('%s', $student['roll']) ?></td>
                <td><?php printf('%s', $student['age']) ?></td>
                <td><?php printf('<a href="/test/index.php?task=edit&id=%s">Edit</a>|<a href="/test/index.php?task=delete&id=%s">Delete</a>', $student['id'], $student['id']) ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php

}

function addStudent($fname, $lname, $age, $roll)
{
    $found = false;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);

    foreach ($students as $_student) {
        if ($_student['roll'] == $roll) {
            $found = true;
            break;
        }
    }

    if (!$found) {
        $newId = count($students) + 1;
        $student = array(
            'id' => $newId,
            'fname' => $fname,
            'lname' => $lname,
            'age' => $age,
            'roll' => $roll,
        );

        array_push($students, $student);
        $serializedData = serialize($students);
        file_put_contents(DB_NAME, $serializedData, LOCK_EX);

        return true;
    }
    return false;
}

function getStudent($id)
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);


    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return  false;
}

function updateStudent($id,$fname, $lname, $age, $roll)
{
    $found = false;
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);

    foreach ($students as $_student) {

        if ($_student['roll'] == $roll & $_student['id'] != $id) {
            $found = true;
            break;
        }
    }

    if (!$found) {
        $students[$id-1]['fname'] = $fname;
        $students[$id-1]['lname'] = $lname;
        $students[$id-1]['age'] = $age;
        $students[$id-1]['roll'] = $roll;

        $serializedData = serialize($students);
        file_put_contents(DB_NAME, $serializedData, LOCK_EX);

        return true;
    }
    return false;
}

