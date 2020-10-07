<fieldset class="wow"><legend class="abili"> Check Examination Attendance Using Matric Number </legend> 

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<p><input type="text" name="matric" placeholder="Enter matric no" style="width:500px;height:50px;padding:5px;" class=""/></p>
<input type="hidden" name="walking" value="<?php echo rand(1233 ,892763892929)?>" class=""/>
<input type="submit" value="check" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST["walking"])){
	require("config.php");
	function clean($str) {
	$str = @trim($str);
   if(get_magic_quotes_gpc()){
   $str = stripslashes($str);

   }
return mysql_real_escape_string($str);
}


$user = clean($_POST["matric"]);


    $cmd = "SELECT * FROM attendance_multiple WHERE username='$user'";
	$d = mysql_query($cmd);
	$anum = mysql_num_rows($d);
	if($anum != 0){
		echo "<table cellpadding='10px' cellspacing='3px' border='1'><tr><th>Subject</th><th>Timestamp</th></tr>";
		while($row =mysql_fetch_array($d)){
			$user = $row["username"];
			$sub = $row["subject"];
			$dt= $row["date_time"];
			echo "<tr><td>$sub</td><td>$dt</td></tr>";
			}
			echo "</table>";
		
		
	}
	else{
		echo "No data found for <b>$user</b>";
		
		}
	
	
	}

?>
