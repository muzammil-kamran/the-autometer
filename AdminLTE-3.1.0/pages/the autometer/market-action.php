<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $Role=$_POST['Department'];
    $UName=$_POST['Tname'];
    
   

    $qry= "INSERT INTO `markets`(`MarketsName` ) VALUES ('$UName','$Role')";
    
  
    mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}
?>