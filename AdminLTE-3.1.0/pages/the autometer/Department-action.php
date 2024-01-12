<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $DName=$_POST['Dname'];
    
   

    $qry= "INSERT INTO `departments`( `DepartmentsName`) VALUES ('$DName')";
    mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}
?>