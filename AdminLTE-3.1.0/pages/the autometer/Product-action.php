<?php
include "connection.php";

if (isset($_POST['sub'])) {
    $name = $_POST['PName'];
    $disc = $_POST['Pdisc'];
    $img = $_FILES['Pimg'];

    $imagename = $img['name'];
    $actualpath = $img['tmp_name'];
    $mypath = "images/" . $imagename;

    move_uploaded_file($actualpath, $mypath);

    // Generate unique product code
    function generateUniqueID() {
        $timestamp = time();
        $randomNumber = mt_rand(100000, 999999);
        $uniqueID = $timestamp . $randomNumber;
        $uniqueID = substr($uniqueID, 0, 12);
        return $uniqueID;
    }

    $productCode = generateUniqueID();

    // Insert data into the database
    $insertqry = "INSERT INTO `products`(`ProductCode`, `ProductName`, `ProductDiscription`, `ProductImage`) VALUES ('$productCode', '$name', '$disc', '$mypath')";
    $result = mysqli_query($conn, $insertqry);

    if ($result) {
        echo "
        <script>
        alert('Successfully Added');
        </script>";
    } else {
        echo "
        <script>
        alert('Error: " . mysqli_error($conn) . "');
        </script>";
    }
}
?>
