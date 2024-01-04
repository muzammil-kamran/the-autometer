<?php
include "connection.php";
if(isset($_POST['sub'])){
$roles=$_POST['role'];

$insertqry="INSERT INTO `roles`(`RolesNmae`) VALUES ('$roles')";
$result=mysqli_query($conn,$insertqry);

echo
"<script>
alert('Roles');
</script>";
}
?>