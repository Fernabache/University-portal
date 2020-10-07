$(document).ready(function(){
	$(":radio.dd").click(function(){
		$(".btncr").attr("value","Add Matric Number");
		$(".ip").attr("required","required");
		});
	
	
		$(":radio.re").click(function(){
		$(".btncr").attr("value","Update Data");
		$(".ip").attr("required","required");
		});
		
		$(":radio.deler").click(function(){
		$(".btncr").attr("value","Delete Matric Number");
		$(".ip").removeAttr("required","");
		});
		
		$("#retu").click(function(){
			
			$(".ertre").show("slow");
			$(".allocated").hide("slow");
			
			})
			
			
				$("#retue").click(function(){
			
			$(".ertre").hide("slow");
			$(".allocated").show("slow");
			
			})
		
	});

