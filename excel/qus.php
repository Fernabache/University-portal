    <!DOCTYPE html>
    <?php 
    	include 'db.php';
     
    ?>	
    <html lang="en">
    	<head>
    		<meta charset="utf-8">
    		<title>Alpha-Examz Application</title>
    		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<meta name="description" content="Import Excel File To MySql Database Using php">
        <link rel="stylesheet" href="css/style.css" media="all" type="text/css"/>
     
    	</head>
    	<body>    
        <div align="middle">
        <fieldset class="ggt"><legend class="ftt">Questions Uploading System(CSV FORMAT ONLY)</legend>
    				<form action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">

    								<p align="left"><input type="file" name="file" id="" class=""/></p>
    							
    								<p align="left"> <input type="text" name="cat" placeholder="Enter Course Code" id="" class="wer"/></p>
							<p align="left"> 
								<select name="session[]" class="select">
								
    						<?php require("sessions.php");?>
    						
    						</select>
    						</p>
							
							<p align="left"> 
								<select name="semester[]" class="select">
    						<option value="First Semester">First Semester</option>
    						<option value="Second Semester" selected="selected" >Second Semester</option>
    						</select>
    						</p>
    						
    					<input type="submit" value="Upload Data" class="jk" name="Import"/>
    				</form></fieldset>
        
        </div>
       
    	</body>
    </html>
