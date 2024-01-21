<?php
session_start(); // Start the session

include "connection.php";

if(isset($_POST['sub'])) {
    // Access user data from session
    $userID = $_SESSION['userID'];

    // Get data from the form
    $productID = $_POST['PTest'];
    $testID = $_POST['Typetest'];
    $remarksID = $_POST['remarksTest'];
    $detailRemarks = $_POST['detail'];

    // Insert data into the producttesting table
    $insertQuery = "INSERT INTO producttesting (ProductID, TestID, UserID, RemarksID, Remarks) 
                    VALUES ('$productID', '$testID', '$userID', '$remarksID', '$detailRemarks')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
