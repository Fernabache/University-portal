    <?php
    include 'db.php';
    if(isset($_POST["Import"])){
	
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
		$sem = strtoupper($semester);
	
		$cat = $_POST["cat"];
		$exam_type = "General";
		$token = sha1(rand(123 ,536377).uniqid());
     
     $tab = "
CREATE TABLE IF NOT EXISTS questions(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
paper_type TEXT NOT NULL,
categories TEXT NOT NULL ,
exam_type TEXT NOT NULL ,
question TEXT NOT NULL ,
f_option TEXT NOT NULL ,
s_option TEXT NOT NULL ,
t_option TEXT NOT NULL ,
ft_option TEXT NOT NULL ,
answer TEXT NOT NULL ,
session TEXT NOT NULL,
semester TEXT NOT NULL,
examiner TEXT NOT NULL ,
approval_status Varchar(255) DEFAULT 'pending',
ip_address TEXT NOT NULL ,
OS TEXT NOT NULL ,
browser TEXT NOT NULL ,
date_time DATETIME NOT NULL ,
token TEXT NOT NULL 
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
					
					//sanitizedata
					
						
					foreach( $emapData as $key =>$value )
					{
						$emapData[$key] = $value;
					}
					
					//**start checking file conformance	   
				
					 
					 
				if(empty($emapData[0])){
				
				continue;
				
				}	 
					 
					 
                   $p = $emapData[1];
                   
				
                   
                
                   
                   
                   $paper_type = strtolower($p);
                   
                   
							$valid_paper = array("s","o");
							if( ! in_array( $paper_type , $valid_paper ) )
							{
								echo "<script type=\"text/javascript\">
								alert(\"Error: You entered '{$paper_type}' as paper type for question number #$counter. Only '". implode( $valid_paper , ', ' ) ."' are valid paper type.\");
								window.location = \"question_upload.php\"
								</script>";
								exit();
							}
                   
                   
                   //1. PAPER TYPE CONFORMANCE
						//ALL SUBJECTIVES HAVE ()
						//NO OBJECTIVE HAS ()*
						//ALL OBJECTIVES HAVE ALL 4 ANSWERS*
						//ALL OBJECTIVES HAVE A SINGLE ALPHABETS (a-d) AS ANSWERS*
						 
						
                   //2. TOTAL OF 4 OPTIONS*
                   //3. ANSWER REPRESENTED*
                   //4. 

					switch( $paper_type )
					{
						
						//check for emptiness
						case "":
						{
							echo "<script type=\"text/javascript\">
							alert(\"Error: Missing paper type in question #$counter!.\");
							window.location = \"question_upload.php\"
							</script>";
							exit();
						}
						break;
						
						//check objectives
						case "o":
						{
							
							if
							(
							 
								empty( $emapData[2] )
							|| 	empty( $emapData[3] )
							|| 	empty( $emapData[4] )
							|| 	empty( $emapData[5] )
							
							)
							{							
								echo "<script type=\"text/javascript\">
									alert(\"Error: Please fill all the options for question number #$counter!.\");
									window.location = \"question_upload.php\"
									</script>";
									exit();
							}
							
							
							//check for () in objective questions
							
							
							
							//check for empty answer
							
								if( empty( $emapData[6] ))
							{
								echo "<script type=\"text/javascript\">
								alert(\"Error: You did not enter the correct option for question number #$counter which is an objective question.\");
								window.location = \"question_upload.php\"
								</script>";
								exit();
							}
							
							//check answer
							$valid_options = array("a","b","c","d");
							if( ! in_array($emapData[6] , $valid_options ) )
							{
								echo "<script type=\"text/javascript\">
								alert(\"Error: You entered '{$emapData[6]}' as correct option for question number #$counter. Only '". implode( $valid_options , ', ' ) ."' are valid options.\");
								window.location = \"question_upload.php\"
								</script>";
								exit();
							}
						}
						break;
						
						//check subjectives
						case "s":
						{
							//confirm question format conformance
							//1. confirm type
					
								if( strchr($emapData[0] , "()") == FALSE )
							{
								
								echo "<script type=\"text/javascript\">
									alert(\"Error: You indicated question number #$counter as a subjective question type. Use '()' to indicate the space to fill in the question.\");
									window.location = \"question_upload.php\"
									</script>";
									exit();
							}
							//2.confirm just one gap
							$controlstring = "@#$";
							$replacements = 0;
							$question_ = str_replace( "()" , $controlstring , $emapData[0] , $replacements );
							
							if( $replacements > 5 )
							{
								echo "<script type=\"text/javascript\">
									alert(\"Error: You cannot have more than five fill in gap in question number #$counter.\");
									window.location = \"question_upload.php\"
									</script>";
									exit();
							}
							
							
							//check options
							if
							(
							 !
								(empty( $emapData[2])
							&& 	empty( $emapData[3] )
							&& 	empty( $emapData[4] )
							&& 	empty( $emapData[5] ))
							
							)
							{							
								echo "<script type=\"text/javascript\">
									alert(\"Error: You entered options for question number #$counter which is a subjective question type. Only the answer column is required for subjective question types.\");
									window.location = \"question_upload.php\"
									</script>";
									exit();
							}
							
							
														
							//check answer
							if( empty( $emapData[6] ))
							{
								echo "<script type=\"text/javascript\">
								alert(\"Error: You did not enter the correct option for question number #$counter.\");
								window.location = \"question_upload.php\"
								</script>";
								exit();
							}
						}
						break;
						
						
					}

			   
                   
                   
				
				//**finished checking file conformance	   
					   
					   
				//adapt for database
				                   
                   if(($p == "O") || ($p == "o")){
					 $y = $emapData[0];
					 
                   $ques = str_replace("()" , "......." ,$y);
					   
					   $de = "objective";
					   
					   }
					   elseif(($p == "S") || ($p == "s")){
					$y = $emapData[0];
					$r = "<input type=\"text\" name=\"ans[]\"/>";
                   $ques = str_replace("()" , $r ,$y);
						   $de = "subjective";
						   }
						   else{
							   
							   
							   }
							   
							   
							   	   
                   $que = chk($ques);
				   $fp = chk($emapData[2]);
				   $sp = chk($emapData[3]);
				   $tp = chk($emapData[4]);
				   $frp = chk($emapData[5]);
				   $fifp = chk($emapData[6]);
                   
                   $selr = "SELECT * FROM questions WHERE question='$que' AND paper_type='$de' AND categories='$cat' AND session='$session' AND semester='$semester'";
                   $rty = mysql_query($selr);
                   $nummt = mysql_num_rows($rty);
                   if(!$rty){
					   echo "<script type=\"text/javascript\">
    							alert(\"Failed to select\");
    							window.location = \"question_upload.php\"
    						</script>";
					   exit();
					   }
                   
                   
                   
                   
                   if($nummt == 1){
					   
					   continue;
					   
					   }
				
				   
                   
    	           $sql = "INSERT INTO questions (question , paper_type ,categories , exam_type , f_option , s_option , t_option ,ft_option , answer  , session , semester, approval_status , token ,date_time) 
    	            	values('$que','$de','$cat','$exam_type','$fp','$sp','$tp','$frp','$fifp' , '$session' , '$semester' , 'pending' ,'$token' , now())";
    	         
    	          $result = mysql_query( $sql, $conn );
    				if(! $result )
    				{
    					echo "<script type=\"text/javascript\">
    							alert(\"Invalid File:Please Upload CSV File.\");
    							window.location = \"question_upload.php\"
    						</script>";
     
    				}
     
    	         }
    	         fclose($file);
    	         $tr = mysql_affected_rows();
    	         echo "<script type=\"text/javascript\">
    						alert(\"CSV File has been successfully Imported .\");
    						window.location = \"question_upload.php\"
    					</script>";
     
                 
    			 //close of connection
    			mysql_close($conn); 
     
     
     
    		 }
    	}	 
		else{
		 echo "<script type=\"text/javascript\">
    						alert(\"Parameter missing!.\");
    						window.location = \"question_upload.php\"
    					</script>";
		
		}
    ?>		
