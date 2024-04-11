<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if(isset($_POST['myutpid']))
{
    $_SESSION['utpid']=$_POST['myutpid'];

}
$utpid=($_SESSION['utpid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $taskid=trim($_POST['taskid']);
    $permissionid=trim($_POST['permissionid']);  
    if (isset($_POST['taskid'])) $taskid = $_POST['taskid'];
    if (isset($_POST['permissionid'])) $permissionid = $_POST['permissionid'];
    $error=array();
    if (empty($_POST["permissionid"])) {
        $error[]='Please enter permissionid';
    }
 }

 //update query
 $uquery="SELECT * from User_Task_Permission WHERE utpid=$utpid";
 $suquery=$db->select($uquery);

 foreach($suquery as $row)
 {
    $utaskid=$row['taskid'];
    $upermissionid=$row['permissionid'];
 }

 //query for task select option
 $clientquery="SELECT * from Task WHERE taskid=$utaskid";
 $sclientquery=$db->select($clientquery);
 foreach($sclientquery as $row)
 {
    $utaskname=$row['taskname'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update User-Task-Permissions</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update User-Task-Permissions</li>
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
                                <h4 class="m-b-0 text-white">Update User-Task-Permissions Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update User-Task-Permissions Information</h3>
                                        <hr>
                                            <div class="form-group">
                                         <h5>Choose Task<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="taskid" id="utaskid" class="form-control" required data-validation-required-message="This field is required" value="<?php echo $utaskname?>">
                                                <?php
                            $squery="SELECT * FROM Task";
                            $ssquery=$db->select($squery);
                            foreach($ssquery as $row)
                            {
                                echo '<option value="'.$row['taskid'].'">'.$row['taskname'].'</option>';
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
                                            $insertQuery="UPDATE `User_Task_Permission` SET `taskid` = '".$taskid."', `permissionid` = '".$permissionid."', `updated_at` = current_timestamp() WHERE `User_Task_Permission`.`utpid` = $utpid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewUTP.php');      
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