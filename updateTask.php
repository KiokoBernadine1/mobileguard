<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

if(isset($_POST['mytaskid']))
{
    $_SESSION['taskid']=$_POST['mytaskid'];

}
$taskid=($_SESSION['taskid']);

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $taskname=trim($_POST['taskname']);
    $startdate=trim($_POST['startdate']);
    $enddate=trim($_POST['enddate']);
    $description=trim($_POST['description']);
    $status=trim($_POST['status']);
    $projectid=trim($_POST['projectid']);
    if (isset($_POST['taskname'])) $taskname = $_POST['taskname'];
    if (isset($_POST['startdate'])) $startdate = $_POST['startdate'];
    if (isset($_POST['enddate'])) $enddate = $_POST['enddate'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['status'])) $status = $_POST['status'];
    if (isset($_POST['projectid'])) $projectid = $_POST['projectid'];
    $error=array();
    if (empty($_POST["taskname"])) {
        $error[]='Please enter task name';
    }
    if (empty($_POST["startdate"])) {
        $error[]='Please enter start date';
    }
    if (empty($_POST["enddate"])) {
        $error[]='Please enter end date';
    }
    if (empty($_POST["description"])) {
        $error[]='Please enter description';
    }
    if (empty($_POST["status"])) {
        $error[]='Please enter status';
    }
    if (empty($_POST["projectid"])) {
        $error[]='Please enter projectid';
    }
 }

 //update query
 $uquery="SELECT * from Task WHERE taskid=$taskid";
 $suquery=$db->select($uquery);

 foreach($suquery as $row)
 {
    $utaskname=$row['taskname'];
    $ustartdate=$row['startdate'];
    $uenddate=$row['enddate'];
    $udescription=$row['description'];
    $ustatus=$row['status'];
    $uprojectid=$row['projectid'];
 }

 //query for project select option
 $clientquery="SELECT * from Project WHERE projectid=$uprojectid";
 $sclientquery=$db->select($clientquery);
 foreach($sclientquery as $row)
 {
    $uprojectname=$row['projectname'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Task</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Task</li>
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
                                <h4 class="m-b-0 text-white">Update Task Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update Task Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Task Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="taskname" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $utaskname?>" value="<?php echo $utaskname?>"> </div>
                                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                    </div>
                                    <div class="form-group">
                                    <h5>Start Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="startdate" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $ustartdate?>" value="<?php echo $ustartdate?>">
                                        </div>
                                         </div>
                                         <div class="form-group">
                                    <h5>End Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="enddate" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $uenddate?>" value="<?php echo $uenddate?>">
                                        </div>
                                         </div>
                                         <div class="form-group">
                                         <h5>Choose Task Status<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="status" id="ustatus" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $ustatus?>" value="<?php echo $ustatus?>">
                                            <option value="Complete">Complete</option>
                                            <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                            </div>
                                            <div class="form-group">
                                         <h5>Choose Project<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="projectid" id="uprojectid" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $uprojectname?>" value="<?php echo $uprojectname?>">
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
                                        <h5>Task Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Describe the above task"><?php echo $udescription?></textarea>
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
                                            $insertQuery="UPDATE `Task` SET `taskname` = '".$taskname."', `startdate` = '".$startdate."', `enddate` = '".$enddate."', `status` = '".$status."', `description` = '".$description."', `projectid` = '".$projectid."', `updated_at` = current_timestamp() WHERE `Task`.`taskid` = $taskid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewTask.php');      
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