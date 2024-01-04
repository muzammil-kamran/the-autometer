<?php
$conn=mysqli_connect('localhost',"root","","furniture");

if(isset($_POST['sub'])){
$name=$_POST['mname'];
$disg=$_POST['mdisg'];
$desc=$_POST['mdesc'];
$img=$_FILES['mimg'];

$imagename=$img['name'];
$actualpath= $img['tmp_name'];
$mypath="images/".$imagename;

move_uploaded_file($actualpath,$mypath);
$qry="INSERT INTO `memberinfo`(`membername`, `memberdig`, `memberdesc`, `memberimg`) VALUES ('$name','$disg','$desc','$mypath')";

mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}


?>