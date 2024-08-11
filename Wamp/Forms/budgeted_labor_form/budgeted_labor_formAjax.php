<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
		$("#addBudget").click(function() {
			var ProjectID = $("#ProjectID").val();
			var budgetedCost = $("#budgetedCost").val();
			var budgetDate = $("#budgetDate").val();
			var HiddenID = $("#HiddenID").val();
			
			var dataString = 'Insert_ProjectID='+ ProjectID + '&budgetedCost='+ budgetedCost+ '&budgetDate='+ budgetDate+ '&HiddenID='+ HiddenID;
			alert(dataString)
			// if(Department==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the department');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtDepartment').focus(); 
			// }else{	
			
				$.ajax({
					type: "POST",
					url: "budgeted_labor_formProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#Insert_Department").html(html);
						
						// document.getElementById('txtDepartment').value='';
						// document.getElementById('HiddenID').value='';
						// document.getElementById('txtDepartment').focus();
						// window.location.reload();
						
					}
				});
			//}
			return false;
	    });
	});
	</script>
	

<script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('button.Update').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "DateTypeUpdate.php",
					data:'Row_ID_update='+Row_ID,
						success:function(html){
						$('#Row_ID_update').html(html);
						
						var type_ID = $("#type_ID_t").val();
						document.getElementById('txtDepartment').focus();	 
						document.getElementById('txtDepartment').value=type_ID;
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


<script type="text/javascript">
    $(document).ready(function () {
    $("button.Delete").click(function () {
        var element = $(this);
        var del_id = element.attr("id");
        
       
        
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                type: "POST",
                url: "DateTypeDelete.php",
                data: { id: del_id }, // Use object literal for data
                success: function (response) {
                    // Assuming 'response' is the HTML you want to display
                    $("#displaydelete").html(response); // Directly set HTML
                    
                    alert("Item deleted successfully.");
					document.getElementById('txtDepartment').value='';
					document.getElementById('HiddenID').value='';
					document.getElementById('txtDepartment').focus();
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