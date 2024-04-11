<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if(isset($_POST['myuppid']))
{
    $_SESSION['uppid']=$_POST['myuppid'];

}
$uppid=($_SESSION['uppid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $projectid=trim($_POST['projectid']);
    $permissionid=trim($_POST['permissionid']);  
    if (isset($_POST['projectid'])) $projectid = $_POST['projectid'];
    if (isset($_POST['permissionid'])) $permissionid = $_POST['permissionid'];
    $error=array();
    if (empty($_POST["permissionid"])) {
        $error[]='Please enter permissionid';
    }
 }

 //update query
 $uquery="SELECT * from User_Project_Permission WHERE uppid=$uppid";
 $suquery=$db->select($uquery);

 foreach($suquery as $row)
 {
    $uprojectid=$row['projectid'];
    $upermissionid=$row['permissionid'];
 }

 //query for project select option
 $clientquery="SELECT * from Project WHERE projectid=$uprojectid";
 $sclientquery=$db->select($clientquery);
 foreach($sclientquery as $row)
 {
    $uprojectname=$row['projectname'];
 }

 //query for permission select option
 $clientquery="SELECT * from Permission WHERE permissionid=$upermissionid";
 $sclientquery=$db->select($clientquery);
 foreach($sclientquery as $row)
 {
    $upermissionname=$row['permissionname'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update User-Project-Permissions</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update User-Project-Permissions</li>
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
                                <h4 class="m-b-0 text-white">Update User-Project-Permissions Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update User-Project-Permissions Information</h3>
                                        <hr>
                                            <div class="form-group">
                                         <h5>Choose Project<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="projectid" id="uprojectid" class="form-control" required data-validation-required-message="This field is required" value="<?php echo $uprojectname?>">
                                                <?php
                            $squery="SELECT * FROM Project";
                            $ssquery=$db->select($squery);
                            foreach($ssquery as $row)
                            {
                                echo '<option value="'.$row['projectid'].'">'.$row['projectname'].'</option>';
                            }
                            ?>
                                            </select>
                                        </div>
                                            </div>
                                            <div class="form-group">
                                         <h5>Choose Permission<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="permissionid" id="upermissionid" class="form-control" required data-validation-required-message="This field is required" value="<?php echo $upermissionname?>">
                                                <?php
                            $squery="SELECT * FROM Permission";
                            $ssquery=$db->select($squery);
                            foreach($ssquery as $row)
                            {
                                echo '<option value="'.$row['permissionid'].'">'.$row['permissionname'].'</option>';
                            }
                            ?>
                                            </select>
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
                                            $insertQuery="UPDATE `User_Project_Permission` SET `projectid` = '".$projectid."', `permissionid` = '".$permissionid."', `updated_at` = current_timestamp() WHERE `User_Project_Permission`.`uppid` = $uppid; ";
                                            $db->insert($insertQuery); 
                                            header('Location:viewUPP.php');     
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