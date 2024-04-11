<?php
/**
 * Created by KIOKO BERNADINE.
 * User: MobileGuard 
 */
require "session_manager.php";
//echo($http_refer);
session_destroy();
echo('Redirecting...');
header('Location:login.php');
?>