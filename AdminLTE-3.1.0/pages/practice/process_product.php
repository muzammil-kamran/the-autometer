<?php
// Assuming you have a database connection code here
include "Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $productName = $_POST["productName"];
    $productCode = $_POST["productCode"];

    // Check if any department is selected
    if (isset($_POST["selectedDepartments"]) && is_array($_POST["selectedDepartments"])) {
        // Insert the product into the 'products' table
        $insertProductQuery = "INSERT INTO products (ProductName, ProductCode) VALUES ('$productName', '$productCode')";
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
