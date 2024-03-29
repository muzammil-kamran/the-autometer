<?php
include "connection.php";

if (isset($_POST['sub'])) {
    $name = $_POST['PName'];
    $disc = $_POST['Pdisc'];
    $img = $_FILES['Pimg'];

    $imagename = $img['name'];
    $actualpath = $img['tmp_name'];
    $mypath = "images/" . $imagename;

    move_uploaded_file($actualpath, $mypath);

    // Default status ID (change it to your desired default status)
    $defaultStatusID = 1;

    // Check if any department is selected
    if (isset($_POST["selectedDepartments"]) && is_array($_POST["selectedDepartments"])) {
        // Insert the product into the 'products' table with the specified status ID
        $insertProductQuery = "INSERT INTO products (ProductName, ProductDiscription, ProductImage, statusID) VALUES ('$name', '$disc', '$mypath', $defaultStatusID)";
        if ($conn->query($insertProductQuery) === TRUE) {
            $productID = $conn->insert_id;

            // Associate the product with selected departments in the 'productdepartments' table
            foreach ($_POST["selectedDepartments"] as $departmentID) {
                $insertProductDepartmentQuery = "INSERT INTO productdepartments (ProductID, DepartmentID) VALUES ($productID, $departmentID)";
                $conn->query($insertProductDepartmentQuery);
            }

            echo "Product added successfully.";
        } else {
            echo "Error adding product: " . $conn->error;
        }
    } else {
        echo "Please select at least one department.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
