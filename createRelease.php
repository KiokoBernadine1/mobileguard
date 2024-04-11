<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $version=trim($_POST['version']);   
    $status=trim($_POST['status']);  
    if (isset($_POST['version'])) $version = $_POST['version'];    
    if (isset($_POST['status'])) $status = $_POST['status'];
    $error=array();
    if (empty($_POST["version"])) {
        $error[]='Please enter version';
    }
    if (empty($_POST["status"])) {
        $error[]='Please enter status';
    }
 }
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Deployment Policies</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Create Deployment Policies</li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Create Release Management Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Add Release Management Information</h3>
                                        <hr>

                                        <div class="form-group">
                                        <h5>Version<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="version" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                  
                                            <div class="form-group">
                                         <h5>Choose Deployment Status<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="status" id="ustatus" class="form-control" required data-validation-required-message="This field is required">
                                            <option value="Deployed">Deployed</option>
                                            <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                            </div>                                                                       
                                    
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                    <?php
                                    if (isset($error)) 
                                    {
                                        if (!empty($error)) 
                                        {

                                        }else
                                        {
                                            $insertQuery="INSERT INTO `Releases` (`releaseid`, `version`, `status`, `updated_at`) VALUES (NULL, '".$version."', '".$status."', current_timestamp()); ";
                                            $db->insert($insertQuery);     
                                        }
                                    }
                                     
                                     ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->

                


<?php
include "footer.php";
?>