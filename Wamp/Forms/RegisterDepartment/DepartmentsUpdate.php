<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$Departments='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `departments` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$Departments=$rowDep1["Departments"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="type_ID_t" name="type_ID_t" value="<?php echo $Departments;?>" class="field-divided20"  />
		<?php
	}
	
?>
