<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $Department=$_POST['Department'];
    $TName=$_POST['Tname'];
    
   

    $insertqry= "INSERT INTO `testing`(`TestName`, `DepartmentID`) VALUES ('$TName','$Department')";
    $result=mysqli_query($conn,$insertqry);
  


echo "
<script>
alert('Successfully Added');
</script>";
}
?>