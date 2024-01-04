<?php  
include "Connection.php";
if(isset($_POST['sub'])){
    $Role=$_POST['role'];
    $UName=$_POST['uname'];
    $UContact=$_POST['ucontact'];
    $UEmail=$_POST['uemail'];
    $UPass=$_POST['upass'];
    $img=$_FILES['uimg'];
    
    $imagename=$img['name'];
    $actualpath= $img['tmp_name'];
    $mypath="images/".$imagename;

    move_uploaded_file($actualpath,$mypath);
    $UPass=$_POST['upass'];
    $qry="INSERT INTO `user`(`UserName`, `UserContact`, `UserEmail`, `UserPassword`, `UserImage`, `RoleID`) VALUES ('$UName',' $UContact',' $UEmail','$UPass','$img','$Role')";

    mysqli_query($conn,$qry);


echo "
<script>
alert('Successfully Added');
</script>";
}
?>