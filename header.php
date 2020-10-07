<?php
session_start();
if (!isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_username']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'])){

echo "<h1 style='text-align:center;'>You are an unauthorized user</h1>";

exit;

}

?>
<html>
<head>
<title>IUO E-FACILITY</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="all"/>
<meta name="description" conten="Iuo facilities"/>
<meta name="keywords" conten="Iuo facilities"/>
<meta name="author" content="Biobaku OLuwole Timothy"/>
<script src="js/custom.js"></script>
<script src="js/jquery.js"></script>
<script src="js/shortcut.js"></script>
</head>
<body>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
	<div class="header">
	<center>
	<img src="image/ep.png" class="imgs"/></center>
	</div>
	<img src="image/logout.png" onclick="parent.location='logout.php'" class="ty"/>
	<img class='p_image' src="imageselector.php?id=<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'];?>"/>
	
	<p class="pers"><img src="image/home.png" class="wer" onclick="parent.location='index.php'"/>
		<img src="image/logout.png" onclick="parent.location='logout.php'" title="Please click this button to logout " style="width:20px;"/>
	<i>You are logged in as</i> <b><?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'];?></b></p>
<div class="centt"></div>
<div class="cen" align="center">
