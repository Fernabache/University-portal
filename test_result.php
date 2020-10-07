<html>
<head>
<title>Result sheet Generation </title>		
<link rel="stylesheet" href="style/style.css" type="text/css" media="all"/>
</head>
<body style="background-image:url(image/fadep.jpg);background-repeat:repeat;background-position:50% 50% ;">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
	
<p style="letter-spacing:2px;margin-top:2%;text-align:center;color:green;font-size:14pt;font-weight:bold;">EXAMINATION RESULT SHEET FOR <?php echo $_GET['u'];?></p>
<div class="container">
<div class="first_a">
<img src="img/excel.png" class="deme" onClick ="$('#tableID').tableExport({type:'excel',escape:'false'});"/>
<img src="img/word.png" class="deme" onClick ="$('#tableID').tableExport({type:'doc',escape:'false'});"/>
<img src="img/powerpoint.png" class="deme" onClick ="$('#tableID').tableExport({type:'powerpoint',escape:'false'});"/>
<img src="img/pdf.png" class="deme" onClick ="$('#tableID').tableExport({type:'pdf',pdfFontSize:'5',escape:'false'});"/>
<img src="img/text-r.png" class="deme" onClick ="$('#tableID').tableExport({type:'txt',escape:'false'});"/>

<img src="img/sql.png" class="deme" onClick ="$('#tableID').tableExport({type:'sql'});"/>
<img src="img/xml.png" class="deme" onClick ="$('#tableID').tableExport({type:'xml',escape:'false'});"/>
<img src="img/json.png" class="deme" onClick ="$('#tableID').tableExport({type:'json',escape:'false'});"/>
<img src="img/png.png" class="deme" onClick ="$('#tableID').tableExport({type:'png',escape:'false'});"/>

</div>

<div class="second_a">


<?php
require_once("config.php");
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}

$sub = data($_GET['u']);
$per = data($_GET['p']);
if(!is_numeric($per)){
	echo "Parameter is modified!!";
	exit;
	}
$sel = "SELECT DISTINCT script_owner ,fullname FROM exams_scores WHERE subject = '$sub' ORDER BY fullname";
$myqry = mysql_query($sel);
if(!$myqry){
	echo "Data selection Failed!!";
	exit;
	}
	$num = mysql_num_rows($myqry);
	echo "<p class='retf'><b>Total number of student = $num</b> &nbsp;&nbsp;&nbsp; <b>Course =  $sub</b></p>";
	echo "<table cellpadding='10px' class='table2excel' id='tableID' border='1px' cellspacing='10px'><tr><td align='left'>MATRIC NUMBERS</td><td align='left'>NAMES</td><td align='left'>EXAM. SCORES(Out of $per)</td><td align='left'>PER(%) SCORES</td></tr>";
	while($rt = mysql_fetch_array($myqry)){
		
		$owner = strtoupper($rt["script_owner"]);
		$full = strtoupper($rt["fullname"]);
		
		
		$sele = "SELECT SUM(score_point) AS timsum FROM exams_scores WHERE script_owner='$owner' AND subject = '$sub'";
		$wole = mysql_query($sele);
		
		if(!$wole){
			echo "Failed to sum up data!!";
			exit;
			}
			
			$rre = mysql_fetch_assoc($wole);
			
			$sco = $rre["timsum"];
		
		$pere = round((($sco/$per)*100),2);
		echo "<tr><td>$owner</td><td>$full</td><td>$sco</td><td>$pere</td></tr>";
		
		
		}
		echo "</table>";


?>

</div>
</div>
	<script>
		function download_excel(){
			$(function() {
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "Result for <?php echo $sub;?>"
				});
			});
			}
			
			
			
		</script>
</body>
</html>
