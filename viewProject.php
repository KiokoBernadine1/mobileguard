<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 $selectQuery="SELECT P.projectid, P.projectname, P.startdate, P.enddate, P.description, P.status, P.updated_at, U.firstname,C.clientname FROM Project P, User U, Client C WHERE P.userid=U.userid AND P.clientid=C.clientid AND P.userid=$userid";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">View Project</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">View Project</li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-12">

                    <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>StartDate</th>
                                                <th>EndDate</th>
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Client</th>
                                                <th>Description</th>
                                                <th>Time Modified</th>
                                                <th>Action</th>                                                                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>StartDate</th>
                                                <th>EndDate</th>
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Client</th>
                                                <th>Description</th>
                                                <th>Time Modified</th>
                                                <th>Action</th>                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                      if(count($dbSelect)) {
                          foreach ($dbSelect as $row) {
                              ?>

                              <tr>
                                  <td><?php echo $row['projectid'];?></td>
                                  <td><?php echo $row['projectname'];?></td>
                                  <td><?php echo $row['startdate'];?></td>
                                  <td><?php echo $row['enddate'];?></td>
                                  <?php
                                  if($row['status']=='Complete')
                                  {
                                    echo '<td><span class="label label-info">'.$row['status'].'</span> </td>';
                                  }else
                                  {
                                    echo '<td><span class="label label-warning">'.$row['status'].'</span> </td>';
                                  }
                                  ?>                                  
                                  <td><?php echo $row['firstname'];?></td>
                                  <td><?php echo $row['clientname'];?></td>
                                  <td><?php echo $row['description'];?></td>
                                  <td><?php echo $row['updated_at'];?></td>
                                  <td> <form method="post" action="updateProject.php"> <input type="hidden" name="myprojectid"  value="<?php echo $row['projectid'];?>"> <button id="btn" type="submit" name="btnView" class="btn btn-success">Update</button> </form> </td>
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