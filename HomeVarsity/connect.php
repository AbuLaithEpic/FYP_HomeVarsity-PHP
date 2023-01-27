<?php 

    $con = new mysqli('localhost', 'root', '' , 'home_varsity_db');

    if(!$con){
        die(mysqli_error($con));
    }

?>