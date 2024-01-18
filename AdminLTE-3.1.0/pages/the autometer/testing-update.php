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
              <li class="breadcrumb-item active">Testing Form</li>
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
                      <h3 class="card-title">TESTING FORM</h3>
                    </div>
                    <!-- /.card-header -->
                <!-- form start -->
                <?PHP
                        require "connection.php";
                        $memberID = $_GET['updid'];
                        $update = "SELECT * FROM `memberinfo` WHERE `memberID`= $memberID";
                        $result = mysqli_query($conn,$update);
                        while ($row= mysqli_fetch_assoc($result)){
                        
                        ?>
                <form class="form-horizontal" action="Testing-method-action.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select Department</label>


                      <select class="form-control" id="exampleInputEmail11" name="Department">
                            <option value="" disabled selected>Select Department</option> 
                            <?php
                      
                          // Database connection
                          include "connection.php";

                          // Check connection
                          if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                          }
                        
                          // Query to get options from database
                          $sql = "SELECT  `DepartmentsName` FROM `departments`";
                          $result = $conn->query($sql);
                        
                          // Generate dropdown options
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  $id = $row["id"];
                                  $optionName = $row["DepartmentsName"];
                                  echo "<option value='$id'>$optionName</option>";
                              }
                          }
                        
                          // Close connection
                          $conn->close();
                          ?>
                          </select>
                          <?php
                        }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Test Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Test Name" name="Tname">
                    </div>
                   
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button> 
                  </div>
                  <?php
                        if(isset($_POST['sub'])){
                          $name = $_POST['mname'];
                          $disg = $_POST['mdisg'];
                          $desc = $_POST['mdesc'];
                          $img = $_FILES['mimg'];
                      
                          $imagename = $img['name']; // Move this line up
                      
                          $actualpath = $img['tmp_name'];
                          $mypath = "images/" . $imagename;
                          move_uploaded_file($actualpath, $mypath);
                          
                            $updateqry = "UPDATE `memberinfo` SET `membername`='$name', `memberdig`='$disg', `memberdesc`='$desc', `memberimg`='$mypath' WHERE `memberID`= $memberID";

                            echo
                            "<script>
                            alert('Update Complete');
                            window.location.href='showmember.php';
                            </script>";

                    }
    
    
                    
                    ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->