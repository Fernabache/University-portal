<?php include("header.php");?>
<fieldset class="wow"><legend class="abili">Examination Access system</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p style="margin-bottom:5px;"><input type='radio' checked="checked" name="option" value="granted"/>&nbsp;Grant access&nbsp;<input type='radio' name="option" value="revoked"/>&nbsp;Deny access&nbsp;</p>

<p><input type="text" name="matric" placeholder="Enter your matric number or Roll number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_allow"/>
<input type="submit" name="submitted" value="Submit Access" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['hidden_allow'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	

require_once("config.php");

$mat_no = data($_POST['matric']);
$option = data($_POST['option']);
$sele = "SELECT * FROM register WHERE username ='$mat_no' OR Admission_No='$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	echo "NO record for the user <b>$mat_no</b>";
	}
	else{
	$update = "UPDATE register SET access='$option' WHERE username ='$mat_no' OR Admission_No='$mat_no'";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to update user with matric number  <b>($mat_no)</b>";
			
			}
			else{
				echo "Record updated successfully for user <b>($mat_no)----> Access $option</b>";
				
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

