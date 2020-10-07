<?php
include("header.php");
?>


<fieldset class="wow"><legend class="abili"> Student Matric number Update system using roll number</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p><input type="text" name="roll" placeholder="Enter your roll number" required style="width:500px;height:50px;padding:5px;"/></p>
<p><input type="text" name="matric" placeholder="Enter your matric number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_folder"/>
<input type="submit" name="submitted" value="Update Data" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['hidden_folder'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	
require_once("config.php");
$roll = data($_POST['roll']);
$mat_no = data($_POST['matric']);
$sele = "SELECT * FROM register WHERE Admission_No='$roll'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	echo "NO record for the user <b>$roll</b>";
	}
	else{
		$update = "UPDATE register SET username='$mat_no' WHERE Admission_No='$roll'";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to update user with roll number  <b>$roll</b>";
			
			}
			else{
				echo "Record updated successfully for <b>$roll ($mat_no)</b>";
				
				}
		
		
		}
		
			}
			else{
				echo "";
				
				}
?>
</div>
</fieldset>



</div>

</body>
</html>
