<?php 
    include 'connect.php';

    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    $version=$_GET['versionpass'];
    // End line amek email dari page sebelum

    if(isset($_POST['submit'])){
        $no_phone=$_POST['no-phone'];
        $no_link=$_POST['no-link'];

        $sql="insert into `contact`(version,email,phone,link)
        values('$version','$email_string','$no_phone','$no_link')" ;
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
                <h1 class="soalan"> How do tenants contact you?</h1>
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
                <div class="tajuk"><h1>Enter your contact information</h1></div>
                <div class="content7">
                    <form method="post">
                        <div class="isi-no-phone">
                           <input type="text" name="no-phone" id="no-phone" placeholder="012-3456789" value=<?php if (isset($_POST['submit'])) {echo $_POST['no-phone'];} ?>>
                           <label for="no-phone">Phone Number</label>
                        </div>
                        <div class="isi-no-phone">
                           <input type="text" name="no-link" id="no-link" placeholder="https://wa.me/012-3456789" value=<?php if (isset($_POST['submit'])) {echo $_POST['no-link'];} ?>>
                           <label for="no-link">Whatsapp / other link</label>
                        </div>
                        <button type="submit" class="confirm"  name="submit">Confirm Contact Information</button>
                    </form>
                    
                </div>
                <div class="kaki">
                    <?php  echo "<a class=\"back\" href=\"register-house-6.php?emailpass=".$email_string."&versionpass=".$version."\">Back </a>"; ?>
                    <?php  echo "<a id=\"finish\" class=\"next\" href=\"register-house-8.php?emailpass=".$email_string."&versionpass=".$version."\">Finish </a>"; ?>
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