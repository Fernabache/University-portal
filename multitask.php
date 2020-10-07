<?php
include("header.php");
?>

<?php
require("config.php");
$sl = "SELECT * FROM cross_platform_mode WHERE id='1'";
$gu = mysql_query($sl);
$hu = mysql_fetch_array($gu);
$status = $hu["status"];
if($status == "disable"){
$msg = "Please enable the multiple exam platform";
echo $msg;
exit;
}
?>
<div class="allocated">
<fieldset class="wow"><legend class="abili">QUESTIONS APPROVAL MULTIPLE AUTOMATION SYSTEM (RANDOMIZER)</legend> 

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="2px" cellspacing="6px">

<tr>

<td>
<select name="publish[]" required="required" class="select" id="selectt">
<option value="approved">Grant Questions</option>
<option value="pending">Pend Questions</option>
</select>
</td>
</tr>

<tr>

<td>
<select name="cat[]" required="required"  class="select" id="selectt">
<?php
include("exams.php");
?>
</select>
</td>
</tr>

<tr>

<td>

<select name="session[]" id='selectt' class="select">
								
    						<?php require("sessions.php");?>
    						
    						</select></td>
</tr>


    						
							
							<tr>

<td>

								<select name="semester[]" id='selectt' required="required" class="select">
    						<option value="First Semester">First Semester</option>
    						<option value="Second Semester" selected="selected" >Second Semester</option>
    						</select>
</td>
</tr>



<tr>

<td>
<textarea  name="numb" placeholder="ENTER IN THE FORMAT (COURSE CODE)-(NUMBER OF QUESTIONS)-(SUBJECT PIN)-(TIME ASSIGNED IN MINUTES)" style="resize:none;width:500px;height:200px;"></textarea>
</td>
</tr>




<tr>

<td>
<input type="hidden" name="exams_multitask" value="superadmingrantingaccess"/>
<input type="submit" value="Approve question(s)" class="btncr"/>
</td>
</tr>
</table>
</form>

					</fieldset>
					
										</div>

</div>


<style type='text/css'>
select {
	width:500px;
	height:50px;
	}
option{
	padding:10px;
	
	}
	.gh{
		padding:10px;
		
		}

</style>
					<p style="margin:2%;text-align:centre;">
					
<?php
if(isset($_POST['exams_multitask']) && !empty($_POST['exams_multitask'])){
require_once("config.php");
function santi($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
		   $session = "";
     if(isset($_POST['session'])){
		 foreach($_POST['session'] as $key){
			 $session = santi($key);
			 
			 }
		 
		 }
		 
		 
       $semester = "";
     if(isset($_POST['semester'])){
		 foreach($_POST['semester'] as $key){
			 $semester = santi($key);
			 
			 }
		 
		 }	
	
	
$numb = santi($_POST["numb"]);


if(empty($_POST["numb"])){
$msg="<script type='text/javascript'>alert('Please enter the number of questions you want to randomly approve!')</script>";
echo $msg;
exit();
}
$slet = "";
if(isset($_POST['publish'])){
foreach($_POST['publish'] as $key ){
$slet = $key;
}

}

$cat = "";
if(isset($_POST['cat'])){
foreach($_POST['cat'] as $key ){
$cat = $key;
}

}


if($slet == "approved"){

$code = santi($_POST["numb"]);
$ti = explode("," , $code);

$counter = count($ti);
$i = 0;
for($i;$i<$counter;$i++){

$u = explode("-",$ti[$i]);
$coun = count($u);

if($u[0]==""){
$msg="<script type='text/javascript'>alert('Course code missing! Please enter the correct format Cc-Nq-Pin-Time for entry #$i!')</script>";
echo $msg;
exit();
}elseif(($u[1]=="") || (strlen($u[1]) > 3) || !is_numeric($u[1]) ){
$msg="<script type='text/javascript'>alert('Number of questions is not valid $u[1] !Please enter the valid format for entry #$i!')</script>";
echo $msg;
exit();
}
elseif(($u[2]=="") || (strlen($u[2]) > 4) || !is_numeric($u[2]) ){
$msg="<script type='text/javascript'>alert('Subject Pin is not valid $u[2] !Please enter the valid format for entry #$i!')</script>";
echo $msg;
exit();

}
elseif(($u[3]=="") || (strlen($u[3]) > 5) || !is_numeric($u[3]) ){
$msg="<script type='text/javascript'>alert('Time allocated is not valid $u[3] !Please enter the valid format for entry #$i!')</script>";
echo $msg;
exit();

}
else{

}

$command = "UPDATE questions SET approval_status = '$slet' WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$u[0]' AND approval_status='pending' ORDER BY RAND() LIMIT $u[1] ";
$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Questions $slet query failed for $u[0]!')</script>";
echo $msg;
}
else{
$sd = "SELECT * FROM subject_pin WHERE subject='$u[0]'";
$jk = mysql_query($sd);
if(!$jk){
$msg="<script type='text/javascript'>alert('Failed to select from subject pin ')</script>";
echo $msg;


}
else{
$nun = mysql_num_rows($jk);
	$su = "SELECT * FROM questions WHERE approval_status='approved' and categories='$u[0]'";
	$rty = mysql_query($su);
	if(!$rty){
	echo "Failed to select the approved questions";
	exit;
	
	}
	$tyu = mysql_num_rows($rty);
if($nun != 0){

	$token = sha1(uniqid().rand(123,73882));
		$update = "UPDATE subject_pin SET pin='$u[2]' , time_allocated='$u[3]' , token='$token' , date_time=now() WHERE subject = '$u[0]'";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to insert pin code for  <b>$u[0]</b> subject";
			exit();
			}
	
		
		
}
else{


	$token = sha1(uniqid().rand(123,73882));
	$update = "INSERT INTO subject_pin(subject , pin , time_allocated ,allocated_question ,token ,date_time) VALUES('$u[0]' , '$u[2]' ,'$u[3]' , '$tyu','$token' ,now())";
		$query = mysql_query($update);
		if(!$query){
			echo "Failed to insert pin code for  <b>$u[0]</b> subject";
			exit();
			}
			
}

$msg="<script type='text/javascript'>alert('Questions is $slet for $u[0]')</script>";
echo $msg;
}


}




}
}
elseif($slet == "pending"){
$code = santi($_POST["numb"]);
$ti = explode("," , $code);

$counter = count($ti);
$i = 0;
for($i;$i<$counter;$i++){

$u = explode("-",$ti[$i]);
$coun = count($u);

$command = "UPDATE questions SET approval_status = 'pending' WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$u[0]'";
$tip = mysql_query($command);
if(!$tip){
$msg="<script type='text/javascript'>alert('Question $u[0] failed!')</script>";
echo $msg;
exit();
}
else{
$fel = "DELETE FROM subject_pin WHERE subject='$u[0]'";
$mysl = mysql_query($fel);
if(!$mysl){
$msg="<script type='text/javascript'>alert('Question $u[0] failed!')</script>";
echo $msg;

}else{
$msg="<script type='text/javascript'>alert('Question $u[0] is now $slet!')</script>";
echo $msg;

}
}


}

}
else{
$msg="<script type='text/javascript'>alert('No action was selected!')</script>";
echo $msg;

}
}
?>

					</p>





</body>
</html>
