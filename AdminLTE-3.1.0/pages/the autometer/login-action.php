<?php
require "connection.php";
session_start();

$UEmail = $_POST['uemail'];
$UPassword = $_POST['upass'];

$qry = "SELECT * FROM `user` WHERE UserName = '$UEmail' AND UserPassword ='$UPassword'";
$res = mysqli_query($conn, $qry);

if ($userData = mysqli_fetch_assoc($res)) {
    // Store relevant user data in the session
    $_SESSION['userID'] = $userData['UserID'];
    $_SESSION['userName'] = $userData['UserName'];
    $_SESSION['userImage'] = $userData['UserImage'];
    $_SESSION['roleID'] = $userData['RoleID'];
    $_SESSION['departmentID'] = $userData['DepartmentID'];

    // Redirect to the dashboard
    header("Location: dashboard.php");
    exit();
} else {
    echo "<script>
            alert('Login Failed')
            window.location.href='login.php'
          </script>";
}
?>
