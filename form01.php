<?php
include_once "formFunction.php";
$fruits = ["apple","banana","orange","mango","grape"];
$allowed = [
        "image/png",
        "image/jpg",
        "image/jpeg",
];
if($_FILES['photo']){
    if(in_array($_FILES['photo']['type'],$allowed) !== false && $_FILES['photo']['size']<5*1024*1024){
        move_uploaded_file($_FILES['photo']['tmp_name'],"files/" . $_FILES['photo']['name']);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <div class="row" style=" padding: 20px">
        <h1>Form</h1>
        <?php
        $email = '';
        $password = '';
        $checked = '';

        if(isset($_REQUEST['cb1']) && $_REQUEST['cb1']==1){
            $checked = 'checked';
        }
        ?>

        <p>
            <?php if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
                $email = $_REQUEST['email'];
            }?>

            <?php if(isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
                $password = $_REQUEST['password'];
            } ?>

<!--            --><?php
//               if(isset($_REQUEST['fruits']) && $_REQUEST['fruits'] != '') {
//                   printf("You have selected: %s", filter_input(INPUT_POST,'fruits',FILTER_SANITIZE_STRING));
//               }
//            ?>

            <?php
               $s_fruits = filter_input(INPUT_POST,'fruits',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
               if(count($s_fruits)>0){
                   echo "You have selected: ".join(", ", $s_fruits);
               }
            ?>
        </p>

        <p>
            Email : <?php echo $email ?> <br>
            Password : <?php echo $password ?> <br>
        </p>

        <pre>
            <p>
                <?php print_r($_FILES)?>
            </p>
        </pre>

        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                    value="<?php echo $email?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    value="<?php echo $password?>">
                </div>

                <div class="form-group">
                    <label for="image">Photo</label>
                    <input class="form-control" name="photo" id="image" type="file">

                </div>
                <div class="form-group">
                    <label for="password">Fruits</label>
                    <select class="form-control" name="fruits[]" id="password" multiple>
                        <option value="" disabled selected>Select some fruits</option>
                        <?php displayFruits($fruits,$s_fruits)?>
                    </select>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="cb1" value="1" <?php echo $checked?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <label class="form-check-label" for="exampleCheck1">select some fruits</label>
                <div class="form-check">
                    <input type="checkbox" name="vegetables[]" value="potato" <?php vegetableChecked('vegetables','potato');?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Potato</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="vegetables[]" value="capsicum" <?php vegetableChecked('vegetables','capsicum');?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Capsicum</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="vegetables[]" value="brinjal" <?php vegetableChecked('vegetables','brinjal');?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Brinjal</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="vegetables[]" value="chili" <?php vegetableChecked('vegetables','chili');?> class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Chili</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>