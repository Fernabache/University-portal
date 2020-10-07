<fieldset class="wow"><legend class="abili"> Reset examination scores for a particular course </legend> 
<form onsubmit="return check()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p><?php include("course.php");?></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_reset_all"/>
<input type="submit" name="submitted" value="Reset Data" class="btncr"/>
</form>
<script>
function check(){
	var cn = document.getElementById("cui").value;
	
	var ui = confirm("This action will delete all exams scores related to the selected course " + cn + "only");
	if(ui==true){
		return true;
		}
		else{
			return false;
			
			
			}
	}
</script>
<div class="pen">
<?php
if(isset($_POST['hidden_reset_all'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	

require_once("config.php");

$select = "";
if(isset($_POST['selec'])){
	foreach($_POST['selec'] as $key)
	$select = $key;
	}


$sele = "SELECT * FROM exams_scores WHERE subject='$select'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	echo "NO record for the user <b>$select</b>";
	}
	else{
		
	     $update = "DELETE FROM exams_scores WHERE subject='$select'";
		$query = mysql_query($update);
		$ree = mysql_affected_rows();
		if(!$query){
			echo "Failed to reset subject (<b>$select</b>) exams";
			
			}
			else{
				
				echo "Scores for subject (<b>$select</b>) is deleted succefully![$ree rows affected]";
			
				}
		
		
		
			}
			
			}
			else{
				echo "";
				
				}
?></div>
</fieldset>
