<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<p>
<select name="chg[]" style="width:400px;padding:5px;">
<option value="">Check Questions</option>
<option value="delete">Delete Questions</option>
<option value="pending">Revoke Questions</option>
<option value="approved">Approve Questions</option>
</select>
<style>
option{padding:5px;}
</style>
</p>
<p>
<textarea cols="" rows="" name="subject" style="resize:none;width:400px;height:200px;" ></textarea>
</p>
<p>
<input type="submit" name="check_subject" style="width:400px;padding:5px;" value="check data"/>
</p>
</form>

<?php
if(isset($_POST["check_subject"])){

function chk($val){
$val = @trim($val);

if(get_magic_quotes_gpc()){
$val = stripslashes($val);
}
return mysql_real_escape_string($val);



}

$subject = chk($_POST["subject"]);

$chg = "";
if(isset($_POST['chg'])){

foreach($_POST['chg'] as $key ){
$chg = $key;

}

}

if($chg == "pending"){
$ti = explode("," , $subject);

$counter = count($ti);
$i = 0;
for($i;$i<$counter;$i++){
$update = "UPDATE questions SET approval_status='pending' WHERE categories='$ti[$i]'";
$myup = mysql_query($update);
if($myup){
$msg = "<script>alert('$ti[$i] is on pending!')</script>";
echo $msg;

}else{

$msg = "<script>alert('$ti[$i] is failed!')</script>";
echo $msg;
}

}
exit();
}


if($chg == "delete"){
$ti = explode("," , $subject);

$counter = count($ti);
$i = 0;
for($i;$i<$counter;$i++){
$update = "DELETE FROM questions WHERE categories='$ti[$i]'";
$myup = mysql_query($update);
if($myup){
$msg = "<script>alert('$ti[$i] is on pending!')</script>";
echo $msg;
}
else{
$msg = "<script>alert('$ti[$i] is failed!')</script>";
echo $msg;
}

}
exit();
}



?>
<table cellpadding='10px' cellspacing='1px' border='1px'>
<tr><th>SUBJECT</th><th>PENDING</th><th>APPROVED</th><th>TOTAL QUESTIONS</th></tr>

<?php


require_once("config.php");

?>
<?php

$ti = explode("," , $subject);

$counter = count($ti);
$i = 0;
for($i;$i<$counter;$i++){

$select ="SELECT * FROM questions WHERE categories='$ti[$i]' AND approval_status='pending'";
$sel = mysql_query($select);
$yum = mysql_num_rows($sel);

$select ="SELECT * FROM questions WHERE categories='$ti[$i]' AND approval_status='approved'";
$sel = mysql_query($select);
$yummer = mysql_num_rows($sel);



$select ="SELECT * FROM questions WHERE categories='$ti[$i]'";
$sel = mysql_query($select);
if($sel){
$mysql_num = mysql_num_rows($sel);

if($mysql_num != 0){


echo "
<tr><td>$ti[$i]</td><td>$yum</td><td>$yummer</td><td>$mysql_num</td></tr>";
}
else{

$msg = "<script>alert('Subject $ti[$i] not found in the database!')</script>";
echo $msg;



}

?>

<?php

}
else{
$msg = "<script>alert('Failed to select questions from database!')</script>";
echo $msg;
}
?>

<?php
}
}
?>
</table>
<?php

?>