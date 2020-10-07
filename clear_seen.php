<?php require("check_m_status.php");?>
</div>
</fieldset>

<fieldset class="wow"><legend class="abili"> Clear Examination Attendance Using Matric Number </legend> 

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<p><select name="sl[]" class='freo'>
<option value="single">Clear Single Course using matric number</option>
<option value="all">Clear all Course using matric number</option>
<option value="ev">Clear all Course without using matric number</option>
</select></p>

<p><select name="level[]" class='freo'>
<?php require("subject_att.php");?>
</select></p>
<p><input type="text" placeholder="Enter matric no" style="width:500px;height:50px;padding:5px;" name="matric" class=""/></p>
<input type="hidden" name="walk" value="<?php echo rand(1233 ,892763892929)?>" class=""/>
<input type="submit" value="clear" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST["walk"])){
	require("config.php");
	function clean($str) {
	$str = @trim($str);
   if(get_magic_quotes_gpc()){
   $str = stripslashes($str);

   }
return mysql_real_escape_string($str);
}


$user = clean($_POST["matric"]);
$level = "" ;
if(isset($_POST['level'])){
foreach($_POST['level'] as $key){
$level =  $key ;
}
}


$sl = "" ;
if(isset($_POST['sl'])){
foreach($_POST['sl'] as $key){
$sl =  $key ;
}
}
if($sl == "all"){
    $cmd = "SELECT * FROM attendance_multiple WHERE username='$user'";
	$d = mysql_query($cmd);
	$anum = mysql_num_rows($d);
	if($anum != 0){
	$cmd = "DELETE FROM attendance_multiple WHERE username='$user'";
	$d = mysql_query($cmd);
	if($d){
		echo "<p>Data is cleared!</p>";
		}
		else{
			echo "<p>Failed to clear data!</p>";
			}
		}
		else{
		echo "<p>NO data found!</p>";
		}
	}

else if($sl == "single"){
	
    $cmd = "SELECT * FROM attendance_multiple WHERE username='$user' AND subject='$level'";
	$d = mysql_query($cmd);
	$anum = mysql_num_rows($d);

	if($anum != 0){
		
	$cmd = "DELETE FROM attendance_multiple WHERE username='$user' AND subject='$level'";
	$d = mysql_query($cmd);
	if($d){
		echo "<p>Data is cleared for <b>$user</b> under  <b>$level</b></p>";
		}
		else{
			echo "<p>Failed to clear data!</p>";
			
			}
	
		}
		else{
		echo "<p>NO data found for <b>$user</b> under  <b>$level</b></p>";
		}
	
	}
	else{
			$cmd = "DELETE FROM attendance_multiple";
	$d = mysql_query($cmd);
	if($d){
		echo "<p>All attendance data is  cleared </p>";
		}
		else{
			echo "<p>Failed to clear data!</p>";
			
			}
		}
	}

?>

</div>
</fieldset>




