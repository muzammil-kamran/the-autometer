<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $MName=$_POST['Mname'];
    
   

    $qry= "INSERT INTO `markets`(`MarketsName` ) VALUES ('$MName')";
    
  
    mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}
?>