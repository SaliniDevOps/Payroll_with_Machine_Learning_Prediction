<?php 
    //open connection
	require_once("../../Connection/dbconnecting.php");
	
	$typeID='';
	$designations='';
	
	//Row_ID_update
	if(isSet($_POST['Row_ID_update'])){
		
		$typeID=$_POST['Row_ID_update'];
		$query="SELECT * FROM `designations` WHERE ID='$typeID'";
		$result = $db_handle->runQuery($query);
		if(!empty($result)) {
			foreach ($result as $rowDep1) {
			
				$designations=$rowDep1["designations"]; 
		
			}
		}	
		?>
			
		<input type="text" hidden  id="type_ID_t" name="type_ID_t" value="<?php echo $designations;?>" class="field-divided20"  />
		<?php
	}
	
?>
