<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

if(isset($_POST['mypermissionid']))
{
    $_SESSION['permissionid']=$_POST['mypermissionid'];

}
$permissionid=($_SESSION['permissionid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $permissionname=trim($_POST['permissionname']);
    $description=trim($_POST['description']);
    if (isset($_POST['permissionname'])) $permissionname = $_POST['permissionname'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    $error=array();
    if (empty($_POST["permissionname"])) {
        $error[]='Please enter permission name';
    }
    if (empty($_POST["description"])) {
        $error[]='Please enter description';
    }
 }

 //update query
 $uquery="SELECT * from Permission WHERE permissionid=$permissionid";
 $suquery=$db->select($uquery);
 
 foreach($suquery as $row)
 {
    $upermissionname=$row['permissionname'];
    $udescription=$row['description'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Permission</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Permission</li>
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
                                <h4 class="m-b-0 text-white">Update Permission Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Permission Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Permission Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="permissionname" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $upermissionname?>" value="<?php echo $upermissionname?>"> </div>
                                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Permission Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Describe the above permission"><?php echo $udescription?></textarea>
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
                                            $insertQuery="UPDATE `Permission` SET `permissionname` = '".$permissionname."', `description` = '".$description."', `updated_at` = current_timestamp() WHERE `Permission`.`permissionid` = $permissionid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewPermission.php');     
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