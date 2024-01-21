<?php
include "header.php";
include "Connection.php";
?>
<?php
// Assuming you have a database connection code here
include "Connection.php";

// Fetch departments from the database
$departmentsQuery = "SELECT DepartmentsID, DepartmentsName FROM departments";
$departmentsResult = $conn->query($departmentsQuery);

// Check for departments and display the form
if ($departmentsResult->num_rows > 0) {
    ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
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
          <h3 class="card-title">Product Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="Product-action.php" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Product Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="PName">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Discription</label>
              <textarea class="form-control" name="Pdisc" rows="4" placeholder="Enter Product Discription" spellcheck="false" data-ms-editor="true"></textarea>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Department For Test</label>
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
           
            </div>
            <label for="exampleInputFile">product image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="Pimg">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
            <label for="exampleInputFile"></label>

           <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-info" name="sub">Submit</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
              </div>
            </div>
            
            </div>  
                </form>
            </div>
            <?php
              }
            ?>

               </section>

              <!-- /.content -->
        </div>
                <!-- /.content-wrapper -->