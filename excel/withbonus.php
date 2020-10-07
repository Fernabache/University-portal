	
	<?php
	
	echo "<table cellpadding='10px'id='tableID' cellspacing='10px' border='1px'><tr><td>Matric</td><td>Name</td><td>CA(/15)</td><td>Exam(/35)</td><td>CA(/30)</td><td>Exam(/70)</td><td>ToScore(/50)</td><td>ToScore(/100)</td><td>Grade</td></tr>";
 while($row = mysql_fetch_array($mysql)){

	 $mat = $row["matric"];
	  $name = $row["name"];

	    $sel = "SELECT * FROM course WHERE type='exam' AND matric='$mat' AND course_title = '$type'";
	    $mr = mysql_query($sel);
	    if(!$mr){
			echo "failed to select!";
			exit;
			}
	    $tt = mysql_fetch_assoc($mr);
	    $e_score = $tt["score"];
	    $ee_score = ($tt["score"]*2);
	  
	  	    $seler = "SELECT * FROM course WHERE type='test' AND matric='$mat' AND course_title = '$type'";
	    $mrr = mysql_query($seler);
	    if(!$mrr){
			echo "failed to select!";
			exit;
			}
	    $ttt = mysql_fetch_assoc($mrr);
	    $t_score = $ttt["score"];
	    $tt_score = ($ttt["score"]*2);
	 
	    $sum = $e_score + $t_score;
	     $summ = $ee_score + $tt_score;
	     
         require("bonus.php");
	     
	     
	     if(($summ >= 70) && ($summ <= 100)){
			 
			 $grade = "A";
			 
			 }
			 elseif(($summ >= 60) && ($summ < 70)){
				 
				 
				 $grade = "B";
				 
				 }
				 elseif(($summ >= 50) && ($summ < 60)){
					 
					 $grade = "C";
					 
					 }
					  elseif(($summ >= 45) && ($summ < 50)){
					 
					 $grade = "D";
					 
					 }
					  else{
					 
					 $grade = "F";
					 
					 }
	  
	  
	 echo "<tr><td>$mat</td><td>$name</td><td>$t_score</td><td>$e_score</td><td>$tt_score</td><td>$ee_score</td><td>$sum</td><td>$summ</td><td>$grade</td></tr>";
	 }
	 echo "</table>";
?>
