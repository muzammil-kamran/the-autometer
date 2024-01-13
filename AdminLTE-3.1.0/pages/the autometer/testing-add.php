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
                      <h3 class="card-title">Product Form</h3>
                    </div>
                    <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="User-Action.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select Role For User</label>


                      <select class="form-control" id="exampleInputEmail11" name="role">
                            <option value="" disabled selected>Select a Role</option> 
                            <?php
                      
                          // Database connection
                          include "connection.php";

                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }
                        
                          // Query to get options from database
                          $sql = "SELECT `RolesID`, `RolesNmae` FROM `roles`";
                          $result = $conn->query($sql);
                        
                          // Generate dropdown options
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  $id = $row["RolesID"];
                                  $optionName = $row["RolesNmae"];
                                  echo "<option value='$id'>$optionName</option>";
                              }
                          }
                        
                          // Close connection
                          $conn->close();
                          ?>
                          </select>
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name" name="uname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Contact</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter User Contact" name="ucontact">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">User Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter User Email" name="uemail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">User Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="User Password" name="upass">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="uimg">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button> 
                  </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->