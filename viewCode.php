<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 $selectQuery="SELECT * FROM CodeAnalysis";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">View Code Quality Policies</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">View Code Analysis Results</li>
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
                                                <th>Result</th>                                                
                                                <th>Time Modified</th>
                                                <th>Action</th>                                                                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Result</th>                                                
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
                                  <td><?php echo $row['analysisid'];?></td>
                                  <td><?php echo $row['result'];?></td>                                  
                                  <td><?php echo $row['updated_at'];?></td>
                                  <td> <form method="post" action="updateCode.php"> <input type="hidden" name="myanalysisid"  value="<?php echo $row['analysisid'];?>"> <button id="btn" type="submit" name="btnView" class="btn btn-success">Update</button> </form> </td>
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