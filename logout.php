<?php
session_start();
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

$msg="You have been logged out successfully";
header("location:index.php?msg=$msg");

?>
