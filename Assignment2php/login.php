<?php
$login=false;
$showError=false;
if(isset($_POST['submit'])){
    include 'connect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `crud` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header("location:home.php");
            }
            else{
                $showError = "Invalid Credentials";
            }
        }
    }
    else{
        $showError = "Invalid Credentials";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css">

    <title>CRUD Application</title>
  </head>
  <body>
<?php
include 'nav.php';
?>
    <h1 class="text-center my-3">Login here to Proceed</centre></h1>
    <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible" fade show" role="alert">
            <strong>Success!</strong> You are now logged in. 
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span></button>
            </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible" fade show" role="alert">
            <strong>Error!</strong> '.$showError.' 
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span></button>
            </div>';
    }
    ?>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Input your email" name="email" autocomplete="off">
            </div>
            <div class="form-group my-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Input your password" name="password" autocomplete="off">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the correct information</small>
            </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>
    </div>
  </body>
</html>