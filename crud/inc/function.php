<?php

define('DB_NAME','D:\localhost\intern_project\crud\data\db.txt');

function seed(){
    $data = array(
        array(
            'id'=> 1,
            'fname' => 'jamal',
            'lname' => 'ahmed',
            'roll' => 12,
            'age' => 10,
        ),
        array(
            'id'=> 2,
            'fname' => 'kamal',
            'lname' => 'ahmed',
            'roll' => 10,
            'age' => 11,
        ),
        array(
            'id'=> 3,
            'fname' => 'Rafi',
            'lname' => 'ahmed',
            'roll' => 13,
            'age' => 12,
        ),
        array(
            'id'=> 4,
            'fname' => 'Imran',
            'lname' => 'ahmed',
            'roll' => 14,
            'age' => 13,
        )
    );

    $serializeData = serialize($data);
    file_put_contents(DB_NAME,$serializeData,LOCK_EX);

}

function allStudentList()
{
    $serializedData = file_get_contents(DB_NAME);
    $students = unserialize($serializedData);

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
                    <td><?php printf('%s %s', $student['fname'], $student['lname'])?></td>
                    <td><?php printf('%s', $student['roll'])?></td>
                    <td><?php printf('%s', $student['age'])?></td>
                    <td><?php printf('<a href="/crud/index.php?id&edit=%s">Edit</a> | <a href="/crud/index.php?id&edit=%s">Delete</a>', $student['id'], $student['id'])?></td>
                </tr>
        <?php } ?>
    </table>
    <?php
}