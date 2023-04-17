<?php

$conn = mysqli_connect("localhost","root","","crudapplication");

if(!$conn){
    die(mysqli_error($conn));
}
?>