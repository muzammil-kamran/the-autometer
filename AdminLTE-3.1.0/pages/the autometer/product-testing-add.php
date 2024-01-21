<?php
include "header.php";
include "connection.php";

?>

  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
                      <h3 class="card-title">Product testing Form</h3>
                    </div>
                    <!-- /.card-header -->

                    <?php


                    // Include database connection code and session start if not already included
                    
                    
                    // Access user data from session
                    
                    
                    // Access user data from session
                    $userID = $_SESSION['userID'];
                    $departmentID = $_SESSION['departmentID'];
                    $roleID = $_SESSION['roleID'];

                    // Fetch tests available for the user's department
                    $testsQuery = "SELECT TestID, TestName FROM testing WHERE DepartmentID = $departmentID";
                    $testsResult = $conn->query($testsQuery);

                    // Fetch products for dropdown, excluding those with completed tests
                    $productsQuery = "SELECT p.ProductID, p.ProductName 
                                     FROM products p
                                     LEFT JOIN producttesting pt ON p.ProductID = pt.ProductID AND pt.UserID = $userID
                                     WHERE pt.ProductID IS NULL";
                    $productsResult = $conn->query($productsQuery);

                    // Fetch remarks available for the user's department
                    $remarkQuery = "SELECT RemarksID, RemarksName FROM remarks";
                    $remarkResult = $conn->query($remarkQuery);
                    ?>


                <!-- form start -->
                <form class="form-horizontal" action="Product-testing-Action.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                  <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="<?php echo $userName ?>" disabled="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;);">
                      </div>
                  <div class="form-group">
                        <label>User ID</label>
                        <input type="text" class="form-control" placeholder="<?php echo $userID ?>" disabled="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;);">
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Select Product For Test</label>
                      <select class="form-control" id="exampleInputEmail11" name="PTest">
                          <option value="" disabled selected>Select a Product</option> 
                          <?php
                          // Query to get options from the database
                            if ($roleID == 1) {
                              // If roleID is 1, show all products
                              $sql = "SELECT `ProductID`, `ProductName`, `ProductImage` FROM `products`";
                          } else {
                              // If roleID is not 1, show products for the user's department
                              $sql = "SELECT p.`ProductID`, p.`ProductName`, p.`ProductImage` 
                                      FROM `products` p
                                      INNER JOIN `productdepartments` pd ON p.`ProductID` = pd.`ProductID`
                                      WHERE pd.`DepartmentID` = $departmentID";
                          }
                        
                          $result = $conn->query($sql);

                          // Generate dropdown options
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  $productID = $row["ProductID"];
                                  $productName = $row["ProductName"];
                                  $productImage = $row["ProductImage"];
                                  echo "<option value='$productID' data-image='$productImage'>$productID - $productName</option>";
                              }
                          }
                          ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
    <label for="exampleInputEmail1">Select Type of Test</label>
    <select class="form-control" id="exampleInputEmail11" name="test">
        <option value="" disabled selected>Select a Test Type</option> 
        <?php
        // Check if the user's role is 1 (assuming roleID is stored in $roleID)
        if ($roleID == 1) {
            // If roleID is 1, show tests for all departments that are not completed
            $testsQuery = "SELECT testing.TestID, testing.TestName 
                           FROM testing
                           LEFT JOIN producttesting ON testing.TestID = producttesting.TestID
                           WHERE producttesting.TestID IS NULL";
        } else {
            // If roleID is not 1, show tests for the user's department that are not completed
            $testsQuery = "SELECT testing.TestID, testing.TestName 
                           FROM testing
                           LEFT JOIN producttesting ON testing.TestID = producttesting.TestID
                           WHERE testing.DepartmentID = $departmentID AND producttesting.TestID IS NULL";
        }
      
        // Fetch tests based on the selected query
        $testsResult = $conn->query($testsQuery);
      
        // Generate dropdown options
        if ($testsResult->num_rows > 0) {
            while ($row = $testsResult->fetch_assoc()) {
                $testid = $row["TestID"];
                $testName = $row["TestName"];
                echo "<option value='$testid'>$testName - $testid</option>";
            }
        }
        ?>
    </select>
</div>





                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Type of Test</label>
                        <select class="form-control" id="exampleInputEmail11" name="test">
                            <option value="" disabled selected>Select a Test Type</option> 
                            <?php
                            // Check if the user's role is 1 (assuming roleID is stored in $roleID)
                            if ($roleID == 1) {
                                // If roleID is 1, show tests for all departments
                                $testsQuery = "SELECT TestID, TestName FROM testing";
                            } else {
                                // If roleID is not 1, show tests for the user's department
                                $testsQuery = "SELECT TestID, TestName FROM testing WHERE DepartmentID = $departmentID";
                            }

                            // Fetch tests based on the selected query
                            $testsResult = $conn->query($testsQuery);

                            // Generate dropdown options
                            if ($testsResult->num_rows > 0) {
                                while ($row = $testsResult->fetch_assoc()) {
                                    $testid = $row["TestID"];
                                    $testName = $row["TestName"];
                                    echo "<option value='$testid'>$testName - $testid</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">TEST Remarks</label>
                      <select class="form-control" id="exampleInputEmail11" name="remarksTest">
                          <option value="" disabled selected>Enter Test Remarks</option> 
                          <?php
                          // Fetch remarks available for the user's department
                          $remarkQuery = "SELECT `RemarksID`, `RemarksName` FROM `remarks`";
                          $remarkResult = $conn->query($remarkQuery);
                          
                          // Generate dropdown options
                          if ($remarkResult->num_rows > 0) {
                              while ($row = $remarkResult->fetch_assoc()) {
                                  $remarkID = $row["RemarksID"];
                                  $remarkName = $row["RemarksName"];
                                  echo "<option value='$remarkID'>$remarkName</option>";
                              }
                          }
                          
                          // Close connection (if not using persistent connections)
                          $conn->close();
                          ?>
                      </select>
                    </div>


                    
                    <div class="form-group">
                        <label>Detail Remarks</label>
                        <textarea class="form-control" name="detail" rows="4" placeholder="Enter Detail Remarks" spellcheck="false" data-ms-editor="true"></textarea>
                      </div>
                      
                    

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button> 
                  </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->