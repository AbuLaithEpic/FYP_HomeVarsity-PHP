<?php
include 'connect.php';

$sql = "SELECT pic.image_name, addr.line1, addr.line2, ty.type, dis.jarak, qua.bilangan, pr.harga, cont.phone, cont.link, app.approve
    FROM pictures pic, address addr, type_house ty, distance dis, quantity qua, price pr, contact cont, approval app
    WHERE pic.version=addr.version AND addr.version=ty.version AND ty.version=dis.version AND dis.version=qua.version AND qua.version=pr.version AND pr.version=cont.version AND cont.version = app.version
    AND app.approve='approved'
    ORDER BY dis.jarak ASC";
$result = mysqli_query($con, $sql);
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="listing.css">
    <link rel="stylesheet" href="mainpage.css">
    <title>HomeVarsity - Listing</title>
</head>

<body>
    <!-- Navigation Bar -->
    <header>
        <div class="nav-wrapper">
            <div class="logo">
                <a href="mainpage.html">
                    <img src="./images/logo.png" />
                </a>
            </div>
            <nav>
            <a href="./mainpage.html#home">Home</a>
                <a href="./mainpage.html#rent">Rent House</a>
                <a href="./mainpage.html#find">Find House</a>
                <a href="./mainpage.html#about">About Us</a>
                <a href="./mainpage.html#hotlink">Hotlink</a>
                <a id="switch" href="./signinpage.php">Switch to hosting</a>
            </nav>
        </div>
    </header>
    <div class="dummy" style="height: 100px;"></div>

    <div class="filter">
        <div class="custom-select" style="width:300px; margin-top:100px;">
            <select class="select-item" id="item-select"  onchange="document.location = this.value">
                <option value="/homevarsity/listing-price-low-high.php">Price : Low to High</option>
                <option value="/homevarsity/listing-price-high-low.php">Price : High to Low</option>
                <option value="/homevarsity/listing-distance-high-low.php">Distance : High to Low</option>
                <option value="/homevarsity/listing-distance-low-high.php" selected>Distance: Low to High</option>
            </select>
        </div>
    </div>
    <div class="list-item">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo "upload_images/" . $row['image_name'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-alamat"><?php echo $row['line1'] ?> <?php echo $row['line2'] ?></h5>
                            <h6 class="card-jenis"><?php echo $row['type'] ?></h6>
                            <h6 class="card-jarak"><span style="color:black"><?php echo $row['jarak'] ?> Km</span> from UUM</h6>
                            <h6 class="card-bilangan"><span style="color:black"> <?php echo $row['bilangan'] ?></span> available</h6>
                            <h6 class="card-harga"><span style="color:black"><?php echo "RM " ?><?php echo $row['harga'] ?></span><?php echo " per month" ?></h6>
                            <h6 class="card-contact">Phone Number : <?php echo $row['phone'] ?></h6>
                            <h6 class="card-contact">WhatsApp Link : <a href="https://api.whatsapp.com/send?phone=60123456789" target="_blank"><?php echo $row['link'] ?></a></h6>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Footer Section -->
    <div id="footer">
        <div class="content">
            Copy Rights &copy; 2022 | UUM HomeVarsity Website
        </div>
    </div>
</body>

</html>