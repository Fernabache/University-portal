
<?php include("header.php");?>
<fieldset class="wow"><legend class="abili"> Check student Examination script using Matric Number </legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

<p><input type="text" name="matric" placeholder="Enter your matric number or name  or roll number" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="hidden_pinut"/>
<input type="submit" name="submitted" value="Check data" class="btncr"/>
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
$sele = "SELECT * FROM exams_scores WHERE script_owner = '$mat_no'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	echo "NO record for the user <b>$mat_no</b>";
	}
	else{
			echo "You have attempted $num question(s)";
		
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

