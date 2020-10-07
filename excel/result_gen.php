<html>
<head>
<title>Result sheet Generation </title>		
<link rel="stylesheet" href="style/style.css" type="text/css" media="all"/>

</head>
<body style="background-image:url(image/fadep.jpg);background-repeat:repeat;background-position:50% 50% ;">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".rea").click(function(){
		
		$(".first_a").toggle();
		
		})
	
	
	})
</script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
	
<?php include("barprint.html");?>

	
<?php

if(isset($_POST['import'])){

function chk($valh){
						
						$valh = @trim($valh);
						
						if(get_magic_quotes_gpc()){
							
							$valh = stripslashes($valh);
							
							}
							
							return mysql_real_escape_string($valh);
						
						
						}
						
						
$bo = chk($_POST['bonus']);		

			
						
$type="";
if(isset($_POST['type'])){
	foreach($_POST['type'] as $key){
		$type= $key;
		
		}
	}	
	
	
	
	$college = "";
if(isset($_POST['college'])){
	foreach($_POST['college'] as $keyy){
		$college = $keyy;
		
		}
	}


		   $session = "";
     if(isset($_POST['session'])){
		 foreach($_POST['session'] as $key){
			 $session = $key;
			 
			 }
		 
		 }
		 
		 
       $semester = "";
     if(isset($_POST['semester'])){
		 foreach($_POST['semester'] as $key){
			 $semester = $key;
			 
			 }
		 
		 }	
		$sem = strtoupper($semester);
		?>
		<h2 style="letter-spacing:4pt;text-align:center" class='rea'>RESULT SHEET FOR <?php echo $type . " [SESSION $session  - $sem ]";?></h2>
		 
		
		
		
		
		<p style="letter-spacing:4pt;text-align:center;color:lightgray;"><?php if($college == ""){echo "";}else{ echo "COLLEGE OF";}?> <?php  echo $college;?></p>
		
		<?php				
	
	

require_once("db.php");

$col = strtolower($college);

if($college == ""){
	$select = "SELECT DISTINCT matric ,name FROM course WHERE course_title = '$type' AND session='$session' AND semester='$semester' ORDER BY name";

	
	}
	else{
		
		$select = "SELECT DISTINCT matric ,name FROM course WHERE course_title = '$type' AND session='$session' AND semester='$semester' AND matric LIKE '%$college%' OR course_title = '$type' AND session='$session' AND semester='$semester' AND matric LIKE '%$col%' ORDER BY name";

		}

$mysql = mysql_query($select);
$nuy = mysql_num_rows($mysql);
if($nuy == 0){
	echo "<p style='text-align:center;'>NO record found!</p>";
	exit();
	}
	
	
	
	
	
if(!$mysql){
	echo "failed to select from db!";
	}
	echo "<p>The total number of student = <b>$nuy</b></p>";
	
	if($bo == "on"){

	require("withbonus.php");
	
	}
	else{
		require("withoutbonus.php");
		
		}
	
	
					
						
						
						
	
	}
	else{
		
		echo "parameter missing!!";
		}
?>
</body>
</html>
