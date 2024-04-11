<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $result=trim($_POST['result']);
    $date=trim($_POST['date']);     
    if (isset($_POST['result'])) $result = $_POST['result'];
    if (isset($_POST['date'])) $date = $_POST['date'];
    $error=array();   
    if (empty($_POST["result"])) {
        $error[]='Please enter result';
    }
    if (empty($_POST["date"])) {
        $error[]='Please enter date';
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Compliance Policies</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Create Compliance Policies</li>
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
                                <h4 class="m-b-0 text-white">Create Compliance Records Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Add Compliance Records Information</h3>
                                        <hr>                                  
                                  
                                    <div class="form-group">
                                        <h5>Compliance Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="result" id="textarea" class="form-control" required placeholder="Describe the compliance record"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <h5>Completion Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="date" class="form-control" required data-validation-required-message="This field is required" placeholder="dd/mm/yyyy">
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
                                            $insertQuery="INSERT INTO `ComplianceRecords` (`recordid`, `description`, `completiondate`, `updated_at`) VALUES (NULL, '".$result."', '".$date."', current_timestamp()); ";
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