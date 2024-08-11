<script>
   //load heder1 & load details to table when click FirstName
    $(document).ready(function(){
	    $('a[class="TradeName_link"]').click(function(){
		    var EmployeeID = $(this).attr("id");
			var ItemCodecustid = 'Itemcode';
			var dataString = 'ItemCodecustid='+ ItemCodecustid+'&EmployeeID='+ EmployeeID;
			if(EmployeeID=='' ){
			}
			else{
				
				$.ajax({
					type: "POST",
					url: "Forms/esDayOff/esEmpDayOffProcess.php",
					data: dataString,
					cache: false,
						success: function(html){
							$("#ItemCodecustid").html(html);
							document.getElementById('txtCode').value=EmployeeID;
						}
					}); 
			}
			return false;
		
		});
	});
</script>
<?php   
     //open connection
  require_once("../../Connection/dbconnecting.php");
  
	
	$FirstName='';
	$EmployeeID='';
	//load Trade name 
	if(!empty($_POST["Tradname_key"])) 
	{
		if(($_POST["Tradname_key"])!=" "){
			$Tradname_key=$_POST["Tradname_key"];
			$cmbDepartment=$_POST["cmbDepartment"];
			$result1 = $db_handle->runQuery("Select EmployeeCode,FirstName from `employees` Where DepartmentID ='$cmbDepartment' AND `FirstName` LIKE '$Tradname_key%' LIMIT 10");	
			?>
			<ul>
				<?php
				if(!empty($result1)){
					foreach ($result1 as $rowDep1) {
						$EmployeeID=$rowDep1["EmployeeCode"];
						$FirstName=$rowDep1["FirstName"];	
						?>
						<a href="#" class="TradeName_link" id="<?php echo $EmployeeID;?>"><li onClick="selectname('<?php echo $EmployeeID;?>','<?php echo $FirstName;?>');"><?php echo $EmployeeID;?></li></a>
						<?php
					}
				}
				else{
						?>
						<a href="#" class="TradeName_link" id="<?php echo $EmployeeID;?>"><li onClick="selectname('<?php echo $EmployeeID;?>','<?php echo $FirstName;?>');">Not Match</li></a>
						<?php
				}
				?>
			</ul>
			<?php   
		}
		else{
			$Tradname_key=$_POST["Tradname_key"];
			$cmbDepartment=$_POST["cmbDepartment"];
			$result1 = $db_handle->runQuery("Select EmployeeCode,FirstName from `employees` WHERE DepartmentID ='$cmbDepartment' ORDER BY `FirstName` desc LIMIT 10");	
			?>
			<ul>
				<?php
				if(!empty($result1)){
					foreach ($result1 as $rowDep1) {
						$EmployeeID=$rowDep1["EmployeeCode"];
						$FirstName=$rowDep1["FirstName"];	
						?>
						<a href="#" class="TradeName_link" id="<?php echo $EmployeeID;?>"><li onClick="selectname('<?php echo $EmployeeID;?>','<?php echo $FirstName;?>');"><?php echo $EmployeeID;?></li></a>
						<?php
					}
				}else{
						?>
						<a href="#" class="TradeName_link" id="<?php echo $EmployeeID;?>"><li onClick="selectname('<?php echo $EmployeeID;?>','<?php echo $FirstName;?>');">Not Match</li></a>
						<?php
				}
				?>
			</ul>
			<?php   
		}
	}

	
?>