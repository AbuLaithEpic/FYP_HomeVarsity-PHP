<?php
include 'connect.php';
$email = null;
// $emailpass=null;

// if(!$emailpass = null){
//     $emailpass=$_GET['emailpass'];
//     $sql2 = "SELECT * FROM account
//     WHERE $emailpass=email";
//     $result2 = mysqli_query($con, $sql2);
//     $row=mysqli_fetch_assoc($result2);
//         $print_name=$row['type'];
//         $print_Ic=$row['type'];
//         $print_email=$row['type'];}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $ic = $_POST['ic'];
    $nama = $_POST['nama'];
    $date = date('Y-m-d h:i:s');

    $sql = "insert into `account`(email,ic,nama,date_created)
        values('$email','$ic','$nama','$date')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo '<div class="alert alert-success" role="alert" style="position:fixed;
            z-index: 999; width: 100%;">
            <strong>Success!</strong> Data inserted successfully.
          </div>';
    } else {
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
            <h1 class="soalan"> Before we start, introduce yourself</h1>
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
            <div class="tajuk">
                <h1>Enter your personal information</h1>
            </div>
            <div class="content0">
                <form method="post">
                    <div class="isi-personal">
                        <input type="text" name="nama" id="personal-nama" placeholder="Muhamad Ali bin Abu" value=<?php if (isset($_POST['submit'])) {
                                                                                                                        echo $_POST['nama'];
                                                                                                                    } ?>>
                        <label for="personal-nama">Full Name</label>
                    </div>
                    <div class="isi-personal">
                        <input type="text" name="ic" id="personal-ic" placeholder="000313060769" value=<?php if (isset($_POST['submit'])) {
                                                                                                            echo $_POST['ic'];
                                                                                                        } ?>>
                        <label for="personal-ic">IC Number</label>
                    </div>
                    <div class="isi-personal">
                        <input type="text" name="email" id="jarak" placeholder="ali@gmail.com" value=<?php if (isset($_POST['submit'])) {
                                                                                                            echo $_POST['email'];
                                                                                                        } ?>>
                        <label for="jarak">Email</label>
                    </div>
                    <button type="submit" class="confirm" name="submit" onclick="upload_element_3()">Confirm Personal Information</button>
                </form>
            </div>
            <div class="kaki">

                <a class="back" href="mainpage.html">Back</a>
                <?php echo "<a class=\"next\" href=\"register-house-1.php?emailpass=" . $email . "\">Next </a>"; ?>
                <!-- <a class="next" href="register-house-1.php">Next</a> -->

            </div>
        </div>
    </div>
</body>

</html>

<script>
    function togglePopup() {
        document.getElementById("popup-1").classList.toggle("active");
    }
</script>
