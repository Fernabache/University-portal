<?php include("header.php");?>
<fieldset class="wow"><legend class="abili">Change Admin login password </legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">

<p><input type="hidden" name="matric" value="<?php echo $_SESSION['CodeHouseGroup_Session_Examination_Assessment_username'];?>"/></p>

<p><input type="password" name="pass" placeholder="Enter password " required style="width:500px;height:50px;padding:5px;"/></p>

<input type="hidden"  value="<?php echo sha1(rand(123,89273982));?>" name="admin_chan_password"/>
<input type="submit" name="submitted" value="Change Password" class="btncr"/>
</form>

<div class="pen">
<?php
if(isset($_POST['admin_chan_password'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
		
require_once("config.php");

$mat_no = data($_POST['matric']);

$salt = "wolexzo07dacrackerthewhitehathacker";

$pass = data(md5(sha1($_POST['pass'].$salt)));

$sele = "SELECT * FROM admin_register WHERE username = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 1){
		$ins = "UPDATE admin_register SET password='$pass' WHERE username='$mat_no'";
		$ret = mysql_query($ins);
		if($ret){
			echo "Password for <b>$mat_no</b> is now updated successfully! ";
			
			}
			else{
					echo "failed to add <b>$mat_no</b>";
				
				}

	}
	else{
	
	echo "User <b>$mat_no</b> does not exists!";
	
				
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
