<?php
if(isset($_POST['id_pin']) && !empty($_POST['id_pin'])){

function datae($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
		
$id = datae($_POST['id_pin']);
require_once("config.php");
$select = "DELETE FROM subject_pin WHERE id='$id'";
$ree = mysql_query($select);

if($ree){
	echo "<p style='letter-spacing:3px;padding:5px'>Selected subject deleted successfully!</p>";
	
	}
	else{	
		echo "<p style='letter-spacing:3px;padding:5px'>Selected subject failed to delete!</p>";
		
		}
}

?>
