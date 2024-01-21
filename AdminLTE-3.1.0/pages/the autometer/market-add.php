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
              <li class="breadcrumb-item active">Market Form</li>
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
                      <h3 class="card-title">Market Form</h3>
                    </div>
                    <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="market-action.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      


                      <div class="form-group">
                      <label for="exampleInputEmail1">Market Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Market Name" name="Mname">
                    </div>
                    
                    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="sub">Submit</button> 
                    <button type="view" class="btn btn-primary" name="view">View</button> 
                  </div>

                
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->