<?php
require_once("config.php");
$level = $_GET['level'];
$sele = "SELECT * FROM register WHERE level='$level'";
$mys = mysql_query($sele);

if(!$mys){
echo "failed to connect to database";
exit;
}
echo "<table cellpadding='5px' cellspacing='5px' border='1px'><tr><td>Name</td><td>Matric Number</td><td>Level</td></tr>";
while($row =mysql_fetch_array($mys)){
$name = $row["Name"];
$level = $row["Level"];
$user = $row['username'];
echo "<tr><td>$name</td><td>$level</td><td>$user</td></tr>";
}
echo "</table>";
?>
