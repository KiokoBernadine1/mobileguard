<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */

include "MySql.php";
include "session_manager.php";


$db=new MySql();

if (loggedin()) {
    header('Location:index.php');
}
else{
    $message='';
    $user="";
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email= $_POST['email'];
        $password= ($_POST['password']);
        $dbQuery="SELECT * FROM User WHERE email='$email'";
        if (!empty($email) && !empty($password)){
            $dbSelect=$db->select($dbQuery);
            if(count($dbSelect)==0){
                $message="invalid email/password combination";
            }
            else if (count($dbSelect)==1) {
                foreach ($dbSelect as $row) {
                    $userf = $row['firstname'];
                    $userl = $row['lastname'];                    
                    $ml=$row['email'];
                    $hashedPassword = $row['password'];
                    $userid = $row['userid'];
                }
                if(password_verify($password,$hashedPassword)){
                    $_SESSION['userf']= $userf;
                    $_SESSION['userl']=$userl;
                    $_SESSION['userid']=$userid;                    
                    $_SESSION['ml']=$ml;
                    header('Location:index.php');
                }else{
                    $message="invalid email/password combination";
                }
            }

        }
        else{
            $message="Please Input Email or Password to Continue";
        }
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
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
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
    <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action="" method="post">
                    <h3 align="center" class="box-title m-b-20">MobileGuard User Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="email" id="email" class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password" id="password" class="form-control" type="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="signup.php" class="text-info m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <?php
                if (($message!="")) {
                    echo '<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Error Imminent! </strong>'. $message.' 
									</div>';
                }

                ?>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                        <div class="col-sm-12 text-center">
                            <p>Reset Complete?<a href="login.php" class="text-info m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
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
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>