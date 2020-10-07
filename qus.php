<?php include("header.php");?>
      
        <fieldset class="wow"><legend  class="abili">Questions Uploading System(CSV FORMAT ONLY)</legend>
    				<form action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">

    								<p align="left" style="margin-left:9%;margin-bottom:10px"><input type="file" name="file" id="" class=""/></p>
    							
    								<p > <input type="text" name="cat" placeholder="Enter Course Code" style="width:500px;height:50px;padding:5px;"/></p>
							<p style="margin-top:10px"> 
								<select name="session[]" class="freo">
    						<?php require("sessions.php");?>
    						</select>
    						</p>
							<p> 
							<select name="semester[]" class="freo">
    						<option value="First Semester">First Semester</option>
    						<option value="Second Semester" selected="selected" >Second Semester</option>
    						</select>
    						</p>
    					<input type="submit" value="Upload Data" class="btncr" name="Import"/>
    				</form></fieldset>
        
    	</body>
    </html>
