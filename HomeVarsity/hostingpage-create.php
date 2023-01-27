<?php 
    
    include 'connect.php';
    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    // Amek version dari database +1
    $sql2="SELECT MAX(version)+1 AS MaxVersion FROM type_house WHERE email='$email_string';";
    $result2=mysqli_query($con, $sql2);
    if(mysqli_num_rows($result2) > 0)//resord is there or not
            { 
                foreach($result2 as $row2)
                {
                    $version = $row2['MaxVersion'];
                }
            }


    if(isset($_POST['submit'])){
        $type=$_POST['rumah'];

        $sql="insert into `type_house`(email,type)
        values('$email_string','$type') ORDER BY version DESC LIMIT 1" ;
        $result=mysqli_query($con, $sql);
        if($result){
            echo '<div class="alert alert-success" role="alert" style="position:fixed;
            z-index: 999; width: 100%;">
            <strong>Success!</strong> Data inserted successfully.
          </div>';
        }else{
            die(mysqli_error($con));
        }
    }
?>   

<html>
    <head>
        <title>REGISTER</title>
        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="registration">
            <div class="div1">
                <div class="logo"> <img src="./images/uum.png" alt=""></div>
                <h1 class="soalan"> What kind of house will guests have?</h1>
            </div>
            <div class="div2">
                <div class="button"> <a href="#!">Exit</a></div>
                <div class="content1">
                    <form method="post">
                        <div class="pilih-rumah">
                           <input type="radio" name="rumah" id="terrace" value="Terrace House" <?php if (isset($_POST['rumah']) && $type == "Terrace House"){echo empty($_POST['rumah']) ? '' : ' checked="checked" ';}  ?>>
                           <label for="terrace">A terrace house</label> 
                        </div>
                        <div class="pilih-rumah">
                           <input type="radio" name="rumah" id="single" value="Single House" <?php if (isset($_POST['rumah']) && $type == "Single House"){echo empty($_POST['rumah']) ? '' : ' checked="checked" ';}  ?>> 
                           <label for="single">A single house</label> 
                        </div>
                        <div class="pilih-rumah">
                           <input type="radio" name="rumah" id="flat" value="Flat / Apartment" <?php if (isset($_POST['rumah']) && $type == "Flat / Apartment"){echo empty($_POST['rumah']) ? '' : ' checked="checked" ';}  ?>>
                           <label for="flat">Flat / apartment</label>  
                        </div>
                        <button type="submit" class="confirm"  name="submit">Confirm House Type</button>
                    </form>
                </div>
                <div class="kaki">
                    <?php  echo "<a class=\"back\" href=\"hostingpage.php?emailpass=".$email_string."\">Back </a>"; ?>
                    <?php  echo "<a class=\"next\" href=\"register-house-2.php?emailpass=".$email_string."&versionpass=".$version."\">Next </a>"; ?>
                </div>
            </div>
        </div>
    </body>
    <script src="script.js"></script>
</html>