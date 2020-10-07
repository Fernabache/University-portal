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
		
        <fieldset class="ggt"><legend class="ftt">C.B.T Examination & CA Generator</legend>
    				<form action="result_gen.php" method="post">

    						<p align="left"> 
								<input type='radio' name='bonus' value='on'/>Activate Bonus Mark
								<input type='radio' name='bonus' checked="checked" value='off'/>Deactivate Bonus Mark
    						</p>
							
								<p align="left"> 
								<select name="session[]" class="select">
								
    						<?php require("sessions.php");?>
    						
    						</select>
    						</p>
							
							<p align="left"> 
								<select name="semester[]" class="select">
    						<option value="First Semester">First Semester</option>
    						<option value="Second Semester" >Second Semester</option>
    						</select>
    						</p>
    						<p align="left"> 
								<select name="type[]" class="select">
    					<?php require("opt.php");?>
    						</select>
    						</p>
    						
    						
    						<p align="left"> 
								<select name="college[]" class="select">
							<option value="">All colleges</option>
    						<option value="LAW">College of LAW</option>
    						<option value="NAS">College of NAS</option>
    						<option value="PHM">College of PHM</option>
    						<option value="HSC">College of HSC</option>
    						<option value="ENG">College of ENG</option>
    						<option value="BMS">College of BMS</option>
    						<option value="ASS">College of ASS</option>
    						
    						</select>
    						</p>
    						
    					<input type="submit" value="Generate Result" class="jk" name="import"/>
    				</form></fieldset>
        
        </div>

    	</body>
    </html>
