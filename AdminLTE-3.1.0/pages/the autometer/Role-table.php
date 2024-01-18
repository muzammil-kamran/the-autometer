<?php
include "header.php"

?>
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
                      <th>RolesID</th>
                      <th>RolesNmae</th>
                      <th>Action</th>
            

                    </tr>
                  </thead>
                  <tbody>  

                    <tr>
                    <?php
                                require "connection.php";
                                $qry =" SELECT * FROM `roles`";
                                $result = mysqli_query($conn,$qry);
                                while($row = mysqli_fetch_assoc($result)){?>


                            <td scope="row"><?PHP echo $row['RolesID']?>  </td>
                            <td><?PHP echo $row['RolesNmae']?></td>
                            
                           
                            <td>
                                    <a href="update.php?updid=<?PHP echo $row['RolesID']?>">
                                    <button type="button" class="btn btn-success btn-fw">Update</button>
                                    </a>

                                    <a href="delete.php?dldid=<?PHP echo $row['RolesID']?>">
                                    <button type="button" class="btn btn-danger btn-fw">Delete</button>
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