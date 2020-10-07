<?php
require_once("config.php");
$select = "SELECT DISTINCT(categories) FROM questions WHERE approval_status='approved'";
$my = mysql_query($select);
$num = mysql_num_rows($my);
if(!$my){
	
	echo "failed to select";
	exit();
	
	}
	else{
	
	if($num == 0){
		
		echo "no subject approved";
		
		}
	else{
		echo "<select name='selector[]' id='selectt'>";
		while($row = mysql_fetch_array($my)){
			$cat = $row["categories"];

			
			$ftw = "<option value='$cat'>$cat</option>";
	        
	        echo $ftw;
		     
			
			}
			echo "</select>";
		
		}
	}
	
?>
<style type='text/css'>
select {
	width:500px;
	}
option{
	padding:10px;
	
	}
	.gh{
		padding:10px;
		
		}

</style>
