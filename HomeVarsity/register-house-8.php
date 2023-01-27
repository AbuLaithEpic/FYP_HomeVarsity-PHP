<?php 
    include 'connect.php';
    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    $version=$_GET['versionpass'];
    // End line amek email dari page sebelum
    
        $approve="pending";

        $sql="insert into `approval`(version,email,approve)
        values('$version','$email_string','$approve')" ;
        $result=mysqli_query($con, $sql);
    
?>

<html>
    <head></head>
    <body>
        <div class="background">
        <div class="logo"> <img src="./images/uum.png" alt=""></div>
            <div class="putih">
                <div class="tick"> <img src="./images/tick_ok.png" alt=""></div>
                <h1>Registration</h1>
                <h1>Successfull</h1>
                <div class="message"><p>Thank you. We will review your registration and will send you a confirmation response via email and phone within approximately 6-7 days.</p></div>
                <?php  echo "<a id=\"finish\" class=\"next\" href=\"hostingpage.php?emailpass=".$email_string."\" style >Okay </a>"; ?>
            </div>
        </div>
    </body>
</html>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .background{
        background-image: url(./images/background.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100%;
    }
    .logo img{
        height: 120px;
        width: 90px;
    }
    .putih{
        background-color: white;
        width: 50%;
        height: 70%;
        text-align: center;
        margin: 0 auto;
    }
    .tick img{
        height: 120px;
        width: 120px;
        margin: 10px;
    }
    .message{
        background-color: #BEE3BF;
        color: #41AD49;
        font-weight: bold;
        text-align: justify;
        margin: 50px 120px;
    }
    .message p{
        padding: 20px;
    }
    #finish{
        display: inline-block;
        padding: 7px 30px;
        text-align: center;
        font-size: 15px;
        text-decoration: none;
        color: white;
        border-radius: 10px;
        cursor: pointer;
        background-color: #F3329A;
    }
</style>