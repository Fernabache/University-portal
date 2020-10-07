<?php
include("header.php");
?>



<fieldset class="wow"><legend class="abili"> Browser Based Authentication</legend> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">


<p><input type="text" name="br" placeholder="Enter your Browser name" required style="width:500px;height:50px;padding:5px;"/></p>
<p><input type="text" name="vers" placeholder="Enter your browser version" required style="width:500px;height:50px;padding:5px;"/></p>
<input type="hidden" value="<?php echo sha1(rand(123,89273982));?>" name="browser_auth"/>
<input type="submit" name="submitted" value="Submit Data" class="btncr"/>
</form>
<div class="pen">
<?php
if(isset($_POST['browser_auth'])){
	
	function data($chk){
		$chk = @trim($chk);
		if(get_magic_quotes_gpc()){
			
			$chk = stripslashes($chk);
			
			}
			
			return mysql_real_escape_string($chk);
		
		}
	
require_once("config.php");
$br = data($_POST['br']);
$vers = data($_POST['vers']);



	
	
$tab = "CREATE TABLE IF NOT EXISTS br_auth (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
br_name TEXT NOT NULL,
br_ver TEXT NOT NULL,
status TEXT NOT NULL,
time_stamp DATETIME NOT NULL

)";
$re = mysql_query($tab);
if(!$re){
	echo "failed to create table!! ";
	exit();
	}

$sele = "SELECT * FROM br_auth WHERE br_name='$br'";
$quy = mysql_query($sele);
if(!$quy){
	echo "failed select ";
	
	}
$num = mysql_num_rows($quy);

if($num == 1){
	echo "The browser already exists!";
	
	}
	else{
		
		$up = "INSERT INTO br_auth (br_name, br_ver , status , time_stamp) VALUES('$br' ,'$vers' , 'enabled' ,now())";
		$query = mysql_query($up);
		if($query){
			 echo "Browser updated";
			
			}
			else{
				echo "failed to update query!!";
				
				}
		
		
		}


	
	
	

		
			}
			else{
				echo "";
				
				}
?>
</div>
</fieldset>




</div>

</body>
</html>
