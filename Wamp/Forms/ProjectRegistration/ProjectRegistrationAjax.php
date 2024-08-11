<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
        $("#addProject").click(function() {
            var projectID = $("#projectID").val();
            var projectName = $("#projectName").val();
            var projectManager = $("#projectManager").val();
            var workers = $("#workers").val();
            var distance = $("#distance").val();

            var dataString = 'projectID='+ projectID + '&projectName='+ projectName + '&projectManager='+ projectManager + '&workers='+ workers + '&distance='+ distance;
			alert(dataString)
            if(projectID == '' || projectName == '' || projectManager == '' || workers == '' || distance == ''){
                $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>All fields are required!');
                $(".alertWarning").fadeIn().delay(2000).fadeOut();
            }else{
                $.ajax({
                    type: "POST",
                    url: "ProjectRegistrationProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html){
                        $("#projectList").html(html);
                        $("#projectForm")[0].reset();
                        $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Project added successfully!');
                        $(".alertSave").fadeIn().delay(2000).fadeOut();
                    }
                });
            }
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