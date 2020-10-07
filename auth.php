<?php
session_start();
	if($_SERVER["REQUEST_SCHEME"] == 'http'){
$host = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];
$link = "https://".$host.$uri;
header("location:$link");

exit;
}


if (!isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_username']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'])){
$msg="Please login before access";
		$l = $_SERVER['HTTP_HOST'];
		$q = rawurlencode($_SERVER['REQUEST_URI']);
header("location:login-form.php?u=http://$l$q&msg=$msg");

exit;
}

if (!isset($_COOKIE[$_SESSION['CodeHouseGroup_Session_Examination_Assessment_token']])){
$msg="Your session has expired!";

unset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id']);
unset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'] );
unset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_email']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_level']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_gender']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_title']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_ip_address']);
unset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_os']);
unset( $_SESSION['CodeHouseGroup_Session_Examination_Assessment_token']);

		$l = $_SERVER['HTTP_HOST'];
		$q = rawurlencode($_SERVER['REQUEST_URI']);
header("location:login-form.php?u=http://$l$q&msg=$msg");

exit;
}
?>