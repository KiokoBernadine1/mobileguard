<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

 include "header.php";

 if ($_SERVER["REQUEST_METHOD"]=="POST") 
 {
    $comment_text=trim($_POST['comment_text']);   
    $taskid=trim($_POST['taskid']);  
    if (isset($_POST['comment_text'])) $comment_text = $_POST['comment_text'];    
    if (isset($_POST['taskid'])) $taskid = $_POST['taskid'];
    $error=array();
    if (empty($_POST["comment_text"])) {
        $error[]='Please enter comment_text';
    }
    if (empty($_POST["taskid"])) {
        $error[]='Please enter taskid';
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Create Comment</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Create Comment</li>
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
                                <h4 class="m-b-0 text-white">Create Comment Form</h4>
                            </div>
                            <div class="card-block">
                                <form class="m-t-40" novalidate action="" method="POST">
                                    <div class="form-body">
                                        <h3 class="card-title">Add Comment Information</h3>
                                        <hr>
                                  
                                            <div class="form-group">
                                         <h5>Choose Task<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                            <select name="taskid" id="utaskid" class="form-control" required data-validation-required-message="This field is required">
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
                                        <h5>Comment<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="comment_text" id="textarea" class="form-control" required placeholder="Write your comment here"></textarea>
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
                                            $insertQuery="INSERT INTO `Comment` (`commentid`, `comment_text`, `taskid`, `userid`, `updated_at`) VALUES (NULL,'".$comment_text."', '".$taskid."', '".$userid."', current_timestamp()); ";
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