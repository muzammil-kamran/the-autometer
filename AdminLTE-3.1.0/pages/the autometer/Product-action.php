<?php
include "connection.php";

if(isset($_POST['sub'])){
$name=$_POST['PName'];
$disc=$_POST['Pdisc'];
$img=$_FILES['Pimg'];

$imagename=$img['name'];
$actualpath= $img['tmp_name'];
$mypath="images/".$imagename;

move_uploaded_file($actualpath,$mypath);
$insertqry="INSERT INTO `products`( `ProductName`, `ProductDiscription`,`ProductImage`) VALUES ('$name','$disc','$mypath')";
$result=mysqli_query($conn,$insertqry);

echo "
<script>
alert('Successfully Added');
</script>";
}


?>