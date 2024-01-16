<?php  
include "Connection.php";

if(isset($_POST['sub'])){
    $Role = $_POST['role'];
    $UName = $_POST['uname'];
    $UContact = $_POST['ucontact'];
    $UEmail = $_POST['uemail'];
    $UPass = $_POST['upass'];
    $img = $_FILES['uimg'];

    
    $imagename = $img['name'];
    $actualpath = $img['tmp_name'];
    $mypath = "images/".$imagename;

    move_uploaded_file($actualpath, $mypath);
    
    // Use prepared statement to prevent SQL injection
    $qry = $conn->prepare("INSERT INTO `user` (`UserName`, `UserContact`, `UserEmail`, `UserPassword`, `UserImage`, `RoleID`) VALUES (?, ?, ?, ?, ?, ?)");
    $qry->bind_param("sssssi", $UName, $UContact, $UEmail, $UPass, $mypath, $Role);
    $qry->execute();
    $qry->close();

    echo "
    <script>
    alert('Successfully Added');
    </script>";
}

?>