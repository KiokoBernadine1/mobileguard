<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Role</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Create Role</li>
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
                                <h4 class="m-b-0 text-white">Create Role Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Add Role Information</h3>
                                        <hr>
                                        <div class="form-group">
                                        <h5>Role Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="rolename" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Role Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="description" id="textarea" class="form-control" required placeholder="Describe the above role"></textarea>
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
                                            $insertQuery="INSERT INTO `Role` (`roleid`, `rolename`, `description`, `updated_at`) VALUES (NULL, '".$rolename."', '".$description."', current_timestamp());";
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