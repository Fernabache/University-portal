<?php
require("config.php");
$select = "SELECT DISTINCT(subject) FROM attendance_multiple";
$ert = mysql_query($select);
if(!$ert){
	echo "Unable to select from database table!" ;
	}
	else{
		$mun = mysql_num_rows($ert);
		if($mun == 0){
			echo "<option value=''>No subject found</option>";
			
			}
			else{
				while($row = mysql_fetch_array($ert)){
					$sub = $row["subject"];
				echo "<option value='$sub'>$sub</option>";
			}
				
				}
		}

?>
