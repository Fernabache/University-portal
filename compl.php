
<fieldset class="wow"><legend class="abili">Shutdown all computer running cbt</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p style="margin-bottom:5px;"><input type='radio' checked="checked" name="option" value="granted"/>&nbsp;Enable computer shutdown&nbsp;&nbsp;&nbsp;<input type='radio' name="option" value="revoked"/>&nbsp;Disable computer shutdown&nbsp;</p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="user_comp"/>
<input type="submit" name="submitted" value="Submit Access" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['user_comp'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
		
require_once("config.php");
$tok = sha1(rand(23,537282).uniqid()).md5(rand(23,7892102));
$option = data($_POST['option']);

$tab = "CREATE TABLE IF NOT EXISTS logoff(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
status TEXT NOT NULL,
token TEXT NOT NULL
)";

$hu = mysql_query($tab);
if(!$hu){
	$msg = "failed to dump table!";
	echo $msg;
	exit;
	}
	
$sele = "SELECT * FROM logoff";
$quy = mysql_query($sele);
if(!$quy){
	
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 1){
		$ins = "UPDATE logoff SET status='$option',token='$tok'";
		$ret = mysql_query($ins);
		if($ret){
			echo "Computers shutdown is <b>$option</b>";
			
			}
			else{
					echo "failed to perform task";
				
				}

	}
	else{
	
		$ins = "INSERT INTO logoff (status, token) VALUES('$option', '$tok')";
		$ret = mysql_query($ins);
		if($ret){
			echo "Computers shutdown is <b>$option</b>";
			
			}
			else{
					echo "failed to insert data for user";
				
				}
			
		}
		
			}
			else{
				echo "";
				
				}
?>
</div>
</fieldset>
