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

if(isset($_POST["Insert_HiddenID"]))
	{
	    //Get variable
		$HiddenID=$_POST["Insert_HiddenID"];
		$Department=$_POST["Department"];
		
		if (empty($HiddenID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `datetype` WHERE `DateType`='$Department'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDepartment').value='';
					document.getElementById('txtDepartment').focus();
				</script>
				<?php
			}else{
				
				$result = $db_handle->insertQuery("INSERT INTO `datetype` (`DateType`) 
				Values('$Department')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDepartment').value='';
					document.getElementById('txtDepartment').focus();
				</script>
				<?php
			}
			
		}else{
			
			$resultA = $db_handle->runQuery("SELECT * FROM `datetype` WHERE `DateType`='$Department' AND `ID` !='$HiddenID' "); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDepartment').value='';
					document.getElementById('txtDepartment').focus();
				</script>
				<?php
			}else{
				
				$result = $db_handle->updateQuery("UPDATE `datetype` SET `DateType`='$Department' WHERE `ID` ='$HiddenID'");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDepartment').value='';
					document.getElementById('txtDepartment').focus();
				</script>
				<?php
			}
			
		}	
		
		?>
		<table class="table table-bordered" data-search="true">
			<thead>
				<tr>
					<th  style="  text-align:center;">Date Types</th>
					<th  style="  text-align:center;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$queryA = "SELECT * FROM `datetype` ORDER BY `datetype`.`DateType` ASC";
			$resultA = $db_handle->runQuery($queryA); 
			$i=0;
			if(!empty($resultA)){
				foreach ($resultA as $r) {
					$ID=$r['ID'];
			
					
					?>
					<tr id="show">
						<td style ="text-align:left;" id="Departments-<?php echo $ID; ?>"><?php echo $r['DateType']; ?></td>
						<td style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button></div>
						<div class="btn-group project-list-action"><button class="btn btn-white btn-xs Delete" id="<?php echo $ID; ?>"><i class="fa fa-trash"></i></i> Del</button></div></td>
					</tr>
					<?php
				}
				
			}	?>	
			</tbody>
		</table>
		<?PHP 
	}	
		
?>







