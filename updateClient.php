<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

include "header.php";


if(isset($_POST['myclientid']))
{
    $_SESSION['clientid']=$_POST['myclientid'];

}
$clientid=($_SESSION['clientid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $clientname=trim($_POST['clientname']);
    $email=trim($_POST['email']);
    $description=trim($_POST['description']);
    if (isset($_POST['clientname'])) $clientname = $_POST['clientname'];
    if (isset($_POST['email'])) $email = $_POST['email'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    $error=array();
    if (empty($_POST["clientname"])) {
        $error[]='Please enter client name';
    }
    if (empty($_POST["email"])) {
        $error[]='Please enter client email';
    }
    if (empty($_POST["description"])) {
        $error[]='Please enter description';
    }
 }

$uQuery="SELECT * from Client where clientid='$clientid'";
$suQuery=$db->select($uQuery);
foreach($suQuery as $row)
{
    $myclientid=$row['clientid'];
    $myclientname=$row['clientname'];
    $myemail=$row['email'];
    $mydesc=$row['description'];    
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Client</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Client</li>
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
                                <h4 class="m-b-0 text-white">Update Client Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Client Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Client Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="clientname" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $myclientname?>" value="<?php echo $myclientname?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Client Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $myemail?>" value="<?php echo $myemail?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Client Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="" required value=""><?php echo $mydesc?></textarea>
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
                                            $insertQuery="UPDATE `Client` SET `clientname` = '".$clientname."', `email` = '".$email."',`description` = '".$description."', `updated_at` = current_timestamp() WHERE `Client`.`clientid` = $clientid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewClient.php');     
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