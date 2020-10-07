<?php
require_once("config.php");
$cmd = "SELECT DISTINCT(subject) FROM exams_scores  ";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
echo "<select name='selec[]' class='freo' id='cui' onchange='result(this.value)'><option value=''>Select course</option>";
while($row = mysql_fetch_array($query)){
$sub = $row['subject'];
echo "<option value='$sub'>";
echo $sub;
echo "</option>";
}

echo "</select>";
}
else{
echo "No subject found?";

}


?>
