<?php 
    include 'connect.php';
    $version = null;
    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    // End line amek email dari page sebelum

    if(isset($_POST['submit'])){
        $type=$_POST['rumah'];

        $sql="insert into `type_house`(email,type)
        values('$email_string','$type')" ;
        $result=mysqli_query($con, $sql);
        if($result){
            echo '<div class="alert alert-success" role="alert" style="position:fixed;
            z-index: 999; width: 100%;">
            <strong>Success!</strong> Data inserted successfully.
          </div>';
        
        }else{
            die(mysqli_error($con));
        }

        // amek email dan version dalan database
        $sql2="SELECT * FROM `type_house` ORDER BY version DESC LIMIT 1";
        $result2=mysqli_query($con,$sql2);
        if($result2){
            $row=mysqli_fetch_assoc($result2);
            $version = $row['version'];
            echo $version;
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
                <div class="button" onclick="togglePopup()"> <a href="#!">Exit</a></div>
                <!-- Exit punya START -->
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content-popup">
                    <h1>Quit Registration Process?</h1>
                    <br>
                    <h4>By clicking yes, all of your registration process will be erased.</h4>
                    <br>
                    <button class="no-button" onclick="togglePopup()">No</button>
                    <button class="yes-button" onclick="location.href = 'mainpage.html';">Yes</button>
                </div>
            </div>
            <!-- Exit popup END -->
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
                    <?php  echo "<a class=\"back\" href=\"register-house-0.php?emailpass=".$email_string."\">Back </a>"; ?>
                    <?php  echo "<a class=\"next\" href=\"register-house-2.php?emailpass=".$email_string."&versionpass=".$version."\">Next </a>"; ?>
                </div>
            </div>
        </div>
    </body>
    <script src="script.js"></script>
</html>

<script>
    function togglePopup() {
        document.getElementById("popup-1").classList.toggle("active");
    }
</script>