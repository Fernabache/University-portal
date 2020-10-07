<?php
include("header.php");
?>

<fieldset class="wow"><legend class="abili"> Student Data verification system using matric number or Roll number </legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p><input type='radio' name="option" value="check"/>&nbsp;Check Data&nbsp;<input type='radio' name="option" value="new"/>&nbsp;insert Data&nbsp;
<input type='radio' name="option" value="del_d"/>&nbsp;Delete Data&nbsp;</p>

<p><input type="text" name="matric" placeholder="Enter your matric number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_pinut"/>
<input type="submit" name="submitted" value="Check data" style="padding:10px;"/>
</form>
<div class="pen">
<?php
if(isset($_POST['hidden_pinut'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	
require_once("config.php");
$mat_no = data($_POST['matric']);
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
			echo "<table cellpadding='10px' cellspacing='10px' border='1px'><tr><td>Photo</td><td>Name</td><td>Matric_Number</td><td>Roll Number</td><td>Access</td></tr>";
			while($row = mysql_fetch_array($quy)){
				$user = $row["username"];
				$nam = $row["Name"];
				$adm = $row["Admission_No"];
				$access = $row['access'];
				echo "<tr><td><img src='studentphoto/S$adm.jpg' style='width:120px;border-radius:50% 50%;'/></td><td>$nam</td><td>$user</td><td>$adm</td><td>$access</td></tr>";
				
				}
				echo "</table>";
		
		
		}
		
			}
			else{
				echo "ready to accept input.....";
				
				}
?>
</div>
</fieldset>




</div>

</body>
</html>
