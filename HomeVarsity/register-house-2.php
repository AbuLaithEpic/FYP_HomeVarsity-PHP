<?php 
    include 'connect.php';

    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    $version=$_GET['versionpass'];
    // End line amek email dari page sebelum

    if(isset($_POST['submit'])){
        $add1=$_POST['address-1'];
        $add2=$_POST['address-2'];
        $add3=$_POST['address-3'];
        $add4=$_POST['address-4'];
        $add5=$_POST['address-5'];

        $sql="insert into `address`(version,email,line1,line2,postcode,city,state)
        values('$version','$email_string','$add1','$add2','$add3','$add4','$add5')" ;
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
                <h1 class="soalan"> Where is your place located?</h1>
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
                <div class="tajuk"><h1>Enter your address</h1></div>
                <div class="content2">
                    <form method="post">
                        <div class="isi-alamat">
                           <label for="address-1">Address line 1</label>
                           <input type="text" name="address-1" id="address-1" value=<?php if (isset($_POST['submit'])) {echo $_POST['address-1'];} ?>>
                        </div>
                        <div class="isi-alamat">
                           <label for="address-2">Address line 2</label>
                           <input type="text" name="address-2" id="address-2" value=<?php if (isset($_POST['submit'])) {echo $_POST['address-2'];} ?>>
                        </div>
                        <div class="isi-alamat">
                           <label for="address-3">Postcode</label>
                           <input type="text" name="address-3" id="address-3" value=<?php if (isset($_POST['submit'])) {echo $_POST['address-3'];} ?>>
                        </div>
                        <div class="isi-alamat">
                           <label for="address-4">City</label>
                           <input type="text" name="address-4" id="address-4" value=<?php if (isset($_POST['submit'])) {echo $_POST['address-4'];} ?>>
                        </div>
                        <div class="isi-alamat">
                           <label for="address-5">State</label>
                           <input type="text" name="address-5" id="address-5" value=<?php if (isset($_POST['submit'])) {echo $_POST['address-5'];} ?>>
                        </div>
                        <button type="submit" class="confirm"  name="submit">Confirm Address</button>
                    </form>
                    
                </div>
                <div class="kaki">
                    <?php  echo "<a class=\"back\" href=\"register-house-1.php?emailpass=".$email_string."&versionpass=".$version."\">Back </a>"; ?>
                    <?php  echo "<a class=\"next\" href=\"register-house-3.php?emailpass=".$email_string."&versionpass=".$version."\">Next </a>"; ?>
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