<?php
include_once "form2Function.php";
$allowedFile = [
        "image/png",
        "image/jpg",
        "image/jpeg",
];
if($_FILES['photo']){
    $totalFile = count($_FILES['photo']['name']);
    for($i = 0 ; $i<$totalFile;$i++){
        if(in_array($_FILES['photo']['type'][$i],$allowedFile) !== false && $_FILES['photo']['size'][$i]<5*1024*1024){
            move_uploaded_file($_FILES['photo']['tmp_name'][$i],"files/".$_FILES['photo']['name'][$i]);
        }
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
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div>
    <h3>Form Handling</h3>
</div>

<div class="container">
    <p>
        <?php
        $email = '';
        $address = '';
        $password = ''
        ?>
    </p>

    <p>
        <?php if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])) { ?>
//            $email = htmlspecialchars($_REQUEST['email']);
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
       <?php }?>

        <?php if(isset($_REQUEST['address']) && !empty($_REQUEST['address'])) {
//            $address = htmlspecialchars($_REQUEST['address']);
            $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
        }?>

        <?php if(isset($_REQUEST['password']) && !empty($_REQUEST['password'])) {
//            $password = htmlspecialchars($_REQUEST['password']);
            $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
        }?>

    </p>

    <pre>
        <p>
            <?php print_r($_FILES)?>
        </p>
    </pre>

    <p>
        Email : <?php echo $email;?><br/>
        Address : <?php echo $address;?><br/>
        Password : <?php echo $password;?>
    </p>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-d">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" value="<?php echo $email;?>"
                           class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" name="address" value="<?php echo $address;?>"
                           class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="<?php echo $password;?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo[]" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo[]" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo[]" class="form-control" id="exampleInputPassword1" placeholder="Password">
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