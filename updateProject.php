<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

include "header.php";


if(isset($_POST['myprojectid']))
{
    $_SESSION['projectid']=$_POST['myprojectid'];

}
$projectid=($_SESSION['projectid']);

if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $projectname=trim($_POST['projectname']);
    $startdate=trim($_POST['startdate']);
    $enddate=trim($_POST['enddate']);
    $description=trim($_POST['description']);
    $status=trim($_POST['status']);
    $clientid=trim($_POST['clientid']);
    if (isset($_POST['projectname'])) $projectname = $_POST['projectname'];
    if (isset($_POST['startdate'])) $startdate = $_POST['startdate'];
    if (isset($_POST['enddate'])) $enddate = $_POST['enddate'];
    if (isset($_POST['description'])) $description = $_POST['description'];
    if (isset($_POST['status'])) $status = $_POST['status'];
    if (isset($_POST['clientid'])) $clientid = $_POST['clientid'];
    $error=array();
    if (empty($_POST["projectname"])) {
        $error[]='Please enter project name';
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
    if (empty($_POST["clientid"])) {
        $error[]='Please enter clientid';
    }
 }

 //update query
 $uquery="SELECT * from Project where projectid='$projectid'";
 $suquery=$db->select($uquery);

 foreach($suquery as $row)
 {
    $uprojectname=$row['projectname'];
    $ustartdate=$row['startdate'];
    $uenddate=$row['enddate'];
    $udescription=$row['description'];
    $ustatus=$row['status'];
    $uclientid=$row['clientid'];
 }

 //query for client select option
 $clientquery="SELECT * from Client WHERE clientid=$uclientid";
 $sclientquery=$db->select($clientquery);
 foreach($sclientquery as $row)
 {
    $uclientname=$row['clientname'];
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Project</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Update Project</li>
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
                                <h4 class="m-b-0 text-white">Update Project Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Update <?php echo $projectname?></h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Project Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="projectname" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $uprojectname?>" value="<?php echo $uprojectname?>"> </div>
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
                                         <h5>Choose Project Status<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="status" id="ustatus" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $ustatus?>" value="<?php echo $ustatus?>">
                                            <option value="Complete">Complete</option>
                                            <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                            </div>
                                            <div class="form-group">
                                         <h5>Choose Client<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="clientid" id="uclientid" class="form-control" required data-validation-required-message="This field is required" placeholder="<?php echo $uclientname?>" value="<?php echo $uclientname?>">
                                                <?php
                            $squery="SELECT * FROM Client";
                            $ssquery=$db->select($squery);
                            foreach($ssquery as $row)
                            {
                                echo '<option value="'.$row['clientid'].'">'.$row['clientname'].'</option>';
                            }
                            ?>
                                            </select>
                                        </div>
                                            </div>                                                                         
                                    <div class="form-group">
                                        <h5>Project Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Describe the above project" value="<?php echo $udescription?>"><?php echo $udescription?></textarea>
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
                                            $insertQuery="UPDATE `Project` SET `projectname` = '".$projectname."', `startdate` = '".$startdate."', `enddate` = '".$enddate."', `description` = '".$description."', `status` = '".$status."', `clientid` = '".$clientid."', `updated_at` = current_timestamp() WHERE `Project`.`projectid` = $projectid; ";
                                            $db->insert($insertQuery);
                                            header('Location:viewProject.php');     
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