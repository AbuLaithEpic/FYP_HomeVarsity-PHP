<?php 
    include 'connect.php';
    $getemail=$_GET['updateemail'];
    $id=$_GET['updateid'];
    $sql2 = "SELECT act.email, pic.image_name, addr.line1, addr.line2, ty.type, ava.bilangan, di.jarak, pr.harga, cont.phone, cont.link, ty.version
    FROM account act, pictures pic, address addr, type_house ty, quantity ava, distance di, price pr, contact cont
    WHERE $id=ty.version AND ty.version = pic.version AND pic.version = addr.version AND addr.version = ava.version AND ava.version = di.version AND di.version = pr.version AND pr.version = cont.version";
    $result2 = mysqli_query($con, $sql2);
    $row=mysqli_fetch_assoc($result2);
        $type=$row['type'];
        $quantity=$row['bilangan'];
        $distance=$row['jarak'];
        $price=$row['harga'];
        $number=$row['phone'];
        $link=$row['link'];


    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $distance= $_POST['distance'];
        $price = $_POST['price'];
        $number = $_POST['number'];
        $link = $_POST['link'];
    

        $sql = "BEGIN;
        UPDATE type_house SET type = '$type' WHERE version=$id;
        UPDATE quantity SET bilangan = '$quantity' WHERE version=$id;
        UPDATE distance SET jarak = '$distance' WHERE version=$id;
        UPDATE price SET harga = '$price' WHERE version=$id;
        UPDATE contact SET phone = '$number', link = '$link' WHERE version=$id;
        COMMIT;";
        $result = mysqli_multi_query($con, $sql);
        if ($result) {
            header('location:hostingpage.php?emailpass='.$getemail.'');
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
        <div class="update">
            <form method="post">
                <label for="">Type of House</label>
                <input type="text" name="type" value=<?php echo $type;?>>
                <label for="">Quantity</label>
                <input type="text" name="quantity" value=<?php echo $quantity;?>>
                <label for="">Distance (Km)</label>
                <input type="text" name="distance" value=<?php echo $distance;?>>
                <label for="">Price (RM)</label>
                <input type="text" name="price" value=<?php echo $price;?>>
                <label for="">Contact Number</label>
                <input type="text" name="number" value=<?php echo $number;?>>
                <label for="">Contact Link</label>
                <input type="text" name="link" value=<?php echo $link;?>>

                <button type="submit" name="submit">Submit</button>

            </form>
        </div>
    </body>
</html>

<style>
    form{
        margin: 50px 300px;
    }
    label{
        display:block;
        margin-top: 30px;
        font-weight: bolder;
        color: #1B2C57;
    }
    input{
        width: 100%;
        font-size: 25px;
        font-weight: lighter;
        border-radius: 4px;
        border: darkslategray 1px solid;
        
    }
    button{
        margin-top: 30px;
        background-color: #025bee;
        color: white;
        border: none;
        padding: 10px 20px;
        color: white;
        border-radius: 15px;
    }
</style>