<?php include("header.php");?>
<script type="text/javascript" src="question_num.js"></script>
<fieldset class="wow"><legend class="abili">Generate Result Based on subject categories </legend>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" autocomplete="off" method="POST">

<p><?php include("course.php");?></p>
<p>

<div id="drop"></div>

</p>
<input type="hidden"  value="<?php echo sha1(rand(123,89273982));?>" name="generate_result"/>
<input type="submit" name="submitted" value="Generate Examination Results" class="btncr"/>
</form>

<div class="pen">
<?php
if(isset($_POST['generate_result'])){
	
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
	
$mat = "";
if(isset($_POST['matric'])){
	foreach($_POST['matric'] as $key)
	$mat = $key;
	}

?>
<script type="text/javascript">
window.location= "test_result.php?p=<?php echo $mat;?>&u=<?php echo $select;?>";
</script>
<?php

header("location:test_result.php?p=$mat&u=$select");

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
