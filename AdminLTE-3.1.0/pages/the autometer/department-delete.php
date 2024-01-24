<?php
require "connection.php";
$user = $_GET['dldid'];
$dldquery = "DELETE FROM `departments` WHERE `DepartmentsID` = '$user'";
$result = mysqli_query($conn, $dldquery);

if ($result) {
    echo "<script>
    alert('Delete successfully');
    window.location.href='department-table.php';
    </script>";
} else {
    echo "Error deleting Record" . mysqli_error($conn);
}
?>