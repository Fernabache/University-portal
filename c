<?php
require_once("config.php");
$cmd = "SELECT * FROM admin_register";
$query = mysql_query($cmd);
$num = mysql_num_rows($query);
if($num != 0){
while($row = mysql_fetch_array($query)){
$user = $row['username'];
$level = $row['level'];
echo "<option value='$user'>";
echo $user ." ($level)";
echo "</option>";
}

}
else{
echo "No users";

}


?>
