<?php include("header.php");?>
<fieldset class="wow"><legend class="abili">Logout user using matric number</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p style="margin-bottom:5px;"><input type='radio' checked="checked" name="option" value="granted"/>&nbsp;Enable Logoff&nbsp;&nbsp;&nbsp;<input type='radio' name="option" value="revoked"/>&nbsp;Disable Logoff&nbsp;</p>

<p><input type="text" name="matric" placeholder="Enter your matric number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="user_log"/>
<input type="submit" name="submitted" value="Submit Access" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['user_log'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
		
require_once("config.php");
$tok = sha1(rand(23,537282).uniqid()).md5(rand(23,7892102));

$mat_no = data($_POST['matric']);
$option = data($_POST['option']);

$tab = "CREATE TABLE IF NOT EXISTS logoff_users(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username TEXT NOT NULL,
status TEXT NOT NULL,
token TEXT NOT NULL
)";

$hu = mysql_query($tab);
if(!$hu){
	$msg = "failed to dump table!";
	echo $msg;
	exit;
	}
	
$sele = "SELECT * FROM logoff_users WHERE username = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 1){
		$ins = "UPDATE logoff_users SET status='$option',token='$tok' WHERE username='$mat_no'";
		$ret = mysql_query($ins);
		if($ret){
			echo " <b>$mat_no</b> already exists! Logoff status of <b>$mat_no</b> is now <b>$option</b>!";
			
			}
			else{
					echo "failed to perform task <b>$mat_no</b>";
				
				}

	}
	else{
	
		$ins = "INSERT INTO logoff_users (username , status, token) VALUES('$mat_no','$option', '$tok')";
		$ret = mysql_query($ins);
		if($ret){
			echo "Logoff status of <b>$mat_no</b> is now <b>$option</b>!";
			
			}
			else{
					echo "failed to insert data for user <b>$mat_no</b>";
				
				}
			
		}
		
			}
			else{
				echo "";
				
				}
?>
</div>
</fieldset>
<?php require("compl.php");?>
</div>

</body>
</html>
