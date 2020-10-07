<?php

require_once("config.php");
$sele = "SELECT * FROM exams_scores ;
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);
if($num == 0){

echo "No record found in the database";

}
else{
?>




<?php

}
?>
