<?php
require_once "inc/function.php";
$info = '';
$task = isset($_GET['task']) ? $_GET['task'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : 0;
if ('seed' == $task) {
    seed();
    $info = 'seeding is complete';
}
$fname = '';
$lname = '';
$roll = '';
$age = '';
$id = '';
if(isset($_POST['submit'])){
    $fname = filter_input(INPUT_POST,'fname',FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST,'lname',FILTER_SANITIZE_STRING);
    $roll = filter_input(INPUT_POST,'roll',FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST,'age',FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_STRING);

    if($id){
        if($fname != '' && $lname != '' && $age != '' && $roll != ''){
            $result = updateStudent($id,$fname,$lname,$age,$roll);

            if($result){
                header('location: /test/index.php?task=report');
            }else{
                $error = 1;
            }

        }
    }else{
        if($fname != '' && $lname != '' && $age != '' && $roll != ''){
            $result = addStudent($fname,$lname,$age,$roll);

            if($result){
                header('location: /test/index.php?task=report');
            }else{
                $error = 1;
            }

        }
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Project CRUD</h1>
    <p>A simple project to perform crud operation using HTML and PHP</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <?php include_once "inc/templates/nav.php" ?>
</nav>

<div class="container" style="margin-top:30px;text-align: center">
    <div class="row">
        <div class="col-md-12">
            <?php
            if ($info) {
                echo "$info";
            }
            ?>
        </div>
    </div>

    <?php if ('1' == $error) : ?>
        <div class="row">
            <div class="col-md-12">
                <blockquote>Duplicate roll</blockquote>
            </div>
        </div>
    <?php endif ?>

    <?php if ('report' == $task) : ?>
        <div class="row">
            <div class="col-md-12">
                <?php generateReport(); ?>
            </div>
        </div>
    <?php endif ?>

    <?php if ('add' == $task) : ?>
        <div class="row">
            <form action="/test/index.php?task=add" method="post">
                <div>
                    <div class="form-group">
                        <label for="email">First Name</label>
                        <input type="text" name="fname" value="<?php echo $fname?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Last Name</label>
                        <input type="text" name="lname"  value="<?php echo $lname?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter Last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Roll</label>
                        <input type="number" name="roll"  value="<?php echo $roll?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter your roll">
                    </div>
                    <div class="form-group">
                        <label for="email">Age</label>
                        <input type="number" name="age"  value="<?php echo $age?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter your age">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    <?php endif ?>


    <?php if ('edit' == $task) : ?>
    <?php $student = getStudent($_GET['id'])  ?>
        <div class="row">
            <form method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <div class="form-group">
                        <label for="email">First Name</label>
                        <input type="text" name="fname" value="<?php echo $student['fname']?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Last Name</label>
                        <input type="text" name="lname"  value="<?php echo $student['lname']?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter Last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Roll</label>
                        <input type="number" name="roll"  value="<?php echo $student['roll']?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter your roll">
                    </div>
                    <div class="form-group">
                        <label for="email">Age</label>
                        <input type="number" name="age"  value="<?php echo $student['age']?>"
                               class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Enter your age">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    <?php endif ?>
</div>

</body>
</html>
