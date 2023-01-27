<?php 
  
    // $id=1; ni id patutnya email pastu letak dalam where $id=pic.email --> untuk login(siapa punya email + database based on email group by?)
    include 'connect.php';
    $email_string=$_GET['emailpass'];

    $sql = "SELECT act.email, pic.image_name, addr.line1, addr.line2, app.approve, ty.type, ava.bilangan, di.jarak, pr.harga, cont.phone, cont.link, ty.version
    FROM account act, pictures pic, address addr, approval app, type_house ty, quantity ava, distance di, price pr, contact cont
    WHERE '$email_string' = act.email AND act.email = pic.email AND pic.email = addr.email AND addr.email = app.email AND app.email = ty.email AND ty.email = ava.email AND ava.email = di.email AND di.email = pr.email AND pr.email = cont.email
    AND ty.version = pic.version AND pic.version = addr.version AND addr.version = ava.version AND ava.version = di.version AND di.version = pr.version AND pr.version = cont.version AND cont.version = app.version
    GROUP BY addr.line1
    ORDER BY ty.version";
    $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="hostingpage.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>HomeVarsity - Hosting</title>
  </head>

  <body>
    <!-- Navigation Bar -->
    <header>
      <div class="nav-wrapper">
        <div class="logo">
          <a href="#!">
            <img src="./images/logo.png" />
          </a>
        </div>
        <nav>
          <a href="#listing-section">Listing</a>
          <a href="#inbox">Inbox</a>
          <a href="GUIDEBOOK.pdf" target="_blank">Guidebooks</a>
          <a href="#hotlink">Hotlink</a>
          <a id="switch" href="./mainpage.html">Logout</a>
        </nav>
      </div>
    </header>
    <div id="dummy-div">dummy div height=100px</div>

    <!-- Hero Section -->
    <div class="add-new">
      <?php  if(mysqli_num_rows($result) >0)//resord is there or not
            { 
                foreach($result as $row)
                {$emailpass = $row['email'];}
            }else{
              echo "No Data Available";
            }
      ?>
      <?php  echo "<a class=\"btn btn-primary\" style=\"background-color: white; border:solid 1px black; color:black; display: inline-block; margin-left:1300px;\" href=\"hostingpage-create.php?emailpass=".$emailpass."\"> <strong>+</strong> Add new home </a>"; ?>
    </div>
    <div class="listing-section" id="listing-section">
      <table>
        <tr>
          <th>Pictures</th>
          <th>Address</th>
          <th>Approval</th>
          <th>Type of House</th>
          <th>Quantity</th>
          <th>Distance</th>
          <th>Price</th>
          <th>Contact No.</th>
          <th>Contact Link</th>
          <th style="width: 15%">Operation</th>
        </tr>
        <?php 
            if(mysqli_num_rows($result) > 0)//resord is there or not
            { 
                foreach($result as $row)
                {
                    ?>
                    <tr>
                    <td>
                        <img src="<?php echo "upload_images/".$row['image_name']?>" width="100px">
                    </td>
                    <td><?php echo $row['line1']?> <?php echo $row['line2']?></td>
                    <td><?php 
                      if($row['approve']=="approved"){
                        echo '<span class="badge rounded-pill text-bg-success">APPROVED</span>';
                      }else if($row['approve']=="rejected"){
                        echo '<span class="badge rounded-pill text-bg-danger">REJECTED</span>';
                      }else if($row['approve']=="pending"){
                        echo '<span class="badge rounded-pill text-bg-secondary">PENDING</span>';
                      }
                      
                      ?>
                      </td>
                    <td><?php echo $row['type']?></td>
                    <td><?php echo $row['bilangan']?></td>  
                    <td><?php echo $row['jarak']?><?php echo " Km" ?></td>
                    <td><?php echo "RM " ?><?php echo $row['harga']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['link']?></td> 
                    <td>
                    <?php $idpass = $row['version']?> <!-- Nak pass version, bukan email -->
                    <?php  echo "<a class=\"btn btn-primary\" style=\"background-color: #198754; border:none\" href=\"hostingpage-update.php?updateid=".$idpass."&updateemail=".$email_string."\">Update </a>"; ?>
                    <?php  echo "<a class=\"btn btn-primary\" style=\"background-color: #DC3545; border:none\" href=\"hostingpage-delete.php?deleteid=".$idpass."&deleteeemail=".$email_string."\">Delete </a>"; ?>
                    </td> 
                    </tr>
                    <?php
                }

            }else
            {

            }
        
        ?>
      </table>
    </div>

    <div id="hotlink">
      <div class="content"><h1>Hotlink</h1></div>
      <div class="container-hotlink">
        <div id="div1">
          <p id="uum">
            STUDENT ACCOMMODATION CENTRE <br />
            Student Affairs Department <br />
            Universiti Utara Malaysia
          </p>
          <p id="alamat">
            06010 Sintok <br />
            Kedah Darul Aman, Malaysia
          </p>
          <ul>
            <li>+604-928 4150</li>
            <li>+604-928 4175</li>
            <li>sac@uum.edu.my</li>
          </ul>
        </div>
        <div id="div2">
          <div class="social-img">
            <a
              id="facebook"
              href="https://www.facebook.com/universitiutaramalaysia/"
              target="_blank"
            >
              <div class="image-section facebook"></div>
              <div class="text-section"><h2>Facebook</h2></div>
            </a>
            <a
              id="instagram"
              href="https://www.instagram.com/uumofficial/"
              target="_blank"
            >
              <div class="image-section instagram"></div>
              <div class="text-section"><h2>Instagram</h2></div>
            </a>
            <a id="twitter" href="https://twitter.com/uumnews" target="_blank">
              <div class="image-section twitter"></div>
              <div class="text-section"><h2>Twitter</h2></div>
            </a>
          </div>
        </div>
        <div id="div3">
          <div class="social-img">
            <a
              id="youtube"
              href="https://www.youtube.com/user/uumtube"
              target="_blank"
            >
              <div class="image-section youtube"></div>
              <div class="text-section"><h2>Youtube</h2></div>
            </a>
            <a id="telegram" href="https://t.me/uuminfo" target="_blank">
              <div class="image-section telegram"></div>
              <div class="text-section"><h2>Telegram</h2></div>
            </a>
            <a
              id="linkedin"
              href="https://www.linkedin.com/school/universiti-utara-malaysia/"
              target="_blank"
            >
              <div class="image-section linkedin"></div>
              <div class="text-section"><h2>Linkedin</h2></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
