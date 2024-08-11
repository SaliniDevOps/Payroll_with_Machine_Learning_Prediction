

<?php

	require_once("../../Connection/dbconnecting.php");
	$LoginSuccess=0;


	if(isset($_POST['Insert_username'])){
		$username=$_POST['Insert_username'];
		$password=$_POST['password'];
		
		echo $queryA="SELECT * FROM `users` WHERE username = '$username' AND password='$password' ";
		$resultA = $db_handle->runQuery($queryA); 
		if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
			$LoginSuccess=1;
		}else{
			$LoginSuccess=0;
		}

		?>
		<input type="text" id="HiddenSuccess_T" value="<?php echo $LoginSuccess; ?>" hidden />
		<?php 
			
	}
?>
