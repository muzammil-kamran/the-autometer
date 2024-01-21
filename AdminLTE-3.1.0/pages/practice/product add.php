<?php
include "header.php"

?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THE AUTOMETER FORM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">product Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<?php
// Assuming you have a database connection code here
include "Connection.php";

// Fetch departments from the database
$departmentsQuery = "SELECT DepartmentsID, DepartmentsName FROM departments";
$departmentsResult = $conn->query($departmentsQuery);

// Check for departments and display the form
if ($departmentsResult->num_rows > 0) {
    ?>
    <html>
    <head>
        <title>Product Addition Form</title>
    </head>
    <body>
        <h2>Add a New Product</h2>
        <form action="process_product.php" method="post">
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" required><br>

            <label for="productCode">Product Code:</label>
            <input type="text" name="productCode" required><br>

            <label for="selectedDepartments">Select Departments:</label><br>
            <?php
while ($row = $departmentsResult->fetch_assoc()) {
    $departmentID = $row['DepartmentsID'];
    $departmentName = $row['DepartmentsName'];
    echo "<div class='custom-control custom-checkbox'>";
    echo "<input class='custom-control-input' type='checkbox' id='departmentCheckbox$departmentID' name='selectedDepartments[]' value='$departmentID'>";
    echo "<label for='departmentCheckbox$departmentID' class='custom-control-label'>$departmentName</label>";
    echo "</div>";
}
?>
<br>


            <input type="submit" value="Add Product">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "No departments found in the database.";
}

// Close the database connection
$conn->close();
?>
