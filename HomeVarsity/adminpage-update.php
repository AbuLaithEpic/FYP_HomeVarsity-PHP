<?php
include 'connect.php';
$approval=$_GET['approval'];
$id=$_GET['updateid'];
$sql = "UPDATE approval SET approve = '$approval' WHERE version=$id";
$result = mysqli_query($con, $sql);
if($result){
    header('location:adminpage.php');
}else{
    die(mysqli_error($con));
}
