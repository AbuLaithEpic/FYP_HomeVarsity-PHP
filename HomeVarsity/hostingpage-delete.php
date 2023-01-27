<?php 
    include 'connect.php';
    $getemail=$_GET['deleteeemail'];
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        
        $sql = "BEGIN;
        DELETE FROM pictures WHERE version = $id;
        DELETE FROM address WHERE version = $id;
        DELETE FROM type_house WHERE version = $id;
        DELETE FROM quantity WHERE version = $id;
        DELETE FROM distance WHERE version = $id;
        DELETE FROM price WHERE version = $id;
        DELETE FROM contact WHERE version = $id;
        COMMIT;";

        $result = mysqli_multi_query($con, $sql);
        if($result){
            header('location:hostingpage.php?emailpass='.$getemail.'');
        }else{
            die(mysqli_error($con));
        }
    }

?>