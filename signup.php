<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

include "MySql.php";

$db=new MySql();

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);    
    $role = trim($_POST['role']);	
    $password = trim($_POST['password']);
    $passwordconf = trim($_POST['passwordconf']);	
    if (isset($_POST['firstname'])) $firstname = $_POST['firstname'];
    if (isset($_POST['lastname'])) $lastname = $_POST['lastname'];
    if (isset($_POST['email'])) $email = $_POST['email'];
    if (isset($_POST['role'])) $role = $_POST['role'];    
    if (isset($_POST['password'])) $password = $_POST['password'];
    if (isset($_POST['passwordconf'])) $passwordconf = $_POST['passwordconf'];
    $error = array();
    if (empty($_POST["firstname"])) {
        $error[] = 'Please enter your first name';
    }
    if (empty($_POST["lastname"])) {
        $error[] = 'Please enter your last name';
    }
    if (empty($_POST["email"])) {
        $error[] = 'Please enter your email';
    }
    if (empty($_POST["role"])) {
        $error[] = 'Please choose your role';
    }  
    if (empty($_POST["password"])) {
        $error[] = 'Please your password';
    }
    if (empty($_POST["passwordconf"])) {
        $error[] = 'Please confirm your password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>MobileGuard</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="assets/plugins/wizard/steps.css" rel="stylesheet">
	 <!--alerts CSS -->
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    
	<!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-block">							    
                                <h2 align="center" class="card-title">MobileGuard User Sign Up</h2>
                                <h4 align="center" class="card-subtitle">Already have an account?<a href="login.php"><strong> Log In</strong></a></h4>
                                <form action="" method="POST" class="validation-wizard wizard-circle" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Personal Details</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> First Name : <span class="danger">*</span> </label>
                                                    <input name="firstname" type="text" class="form-control required" id="wfirstName2" > </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Last Name : <span class="danger">*</span> </label>
                                                    <input name="lastname" type="text" class="form-control required" id="wlastName2" > </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
                                                    <input name="email" type="email" class="form-control required" id="wemailAddress2" > </div>
                                            </div>											
                                        </div> 
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Role Details</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="schname"> Choose Role : <span class="danger">*</span> </label>
                                                    <div class="controls">
                                            <select name="role" id="urole" required class="form-control">
                                                <?php
                            $squery="SELECT * FROM Role";
                            $ssquery=$db->select($squery);
                            foreach($ssquery as $row)
                            {
                                echo '<option value="'.$row['roleid'].'">'.$row['rolename'].'</option>';
                            }
                            ?>
                                            </select>
                                        </div>
                                            </div>																				
                                        </div>                                        
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Account Security</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="spassword"> Password(Must be greater or equal to 6 characters) : <span class="danger">*</span> </label>
                                                    <input name="password" type="password" class="form-control required" id="spassword" > </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="spassconf"> Confirm Password : <span class="danger">*</span> </label>
                                                    <input name="passwordconf" type="password" class="form-control required" id="spassconf" > </div>
                                            </div>	
											
                                        </div>
                                    </section>					
                                </form>
								<?php
                //  form operations
                if (isset($error)) {
                    if (!empty($error)) {
                        echo '<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Error Imminent! </strong>'. @implode('</li><li>', $error).' 
									</div>';
                    }
                    else{	
							//password validation
                        if(strlen(trim($_POST['password']))>=6 && strlen(trim($_POST['passwordconf']))>=6 && trim($_POST['password'])==trim($_POST['passwordconf'])) {

                           					
							//payment module integration
							
							//email verification & validation
					
                            //update query here
                            $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                            $insertQuery = "INSERT INTO `User` (`userid`, `firstname`, `lastname`, `email`, `password`, `roleid`, `updated_at`) VALUES (NULL, '".$firstname."', '".$lastname."', '".$email."', '".$hashedPassword."', '".$role."', CURRENT_TIMESTAMP());";
                            $db->insert($insertQuery);
                            echo '<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Success! </strong>Sign Up Complete, Please Log in.
									</div>';
                        }
                        else{
                            $error[]="Check if password matches and is more than 6 characters.";
                            echo '<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Error Imminent! </strong>'. @implode('</li><li>', $error).' 
									</div>';
                        }
                    }

                }

                ?>
                            </div>
                        </div>
                    </div>
                </div>


</section>

<h4 align="center">© 2023 Mobile Guard System by KIOKO BERNADINE</h4>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
  <script src="assets/plugins/moment/min/moment.min.js"></script>
    <script src="assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugins/wizard/steps.js"></script>
	
	<!-- jQuery file upload -->
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
	
	
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


</body>

</html>
