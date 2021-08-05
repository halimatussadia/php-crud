<?php
require_once "inc/function.php";

$info = '';
$task = isset($_GET['task']) ? $_GET['task'] : '';

if('seed' == $task)
{
    seed();
    $info = "seeding is complete";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 4 Website Example</title>
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
    <h1>CRUD project</h1>
    <p>Create a crud project using php</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <?php include_once "inc/templates/nav.php"?>
</nav>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-md-12">
            <?php
                if($info){
                    echo $info;
                }
            ?>
        </div>
    </div>

    <?php if('list' == $task){ ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                    allStudentList()
                ?>
            </div>
        </div>
    <?php }?>

</div>

<?php include_once "inc/templates/footer.php"?>

</body>
</html>
