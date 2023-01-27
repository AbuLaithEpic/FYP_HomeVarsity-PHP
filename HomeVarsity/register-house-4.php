<?php 
    include 'connect.php';
    // Amek email dari page sebelum
    $email_string=$_GET['emailpass'];
    $version=$_GET['versionpass'];
    // End line amek email dari page sebelum
    if(isset($_POST['submit'])){
      
      $extension = array('jpeg','jpg','png','gif');
      foreach ($_FILES['image']['tmp_name'] as $key => $value) {
        // Amek email dari page sebelum
        $email_string=$_GET['emailpass'];
        // End line amek email dari page sebelum
        $filename = $_FILES['image']['name'][$key] ;
        $filename_tmp = $_FILES['image']['tmp_name'][$key] ;
        $ext = pathinfo($filename,PATHINFO_EXTENSION);

        $finalimg='';
        if(in_array($ext,$extension)){
          if(!file_exists('images/'.$filename)){
            move_uploaded_file($filename_tmp, 'upload_images/'.$filename);
            $finalimg = $filename;
          }else{
            $filename = str_replace('.','-', basename($filename,$ext));
            $newfilename = $filename.time().".".$ext;
            move_uploaded_file($filename_tmp, 'upload_images/'.$filename);
            $finalimg = $filename;
          }
          // Insert to database
          $sql="insert into `pictures` (`version`,`email`,`image_name`) 
          values('$version','$email_string','$finalimg')";
          $result=mysqli_query($con, $sql);
          if($result){
            echo '<div class="alert alert-success" role="alert" style="position:fixed;
            z-index: 999; width: 100%;">
            <strong>Success!</strong> Data inserted successfully.
          </div>';
          }else{
            die(mysqli_error($con));
          }


        }else{
          // display error
        }
      }

    }
?> 

<html>
  <head>
    <title>REGISTER</title>
    <link rel="stylesheet" href="register.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="registration">
      <div class="div1">
        <div class="logo"><img src="./images/uum.png" alt="" /></div>
        <h1 class="soalan">Let's add some photos</h1>
      </div>
      <div class="div2">
        <div class="button" onclick="togglePopup()"><a href="#!">Exit</a></div>
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
        <div class="tajuk"><h1>Upload maximum 5 pictures</h1></div>
        <div class="tajuk"><h4>(up to 2GB)</h1></div>
        <div class="content4">
          <form class="content4-upload" method="post" enctype="multipart/form-data">
            <input
              type="file"
              id="file-input"
              name="image[]"
              onchange="preview()"
              multiple
            />
            <label for="file-input">
              <i class="fas fa-upload"></i> &nbsp; Choose A Photo
            </label>
            <p id="num-of-files">No Files Chosen</p>
            <button type="submit" class="confirm"  name="submit">Confirm Pictures</button>
            <div id="images"></div>
          </form>
        </div>
        <!--Script-->
        <script src="script.js"></script>
        <div class="kaki">
          <?php  echo "<a class=\"back\" href=\"register-house-3.php?emailpass=".$email_string."&versionpass=".$version."\">Back </a>"; ?>
          <?php  echo "<a class=\"next\" href=\"register-house-5.php?emailpass=".$email_string."&versionpass=".$version."\">Next </a>"; ?>
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
