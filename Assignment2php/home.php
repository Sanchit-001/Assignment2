<?php
include 'user_auth.php';
include 'connect.php';
include 'nav.php';
        
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css" integrity="sha384-T5m5WERuXcjgzF8DAb7tRkByEZQGcpraRTinjpywg37AO96WoYN9+hrhDVoM6CaT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>crudapplication</title>

  </head>
  
  <body>
    <div class="conatiner my-3">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - <?php echo $_SESSION['email']; ?> </h4>
            <p>Hey, how are you doing? Welcome to our website. You are logged in as <?php echo $_SESSION['email']; ?> </p>
            <p class="mb-0">Go to the admin page by clicking <a href="display.php">here</a></p>
            <P1>choose a profile photo
            <style>
  P1{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    min-height: 100vh;
  }

</style>
            <form action="upload.php"
                  method="post"
                  enctype="multipart/form-data">
            <input type="file"
                   name="my_image">
            <input type="submit"
                   name="submit"
                   value="upload"></P1>
 
  </body>
</html>