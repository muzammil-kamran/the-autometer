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
            <h1>Roles</h1>
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
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">ADD ROLES</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="Roles-action.php" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Roles</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter New Roles" name="role">
              </div>
            </div>
           </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info" name="sub">Submit</button>
            <button type="submit" class="btn btn-default float-right">Cancel</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->