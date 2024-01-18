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
                <!-- form start -->
                <?PHP
                        require "connection.php";
                        $memberID = $_GET['updid'];
                        $update = "SELECT * FROM `departments` WHERE `DepartmentsID`= $DepartmentsID";
                        $result = mysqli_query($conn,$update);
                        while ($row= mysqli_fetch_assoc($result)){
                        
                        ?>
                <form class="form-horizontal" action="Department-action.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      


                      <div class="form-group">
                      <label for="exampleInputEmail1">Department Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Name" name="uname">
                    </div>
                    
                    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button> 
                  </div>
                  <?php
                        }
                      ?>
                  <?php
                        if(isset($_POST['sub'])){
                          $name = $_POST['uname'];
                     
                       
                
                          
                            $updateqry = "UPDATE `departments` SET `DepartmentsName`='$name";

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