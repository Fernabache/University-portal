<?php
require_once("config_ms.php");
$cmd = "SELECT DISTINCT(course_title) FROM course ORDER BY course_title";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$et = $row['course_title'];

echo "<option value='$et' class='optn'>";
echo $et . " Examination";
echo "</option>";
}

}
else{
echo "<option class='optn'>";
echo "No teacher available";
echo "</option>";

}


?>