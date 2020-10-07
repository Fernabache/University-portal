<?php
include("header.php");
?>

<div class="allocated">

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
		.imgl{
		width:60%;
		}

</style>
<fieldset class="wow"><legend class="abili">QUESTIONS APPROVAL SYSTEM (RANDOMIZER)</legend> 
<center>
<img src="image/upm.png" onclick="parent.location='multitask.php'" class="imgl"/>
</center>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<table cellpadding="2px" cellspacing="6px">
<tr>

<td>
<select name="publish[]" required="required" class="select" id="selectt">
<option value="approved">Grant Questions</option>
<option value="pending">Revoke Questions</option>
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
<select name="sub[]" required="required"  class="select" id="selectt">
<?php
include("cat.php");
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
<input type="text" name="numb" placeholder="ENTER NUMBER OF QUESTIONS" maxlength="3" style="width:500px;height:50px;padding:5px;"/>
</td>
</tr>




<tr>

<td>
<input type="hidden" name="exams_type_sub_rand" value="superadmingrantingaccess"/>
<input type="submit" class="btncr"/>
</td>
</tr>
</table>
</form>

					</fieldset>
					<p style="margin:2%;text-align:centre;">
					
<?php
if(isset($_POST['exams_type_sub_rand']) && !empty($_POST['exams_type_sub_rand'])){
require_once("config.php");
function santi($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
$numb = santi($_POST["numb"]);




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

$sub = "";
if(isset($_POST['sub'])){
foreach($_POST['sub'] as $key ){
$sub = $key;
}

}

	   $session = "";
     if(isset($_POST['session'])){
		 foreach($_POST['session'] as $key){
			 $session = $key;
			 
			 }
		 
		 }
		 
		 
       $semester = "";
     if(isset($_POST['semester'])){
		 foreach($_POST['semester'] as $key){
			 $semester = $key;
			 
			 }
		 
		 }	


if( $slet == 'approved'){
	
	
	if(empty($_POST["numb"])){
$msg="<script type='text/javascript'>alert('Please enter the number of questions you want to randomly approve!')</script>";
echo $msg;
}
elseif(!is_numeric($_POST["numb"])){
$msg="<script type='text/javascript'>alert('Please enter a valid number!')</script>";
echo $msg;
}

else{
	
$h = "SELECT * FROM questions WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$sub' AND approval_status='approved' ";
$j = mysql_query($h);

if(!$j){
	$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
    echo $msg;
	
	}else{
		
		$ru = mysql_num_rows($j);
		if($ru > 0){ 
				$msg="<script type='text/javascript'>alert('This course $sub was approved before!')</script>";
    echo $msg;
			
			}else{
				
$command = "UPDATE questions SET approval_status = '$slet' WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$sub' AND approval_status='pending' ORDER BY RAND() LIMIT $numb ";


$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Questions categoried under $cat that are $sub subject(s) is now $slet')</script>";
echo $msg;
}

				
				}
		
		}

}

}
else{
$h = "SELECT * FROM questions WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$sub' AND approval_status='approved' ";
$j = mysql_query($h);

if(!$j){
	$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
    echo $msg;
	
	}else{
		
		$ru = mysql_num_rows($j);
		if($ru == 0){
		$msg="<script type='text/javascript'>alert('This course $sub was not approved before!')</script>";
        echo $msg;
			}
			else{
				
$command = "UPDATE questions SET approval_status = '$slet' WHERE session='$session' AND semester='$semester' AND exam_type ='$cat' AND categories='$sub' AND approval_status='approved'";


$exec = mysql_query($command);
if(!$exec){
$msg="<script type='text/javascript'>alert('Query failed!!')</script>";
echo $msg;
}
else{
$msg="<script type='text/javascript'>alert('Questions categoried under $cat that are $sub subject(s) is now $slet')</script>";
echo $msg;
}

				
				}
		
		
		}
	}



}
?>

					</p>
					</div>

</div>






</body>
</html>
