<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
?>
<script type="text/javascript">
    $(document).ready(function () {
    $("button.Delete").click(function () {
        var element = $(this);
        var del_id = element.attr("id");
        
       
        
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                type: "POST",
                url: "DepartmentsDelete.php",
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
<script type="text/javascript">
	
    //Update script
 	$(document).ready(function(){
		$('button.Update').click(function(){
			var Row_ID = $(this).val();
			var Row_ID = $(this).attr("id");
			
			if(Row_ID){
				$.ajax({
					type:'POST',
					url: "DepartmentsUpdate.php",
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

<?php
require_once("../../Connection/dbconnecting.php");

if(isset($_POST["projectID"])) {
    $projectID = $_POST["projectID"];
    $vehicleID = $_POST["vehicleID"];
    $route = $_POST["route"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `vehicledailyusage` WHERE `ProjectID`='$projectID' AND `VehicleID`='$vehicleID' AND `Route`='$route'");
    if($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        $result = $db_handle->insertQuery("INSERT INTO `vehicledailyusage` (`ProjectID`, `VehicleID`, `Route`) 
        VALUES('$projectID', '$vehicleID', '$route')");

        echo '<script>
            $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Transport added successfully!");
            $(".alertSave").fadeIn().delay(2000).fadeOut();
        </script>';
    }
}
?>




