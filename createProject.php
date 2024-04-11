<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Project</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Create Project</li>
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
                                <h4 class="m-b-0 text-white">Create Project Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Add Project Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Project Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="projectname" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                    </div>
                                    <div class="form-group">
                                    <h5>Start Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="startdate" class="form-control" required data-validation-required-message="This field is required" placeholder="dd/mm/yyyy">
                                        </div>
                                         </div>
                                         <div class="form-group">
                                    <h5>End Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="enddate" class="form-control" required data-validation-required-message="This field is required" placeholder="dd/mm/yyyy">
                                        </div>
                                         </div>
                                         <div class="form-group">
                                         <h5>Choose Project Status<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="status" id="ustatus" class="form-control" required data-validation-required-message="This field is required">
                                            <option value="Complete">Complete</option>
                                            <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                            </div>
                                            <div class="form-group">
                                         <h5>Choose Client<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="clientid" id="uclientid" class="form-control" required data-validation-required-message="This field is required">
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
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Describe the above project"></textarea>
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
                                            $insertQuery="INSERT INTO `Project` (`projectid`, `projectname`, `startdate`, `enddate`, `description`, `status`, `userid`, `clientid`, `updated_at`) VALUES (NULL, '".$projectname."', '".$startdate."', '".$enddate."', '".$description."', '".$status."', '".$userid."', '".$clientid."', current_timestamp()); ";
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