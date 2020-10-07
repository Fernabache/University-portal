
<?php
include("header.php");
?>

<div class="allocated">
<fieldset class="wow"><legend class="abili">QUESTIONS UPLOADING SYSTEM(CSV FORMAT ONLY)</legend> 

    				<form action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">

    								<p align="left" style="margin-left:9%;"><input required="required" type="file" name="file" id="" class=""/></p>
    							<center>
    								<input type="text" name="cat" placeholder="Enter Course Code" required="required" style="width:500px;height:50px;padding:5px;"/>
							
								<select name="session[]" id='selectt' class="select">
								
    						<?php require("sessions.php");?>
    						
    						</select>
    						
							
							
								<select name="semester[]" id='selectt' required="required" class="select">
    						<option value="First Semester">First Semester</option>
    						<option value="Second Semester" selected="selected" >Second Semester</option>
    						</select>
							<input type="submit" value="Upload Data"  class="btncr" name="Import"/>
    						</center>
    						
    					
    				</form>
					</fieldset>
					</div>

</div>


<style type='text/css'>
select {
	width:500px;
	height:50px;
	}
option{
	padding:10px;
	
	}
	.gh{
		padding:10px;
		
		}

</style>




</body>
</html>
