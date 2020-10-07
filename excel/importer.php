    <?php
    include 'db.php';
    if(isset($_POST["Import"])){
		$cat = $_POST["cat"];

     $type = "";
     if(isset($_POST['type'])){
		 foreach($_POST['type'] as $key){
			 $type = $key;
			 
			 }
		 
		 }
		 
		   $session = "";
     if(isset($_POST['session'])){
		 foreach($_POST['session'] as $key){
			 $session = $key;
			 
			 }
		 
		 }
		 
		 
       $semester = "";
     if(isset($_POST['semester'])){
		 foreach($_POST['semester'] as $key){
			 $semester = $key;
			 
			 }
		 
		 }
     
     $tab = "CREATE TABLE IF NOT EXISTS course(
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     matric TEXT NOT NULL,
     name TEXT NOT NULL ,
     course_title TEXT NOT NULL,
     type TEXT NOT NULL,
	 session TEXT NOT NULL,
	 semester TEXT NOT NULL,
     score TEXT NOT NULL,
     date_time TEXT NOT NULL
     
     )";
     
     $query = mysql_query($tab);
     if(!$query){
		 echo "failed to submit";
		 exit();
		 }
				function chk($valh){
						
						$valh = @trim($valh);
						
						if(get_magic_quotes_gpc()){
							
							$valh = stripslashes($valh);
							
							}
							
							return mysql_real_escape_string($valh);
						
						
						}
     
    		$filename=$_FILES["file"]["tmp_name"];
     
     
    		 if($_FILES["file"]["size"] > 0)
    		 {
     
    		  	$file = fopen($filename, "r");
    		  	
    		  	$counter = 0;
    		  	
    	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
    	         {					
					$counter++;
						
					if($counter == 1)
					{									 
						continue;
					}

						$m = $emapData[0];
						$n = $emapData[1];
						$s = $emapData[2];
                          
						  if($n == ""){
						  continue;
						  
						  }
						  
						   if($s == ""){
						  continue;
						  
						  }
						  
						  
                   $selr = "SELECT * FROM course WHERE matric ='$m' AND type='$type' AND course_title='$cat' AND session='$session' AND semester='$semester'";
                   $rty = mysql_query($selr);
                   $nummt = mysql_num_rows($rty);
                   if(!$rty){
					   echo "<script type=\"text/javascript\">
    							alert(\"Failed to select\");
    							window.location = \"index.php\"
    						</script>";
					   exit();
					   }
                   
                   
                   
                   
                   if($nummt == 1){
					   
					   continue;
					   
					   }
                   
                   
    	           $sql = "INSERT into course (matric , name , score ,  course_title , type , session , semester  ,date_time) 
    	            	values('$emapData[0]' , '$emapData[1]' , '$emapData[2]'  , '$cat' , '$type' , '$session' , '$semester' ,now())";
    	         
    	          $result = mysql_query( $sql, $conn );
    				if(! $result )
    				{
    					echo "<script type=\"text/javascript\">
    							alert(\"Invalid File:Please Upload CSV File.\");
    							window.location = \"result_upload.php\"
    						</script>";
     
    				}
     
    	         }
    	         fclose($file);
    	         $tr = mysql_affected_rows();
    	         echo "<script type=\"text/javascript\">
    						alert(\"CSV File has been successfully Imported $tr.\");
    						window.location = \"result_upload.php\"
    					</script>";
     
                 
    			 //close of connection
    			mysql_close($conn); 
     
     
     
    		 }
    	}	 
    ?>		
