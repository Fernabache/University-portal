
<?php include("header.php");?>
<fieldset class="wow"><legend class="abili"> Reset examination scores using matric number </legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p><?php include("course.php");?></p>
<p><input type="text" name="matric" placeholder="Enter your matric number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_reset"/>
<input type="submit" name="submitted" value="Reset Data" class="btncr"/>
</form>

<div class="pen">
<?php
if(isset($_POST['hidden_reset'])){
	
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

$mat_no = data($_POST['matric']);

$sele = "SELECT * FROM register WHERE username='$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	echo "NO record for the user <b>$mat_no</b>";
	}
	else{
		$sele = "SELECT * FROM exams_scores WHERE script_owner='$mat_no' AND subject='$select'";
	$quy = mysql_query($sele);
	if(!$quy){
	echo "failed to select ";
	
	}
	$numm = mysql_num_rows($quy);
		if($numm == 0 ){
			
			echo "(<b>$mat_no</b>) has not taken any exam under (<b>$select</b>)";
			
			}
			else{
				
				
				
		$update = "DELETE FROM exams_scores WHERE script_owner='$mat_no' AND subject='$select'";
		$query = mysql_query($update);
		$ree = mysql_affected_rows();
		if(!$query){
			echo "Failed to reset user (<b>$mat_no</b>) exams";
			
			}
			else{
						$update = "UPDATE register SET access='granted' WHERE username='$mat_no'";
						$query = mysql_query($update);
						if(!$query){
						echo "Failed to update user with matric number  <b>($$mat_no<)/b>";
							exit();
						}
				
				echo "Exams. scores deleted <b>($ree entries)</b> successfully for <b>($mat_no)</b> under (<b>$select</b>)<br/>"; 
				
				
				}
		
				
				
				}
		
		
		}
		
			}
			else{
				echo "";
				
				}
?></div>
</fieldset>

<?php require("all_reset.php");?>


</div>

</body>
</html>

