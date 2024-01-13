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
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>name</th>
                      <th>contact</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>userimage</th>
                      <th>RoleID</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>  

                    <tr>
                    <?php
                                require "connection.php";
                                $qry =" SELECT * FROM `user`";
                                $result = mysqli_query($conn,$qry);
                                while($row = mysqli_fetch_assoc($result)){?>


                            <td scope="row"><?PHP echo $row['UserID']?>  </td>
                            <td><?PHP echo $row['UserName']?></td>
                            <td><?PHP echo $row['UserContact']?></td>
                            <td><?PHP echo $row['UserEmail']?></td>
                            <td><?PHP echo $row['UserPassword']?></td>
                            <td><?PHP echo $row['UserImage']?></td>
                            <td><?PHP echo $row['RoleID']?></td>
                            <td>
                                <a href="update.php?updid=<?php echo $row['UserID']?>">
                                <button type="button" class="tn btn-block btn-success btn-sm">Update</button>
                                </a>
                                                            
                                <a href="delete.php?dldid=<?php echo $row['UserID']?>">
                                <button type="button" class="btn btn-block btn-danger btn-sm">Delet</button>
                    
                                </a>
                            </td>
                          
                          
                      
                    </tr>
                    <?php
                                }
                                
                                ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->