<?php
if(isset($_GET["q"])){
require_once("config.php");

$qu = $_GET["q"];

$select = "SELECT * FROM subject_pin WHERE subject='$qu'";
$tyu = mysql_query($select);
if(!$tyu){
$msg = "<option value=''>Failed to select</option>";
echo $msg;
}
else{
?>
<select name='matric[]' class='freo'>
<?php
while($row = mysql_fetch_array($tyu)){
$id = $row["id"];
$alloc = $row["allocated_question"];
$msg = "<option value='$alloc'>$alloc questions</option>";
echo $msg;
}
?>
</select>
<?php
}

}

?>