<?php 
  
    // $id=1; ni id patutnya email pastu letak dalam where $id=pic.email --> untuk login(siapa punya email + database based on email group by?)
    include 'connect.php';


    $sql = "SELECT act.email, pic.image_name, addr.line1, addr.line2, app.approve, ty.type, ava.bilangan, di.jarak, pr.harga, cont.phone, cont.link, ty.version
    FROM account act, pictures pic, address addr, approval app, type_house ty, quantity ava, distance di, price pr, contact cont
    WHERE ty.version = pic.version AND pic.version = addr.version AND addr.version = ava.version AND ava.version = di.version AND di.version = pr.version AND pr.version = cont.version AND cont.version = app.version
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
          <a href="#listing">Listing</a>
          <a href="#guidebooks">Guidebooks</a>
          <a href="#hotline">Hotline</a>
          <a id="switch" href="./mainpage.html">Logout</a>
        </nav>
      </div>
    </header>
    <div id="dummy-div">dummy div height=100px</div>

    <!-- Hero Section -->
    <h1>ADMIN PAGE</h1>
      
    <div class="listing-section">
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
                    <?php  echo "<a class=\"btn btn-primary\" style=\"background-color: #198754; border:none\" href=\"adminpage-update.php?updateid=".$idpass."&approval=approved\">Approve </a>"; ?>
                    <?php  echo "<a class=\"btn btn-primary\" style=\"background-color: #DC3545; border:none; width:85px;\" href=\"adminpage-update.php?updateid=".$idpass."&approval=rejected\">Reject </a>"; ?>
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
  </body>
</html>
