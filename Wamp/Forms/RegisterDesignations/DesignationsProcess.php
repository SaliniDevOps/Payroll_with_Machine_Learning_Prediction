<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
?>
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
<?php 

if(isset($_POST["Insert_HiddenID"]))
	{
	    //Get variable
		$HiddenID=$_POST["Insert_HiddenID"];
		$designations=$_POST["Designations"];
		
		if (empty($HiddenID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `designations` WHERE `designations`='$designations'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDesignations').value='';
					document.getElementById('txtDesignations').focus();
				</script>
				<?php
			}else{
				
				$result = $db_handle->insertQuery("INSERT INTO `designations` (`designations`) 
				Values('$designations')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDesignations').value='';
					document.getElementById('txtDesignations').focus();
				</script>
				<?php
			}
			
		}else{
			
			$resultA = $db_handle->runQuery("SELECT * FROM `designations` WHERE `designations`='$designations' AND `ID` !='$HiddenID' "); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDesignations').value='';
					document.getElementById('txtDesignations').focus();
				</script>
				<?php
			}else{
				
				$result = $db_handle->updateQuery("UPDATE `designations` SET `designations`='$designations' WHERE `ID` ='$HiddenID'");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtDesignations').value='';
					document.getElementById('txtDesignations').focus();
				</script>
				<?php
			}
			
		}	
		
		?>
		<table class="table table-bordered" data-search="true">
			<thead>
				<tr>
					<th  style="  text-align:center;">designations</th>
					<th  style="  text-align:center;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$queryA = "SELECT * FROM `designations` ORDER BY `designations`.`designations` ASC";
			$resultA = $db_handle->runQuery($queryA); 
			$i=0;
			if(!empty($resultA)){
				foreach ($resultA as $r) {
					$ID=$r['ID'];
			
					
					?>
					<tr id="show">
						<td style ="text-align:left;" id="designations-<?php echo $ID; ?>"><?php echo $r['designations']; ?></td>
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







