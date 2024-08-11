<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
		$("#Add_Button").click(function() {
			var Designations = $("#txtDesignations").val();
			var HiddenID = $("#HiddenID").val();
			
			var dataString = 'Insert_HiddenID='+ HiddenID + '&Designations='+ Designations;
			
			if(Designations==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the designation');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('txtDesignations').focus(); 
			}else{	
			
				$.ajax({
					type: "POST",
					url: "DesignationsProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#Insert_Designation").html(html);
						
						document.getElementById('txtDesignations').value='';
						document.getElementById('HiddenID').value='';
						document.getElementById('txtDesignations').focus();
						
					}
				});
			}
			return false;
	    });
	});
	</script>
	
<!--script type="text/javascript">
    $(document).ready(function () {
  
		$("button.Delete").click(function () {
			var element = $(this);
			var del_id = element.attr("id");

			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "DesignationsDelete.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
						$("#displaydelete").html($(html)); // Treat response as jQuery object
						alert("a")
						document.getElementById('txtDesignations').value='';
						document.getElementById('HiddenID').value='';
						document.getElementById('txtDesignations').focus();
				 
					},
				});
				$(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				.animate({ opacity:"hide"},"slow");
			}
		});
	});
</script-->
<script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('button.Update').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "DesignationsUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var type_ID = $("#type_ID_t").val();
						document.getElementById('txtDesignations').focus();	 
						document.getElementById('txtDesignations').value=type_ID;
						document.getElementById('HiddenID').value=Row_ID;
						
							
						//const input=document.getElementById('txtDays');
						input.focus();
						input.select();
						
					}
				}); 
			}else{
				$('#link_ShowData').html('<input type="text" value="g" >');
				$('#city').html('<input type="text" value="e" >'); 
			}
		});   
	});	
</script>

 <!--script type="text/javascript">
    $(document).ready(function () {
  
		$(".delete").click(function () {
			var element = $(this);
			var del_id = element.attr("id");
			alert(del_id)
			if (confirm("Are you sure you want to delete this?")) {
				$.ajax({
					type: "POST",
					url: "DesignationsDelete.php",
					data: { id: del_id }, // Use object literal for data
					success: function (html) {
						$("#displaydelete").html($(html)); // Treat response as jQuery object
					
						alert("a")
				 
					},
				});
				// $(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				// .animate({ opacity:"hide"},"slow");
			}
		});
	});
</script-->
<script>
$(document).ready(function () {
    $("button.Delete").click(function () {
        var element = $(this);
        var del_id = element.attr("id");
        
        
        
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                type: "POST",
                url: "DesignationsDelete.php",
                data: { id: del_id }, // Use object literal for data
                success: function (response) {
                    // Assuming 'response' is the HTML you want to display
                    $("#displaydelete").html(response); // Directly set HTML
                    
                    alert("Item deleted successfully.");
					document.getElementById('txtDesignations').value='';
					document.getElementById('HiddenID').value='';
					document.getElementById('txtDesignations').focus();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    alert("Error deleting item.");
                }
            });

            // Assuming '#show' is a class to select multiple elements
           $(this).parents("#show").animate({ backgroundColor:"#003"},"slow")
				.animate({ opacity:"hide"},"slow");
        }
    });
});
</script>