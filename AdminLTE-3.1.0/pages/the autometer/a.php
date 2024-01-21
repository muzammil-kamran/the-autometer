<?php
include "header.php";
include "Connection.php";

?>
<?php


// Include database connection code and session start if not already included


// Access user data from session
$userID = $_SESSION['userID'];
$departmentID = $_SESSION['departmentID'];

// Fetch tests available for the user's department
$testsQuery = "SELECT TestID, TestName FROM testing WHERE DepartmentID = $departmentID";
$testsResult = $conn->query($testsQuery);

// Fetch products for dropdown
$productsQuery = "SELECT ProductID, ProductName FROM products";
$productsResult = $conn->query($productsQuery);
?>



    
</body>
</html>


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
              <li class="breadcrumb-item active">Department Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

                     <!-- Main content -->
                     <section class="content">
                  
                      <!-- Default box -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Department Form</h3>
                    </div>
                    <!-- /.card-header -->

    <h2>Add Product Testing</h2>
    <<form action="process-product-testing.php" method="post">
        <label for="test">Select Test:</label>
        <select name="test" required>
            <?php
            while ($row = $testsResult->fetch_assoc()) {
                echo "<option value='{$row['TestID']}'>{$row['TestName']}</option>";
            }
            ?>
        </select>

        <br>

        <label for="product">Select Product:</label>
        <select name="product" required>
            <?php
            while ($row = $productsResult->fetch_assoc()) {
                echo "<option value='{$row['ProductID']}'>{$row['ProductName']}</option>";
            }
            ?>
        </select>

        <br>

        <label for="remarks">Remarks:</label>
        <textarea name="remarks" rows="4" cols="50" required></textarea>

        <br>

        <input type="submit" value="Submit">
    </form>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
