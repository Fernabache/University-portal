
<?php include("header.php");?>
<fieldset class="wow"><legend class="abili"> Update / Add new / Delete student Matric Number </legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p style="margin-bottom:5px;">

	<input type='radio'  checked="checked" class="re" name="option" value="update_account"/>&nbsp;Update Data &nbsp;
	<input type='radio' name="option" class="dd" value="insert"/>&nbsp;New data&nbsp;
		<input type='radio'   class="deler" name="option" value="delete"/>&nbsp;Delete Data &nbsp;
	</p>
	
<p><input type="text" name="matric" placeholder="Enter matric number " required="" style="width:500px;height:50px;padding:5px;"/></p>

<p><input type="password" name="pass" placeholder="Enter password " required="" class="ip" style="width:500px;height:50px;padding:5px;"/></p>

<input type="hidden"  value="<?php echo sha1(rand(123,89273982));?>" name="add_matric"/>
<input type="submit" name="submitted" value="Update Data" class="btncr"/>
</form>

<div class="pen">
<?php
if(isset($_POST['add_matric'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
		
require_once("config.php");

$mat_no = data($_POST['matric']);
$opt = data($_POST['option']);
$salt = "wolexzo07dacrackertheBlAcKerhathacker199019921962";
$pass = data(md5(sha1($_POST['pass'].$salt)));
if($opt == "delete"){
	
	$sele = "SELECT * FROM register WHERE username = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num > 0){

$delr = "DELETE FROM register WHERE username = '$mat_no'";
$quy = mysql_query($delr);
if(!$quy){
	
	echo "failed select ";
	
	}
	else{
		echo "User deleted successfully!";
		
		}

}
else{
	
	echo "Username does not exists!!";
	
	}

	
	
	
	}
elseif($opt == "update_account"){
	$sele = "SELECT * FROM register WHERE username = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 1){
	$up = "UPDATE register SET Password='$pass' ,access='granted' WHERE username='$mat_no'";
	$mr = mysql_query($up);
	if($mr){
	
	echo "Matric number <b>$mat_no</b> updated! ";
	
	}
	else{
		
	echo "Failed to update Matric number <b>$mat_no</b> ";
	
	
	}
	
	}
	elseif($num == 0){
			echo "Matric number <b>$mat_no</b> not found!";	
		}
		else{
		echo "Matric number <b>$mat_no</b> cannot be updated! ($num count)";
		}
	
	}
	elseif($opt == "insert"){
		
$sele = "SELECT * FROM register WHERE username = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 1){
	echo "Matric number <b>$mat_no</b> already exist!";
	}
	else{
		$ins = "INSERT INTO register (username , Password) VALUES('$mat_no' , '$pass')";
		$ret = mysql_query($ins);
		if($ret){
			echo "Matric Number <b>$mat_no</b> added successfully! ";
			
			}
			else{
					echo "failed to add <b>$mat_no</b>";
				
				}
				
		}
		

		
		}
		else{
			echo "";
			
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

