<?php
session_start();
if (!isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_level']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_username']) || !isset($_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'])){

echo "<h1 style='text-align:center;'>You are an unauthorized user</h1>";

exit;
}

?>
<html>
<head>
<title>ALPHAEXAMZ COMPUTER BASED TEST E-FACILITY</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="all"/>
<meta name="description" conten="Iuo facilities"/>
<meta name="keywords" conten="Iuo facilities"/>
<meta name="author" content="Biobaku OLuwole Timothy"/>
<script src="js/custom.js"></script>
<script src="js/jquery.js"></script>
<script src="js/shortcut.js"></script>

</head>
<body>
	
	<div class="header">
	<center>
	<img src="img/banne.png" class="imgs"/></center>
	</div>
	<img src="image/logout.png" onclick="parent.location='logout.php'" class="ty"/>
	<img class='p_image' src="imageselector.php?id=<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_id'];?>"/>
	
	<p class="pers"><img src="image/logout.png" onclick="parent.location='logout.php'" title="Please click this button to logout " style="width:20px;"/>
	<i>You are logged in as</i> <b><?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_fullname'];?></b></p>
<div class="centt"></div>
<div class="cen" align="center">

<table cellpadding="10px" cellspacing="10px" border="0px" width="">
<tr>
<td>
<div class="grid">
<img src="image/cu.png"onclick="parent.location='insert.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
<img src="image/updat.png" onclick="parent.location='update.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
<img src="image/cs.png" onclick="parent.location='check_script.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

</tr>

<tr>
<td>
<div class="grid">
<img src="image/gd.png" onclick="parent.location='allow.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
<img src="image/re.png" onclick="parent.location='reset_ex.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
<img src="image/v_data.png" onclick="parent.location='check_data.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>



</tr>


<tr>
<td>
<div class="grid">
<img src="image/pch.png" onclick="parent.location='chp.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
	<img src="image/gen.png" onclick="parent.location='generate_result.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>

<td>
<div class="grid">
	<img src="image/atcl.png" onclick="parent.location='clear_at.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>



</tr>






<tr>
<td>
<div class="grid">
<img src="image/logoff.png" onclick="parent.location='user_log.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
	<img src="image/multi_exam.png" onclick="parent.location='subject_pin.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>

<td>
<div class="grid">
	<img src="image/upload_quest.png" onclick="parent.location='question_upload.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>



</tr>







<tr>
<td>
<div class="grid">
<img src="image/qp.png" onclick="parent.location='question_randomizer.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>
</div>
</td>

<td>
<div class="grid">
	<img src="image/up_student.png" onclick="parent.location='.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>

<td>
<div class="grid">
	<img src="image/m.png" onclick="parent.location='.php?wkey=<?php echo uniqid()?>&hkey=<?php echo sha1(md5(rand(123,093027183901)));?>&br=<?php echo $_SERVER['HTTP_USER_AGENT'];?>'" class="fo"/>

</div>
</td>



</tr>



</table>

</div>
<div class="centt"></div>

<div class="footer">
<p class="foot">Powered by <b>xelow GLobal Concept (+2348169452139)</b></p>

</div>
</body>
</html>
