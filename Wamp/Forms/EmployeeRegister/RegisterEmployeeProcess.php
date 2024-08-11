<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$ServiceType='';
	
	
	if(isset($_POST["Insert_cmbDepartment"]))
	{
	    //Get variable
		$cmbDepartment=$_POST["Insert_cmbDepartment"];
		$QID=$_POST["QID"];
		$email=$_POST["email"];
		$basicSalary=$_POST["basicSalary"];
		$employeeCode=$_POST["employeeCode"];
		$Gender=$_POST["Gender"];
		$designation=$_POST["designation"];
		$mobileNmber=$_POST["mobileNmber"];
		$firstName=$_POST["firstName"];
		$Status=$_POST["Status"];
		$address=$_POST["address"];
		$lastName=$_POST["lastName"];
		$HiddenID=$_POST["HiddenID"];
		$birthDate=$_POST["birthDate"];
		$joinedDate=$_POST["joinedDate"];
		
		
		 // Handle file upload
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["photo"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["photo"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["photo"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if (empty($HiddenID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `employee` WHERE `FirstName`='$firstName' OR `EmployeeCode`='$employeeCode'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					// $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					// $(".alertWarning").fadeIn().delay(2000).fadeOut();
					alert("Duplicate Record!")
				</script>
				<?php
			}else{
				 $photoPath = $target_file; // Path to the uploaded photo
				$result = $db_handle->insertQuery("INSERT INTO `employee` ( `EmployeeCode`, `FirstName`, `LastName`, `DepartmentID`, `DesignationID`, 
				`Gender`, `Email`, `Address`, `MobileNumber`, `BirthDate`, `JoinedDate`, `Status`, `BasicSalary`, `PhotoPath`) 
				Values('$employeeCode','$firstName','$lastName','$cmbDepartment','$designation','$Gender','$email','$address','$mobileNmber','$birthDate',
				'$joinedDate','$Status','$basicSalary', '$photoPath')");
           
				?>
				<script>
					// $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					// $(".alertSave").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtServiceType').value='';
					// document.getElementById('txtServiceType').focus();
					alert("Save Successfully!")
				</script>
				<?php
			}
			
		}
	}	
		
		