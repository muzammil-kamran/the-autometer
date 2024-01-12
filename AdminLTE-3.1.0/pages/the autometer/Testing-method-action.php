<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $Department=$_POST['Department'];
    $TName=$_POST['Tname'];
    
   

    $qry= "INSERT INTO `testing`(`TestName`, `DepartmentID`) VALUES ('$TName','$Role')";
  
    mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}
?>