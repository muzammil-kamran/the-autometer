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
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Product Image</th>
                      <th>Product Status</th>
                      <th>Action</th>
            

                    </tr>
                  </thead>
                  <tbody>  

                    <tr>
                    <?php
                                require "connection.php";
                                $qry ="SELECT products.ProductID, products.ProductName, products.ProductImage, product_status.Status
                                FROM products
                                JOIN product_status ON products.statusID = product_status.statusID";
                                $result = mysqli_query($conn,$qry);
                                while($row = mysqli_fetch_assoc($result)){?>


                            <td scope="row"><?PHP echo $row['ProductID']?>  </td>
                            <td><?PHP echo $row['ProductName']?></td>
                            <td>
                                <div class="widget-user-image" style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                                    <img src="<?php echo $row['ProductImage'] ?>" class="img-circle" alt="User Avatar" style="width: 100%; height: auto;">
                                </div>
                            </td>

                            
                            <td>
                              <?PHP echo $row['Status']?></td>
                           
                            <td>
                                    <a href="result-update.php?updid=<?PHP echo $row['ProductID']?>">
                                    <button type="button" class="btn btn-success btn-fw">Show Test</button>
                                    </a>

                                    

                            </td>
                          </tr>
                        
                      
                    </tr>
                    <?phP
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