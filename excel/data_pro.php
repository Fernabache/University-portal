    <?php
    include 'db.php';
    if(isset($_POST["Import"])){
		
     
     
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

						$m = $emapData[1];
                          
                   $selr = "SELECT * FROM register WHERE username ='$m'";
                   $rty = mysql_query($selr);
                   $nummt = mysql_num_rows($rty);
                   if(!$rty){
					   echo "<script type=\"text/javascript\">
    							alert(\"Failed to select\");
    							window.location = \"import_data.php\"
    						</script>";
					   exit();
					   }
                   
                   
                   
                   
                   if($nummt == 1){
					   
					   continue;
					   
					   }
                   
                   
    	           $sql = "INSERT into register (Name , username , Department ,  Admission_No , Gender , Level , BatchName , State , Local_Gov , access  ,date_time) 
    	            	values('$emapData[0]' , '$emapData[1]' , '$emapData[2]'  ,'$emapData[3]' , '$emapData[4]' , '$emapData[5]' ,'$emapData[6]' , '$emapData[7]'  ,'$emapData[8]' , 'granted' ,now())";
    	         
    	          $result = mysql_query( $sql, $conn );
    				if(! $result )
    				{
    					echo "<script type=\"text/javascript\">
    							alert(\"Invalid File:Please Upload CSV File.\");
    							window.location = \"import_data.php\"
    						</script>";
     
    				}
     
    	         }
    	         fclose($file);
    	         $tr = mysql_affected_rows();
    	         echo "<script type=\"text/javascript\">
    						alert(\"CSV File has been successfully Imported $tr.\");
    						window.location = \"import_data.php\"
    					</script>";
     
                 
    			 //close of connection
    			mysql_close($conn); 
     
     
     
    		 }
    	}	 
    ?>		
