<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 $selectQuery="SELECT S.uppid, U.firstname, U.lastname, R.rolename, P.projectname,P.status,M.permissionname, S.updated_at FROM User_Project_Permission S, User U, Project P, Permission M, Role R WHERE S.userid=U.userid AND S.projectid=P.projectid AND S.permissionid=M.permissionid AND U.roleid=R.roleid";
 $dbSelect=$db->select($selectQuery);
?>

 <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Scan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Scan</li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">User-Project Permissions Scans</h4>
                                <div id="bar-chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">User-Task Permissions Scans</h4>
                                <div id="main" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->            
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-12">

                    <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">User-Project-Permissions Scans</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>FirstName</th>                                               
                                                <th>LastName</th>
                                                <th>Role</th>
                                                <th>Project</th>
                                                <th>Permission</th>
                                                <th>Status</th>                                                
                                                <th>Time Modified</th>                                                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>FirstName</th>                                               
                                                <th>LastName</th>
                                                <th>Role</th>
                                                <th>Project</th>
                                                <th>Permission</th>
                                                <th>Status</th>                                                
                                                <th>Time Modified</th>                                      
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                      if(count($dbSelect)) {
                          foreach ($dbSelect as $row) {
                              ?>

                              <tr>
                                  <td><?php echo $row['uppid'];?></td>
                                  <td><?php echo $row['firstname'];?></td>
                                  <td><?php echo $row['lastname'];?></td>
                                  <td><?php echo $row['rolename'];?></td>
                                  <td><?php echo $row['projectname'];?></td>
                                  <td><?php echo $row['permissionname'];?></td>
                                  <?php
                                  if($row['status']=='Complete')
                                  {
                                    echo '<td><span class="label label-info">'.$row['status'].'</span> </td>';
                                  }else
                                  {
                                    echo '<td><span class="label label-warning">'.$row['status'].'</span> </td>';
                                  }
                                  ?>  
                                  <td><?php echo $row['updated_at'];?></td>
                              </tr>

                              <?php
                          }
                      }
                      else
                      {
                          echo "Oops :( No Data Found";
                      }
                      ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</div>
</div>


<?php
include "footer.php";
?>