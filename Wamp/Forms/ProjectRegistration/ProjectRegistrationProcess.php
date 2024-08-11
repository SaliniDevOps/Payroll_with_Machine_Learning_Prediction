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
    echo '===<br>'.$projectID = $_POST["projectID"];
   echo '===<br>'. $projectName = $_POST["projectName"];
    echo '===<br>'.$projectManager = $_POST["projectManager"];
    echo '===<br>'.$workers = $_POST["workers"];
    echo '===<br>'.$distance = $_POST["distance"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `projectregistration` WHERE `projectID`='$projectID'");
    if($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        // Insert new record
        $result = $db_handle->insertQuery("INSERT INTO `projectregistration` (`projectID`, `projectName`, `projectManager`, `workers`, `distance`)
		VALUES ('$projectID', '$projectName', '$projectManager', '$workers', '$distance')");
        if($result) {
            echo '<script>
                $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Project added successfully!");
                $(".alertSave").fadeIn().delay(2000).fadeOut();
            </script>';
        }
    }

    // Fetch updated list of projects
    $queryA = "SELECT * FROM `projectregistration` ORDER BY `projectID` ASC";
    $resultA = $db_handle->runQuery($queryA);
    if(!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">Project ID</th>
                    <th style="text-align:center;">Project Name</th>
                    <th style="text-align:center;">Project Manager</th>
                    <th style="text-align:center;">No of Workers</th>
                    <th style="text-align:center;">Distance</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
           /*echo '<tr>
                <td style="text-align:center;">' . $r['projectID'] . '</td>
                <td style="text-align:center;">' . $r['projectName'] . '</td>
                <td style="text-align:center;">' . $r['projectManager'] . '</td>
                <td style="text-align:center;">' . $r['workers'] . '</td>
                <td style="text-align:center;">' . $r['distance'] . '</td>
            </tr>';
			*/
        }
        echo '</tbody></table>';
    }
}
?>






