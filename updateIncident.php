<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if(isset($_POST['myplanid']))
 {
     $_SESSION['planid']=$_POST['myplanid'];
 
 }
 $planid=($_SESSION['planid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $result=trim($_POST['result']);    
    if (isset($_POST['result'])) $result = $_POST['result'];
    $error=array();   
    if (empty($_POST["result"])) {
        $error[]='Please enter result';
    }
 }

 //update query
 $uquery="SELECT * from IncidentResponsePlan WHERE planid=$planid";
 $suquery=$db->select($uquery);

 foreach($suquery as $row)
 {
    $uresult=$row['description'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Incident Response Policies</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Incident Response Policies</li>
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
                                <h4 class="m-b-0 text-white">Update Incident response plan Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Incident Response Plan Information</h3>
                                        <hr>                                  
                                  
                                    <div class="form-group">
                                        <h5>Response Plan Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="result" id="textarea" class="form-control" required placeholder="Describe the incident response plan"><?php echo $uresult?></textarea>
                                        </div>
                                    </div>  
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                    <?php
                                    if (isset($error)) 
                                    {
                                        if (!empty($error)) 
                                        {

                                        }else
                                        {
                                            $insertQuery="UPDATE `IncidentResponsePlan` SET `description` = '".$result."', `updated_at` = current_timestamp() WHERE `IncidentResponsePlan`.`planid` = $planid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewIncident.php');      
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