<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

include "header.php";


if(isset($_POST['myroleid']))
{
    $_SESSION['roleid']=$_POST['myroleid'];

}
$roleid=($_SESSION['roleid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $rolename=trim($_POST['rolename']);
    $description=trim($_POST['description']);
    if (isset($_POST['rolename'])) $rolename = $_POST['rolename'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    $error=array();
    if (empty($_POST["rolename"])) {
        $error[]='Please enter role name';
    }
    if (empty($_POST["description"])) {
        $error[]='Please enter description';
    }
 }

$uQuery="SELECT * from Role where roleid='$roleid'";
$suQuery=$db->select($uQuery);
foreach($suQuery as $row)
{
    $myroleid=$row['roleid'];
    $myrolename=$row['rolename'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Role</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Role</li>
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
                                <h4 class="m-b-0 text-white">Update Role Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Role Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Role Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="rolename" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $myrolename?>" value="<?php echo $myrolename?>"> </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Role Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="<?php echo $mydesc?>" required value="<?php echo $mydesc?>"><?php echo $mydesc?></textarea>
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
                                            $insertQuery="UPDATE `Role` SET `rolename` = '".$rolename."', `description` = '".$description."', `updated_at` = current_timestamp() WHERE `Role`.`roleid` = $roleid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewRole.php');     
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