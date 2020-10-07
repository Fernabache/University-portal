<?php
include("header.php");
?>
<div class="allocated">
<fieldset class="wow"><legend class="abili">Allocate Pin code to approved questions</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<p><?php include("select_multiple.php");?></p>
<p><input type="text" name="matric" placeholder="Enter Pin code" maxlength="4" required style="width:500px;height:50px;padding:5px;"/></p>
<p><input type="text" name="time" placeholder="Enter Time in minutes" maxlength=""  required style="width:500px;height:50px;padding:5px;"/></p>

<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="subject_pin"/>
<input type="submit" name="submitted" value="Submit Data" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['subject_pin'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	
require_once("config.php");


$tab = "
CREATE TABLE IF NOT EXISTS subject_pin(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
subject TEXT NOT NULL,
pin TEXT NOT NULL,
time_allocated TEXT NOT NULL,
allocated_question TEXT NOT NULL,
token TEXT NOT NULL,
date_time TIMESTAMP NOT NULL
)
";
$query = mysql_query($tab);
if(!$query){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
exit;
}




$roll = "";

if(isset($_POST['selector'])){
	foreach($_POST['selector'] as $yt){
		$roll = $yt;
		}
	
	}


$mat_no = data($_POST['matric']);
$timer = data($_POST['time']);
$sele = "SELECT * FROM subject_pin WHERE subject = '$roll'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){
	$token = sha1(uniqid().rand(123,73882));
	
	$su = "SELECT * FROM questions WHERE approval_status='approved' and categories='$roll'";
	$rty = mysql_query($su);
	if(!$rty){
	echo "Failed to select the approved questions";
	exit;
	
	}
	$tyu = mysql_num_rows($rty);
	
	
	$update = "INSERT INTO subject_pin(subject , pin , time_allocated ,allocated_question ,token ,date_time) VALUES('$roll' , '$mat_no' ,'$timer' , '$tyu','$token' ,now())";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to insert pin code for  <b>$roll</b> subject";
			
			}
			else{
				echo "pin code <b>($mat_no)</b> inserted successfully for <b>$roll</b> subject";
				
				}
	}
	else{
		$token = sha1(uniqid().rand(123,73882));
		$update = "UPDATE subject_pin SET pin='$mat_no' , time_allocated='$timer' , token='$token' , date_time=now() WHERE subject = '$roll'";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to insert pin code for  <b>$roll</b> subject";
			
			}
			else{
				echo "pin code <b>($mat_no)</b> update successfully for <b>$roll</b> subject";
				
				}
		
		
		}
		
			}
			else{
				echo "";
				
				}
?>
</div>
</fieldset></div>

<button id="retu" style="padding:10px;">View Posted Details</button>
<button id="retue" style="padding:10px;">Hide Posted Details</button>
<div class="ertre">

<fieldset class="wow"><legend class="abili">Allocated Pin code with subjects</legend> 
<?php include("del_pin.php");?>
<?php
require_once("config.php");
$select = "SELECT * FROM subject_pin ORDER BY id desc LIMIT 5 ";
$re = mysql_query($select);
if(!$re){
	echo "failed to select data!";
	
	}
	else{
		echo "<table cellpadding='8px' cellspacing='0px' width='100%' border='1px'><tr align='left'><th>Subjects</th><th>Pin code</th><th>Time(minutes)</th><th>Number of questions</th><th>Action</th></tr>";
		while($row = mysql_fetch_array($re)){
			$id = $row['id'];
			$sub = $row['subject'];
			$pin = $row['pin'];
			$time = $row['time_allocated'];
			$qp = $row['allocated_question'];
			$we = $_SERVER['PHP_SELF'];
			echo "<tr><td>$sub</td><td>$pin</td><td>$time</td><td>$qp</td><td>
			<form action='$we' method='POST'><input type='hidden' name='id_pin' value='$id'/><input type='submit' value='delete'/></form>
			</td></tr>";
			}
		echo "</table>";
		
		}
?>


</fieldset></div>

</div>






</body>
</html>
