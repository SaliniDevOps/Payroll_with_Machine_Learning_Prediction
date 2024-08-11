 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
		$("#Add_Button").click(function() {
			var cmbDepartment = $("#cmbDepartment").val();
			var QID = $("#QID").val();
			var email = $("#email").val(); 
			var basicSalary = $("#basicSalary").val();
			var employeeCode = $("#employeeCode").val();  
			var Gender = $("#Gender").val();  
			var designation = $("#designation").val();  
			var mobileNmber = $("#mobileNmber").val();  
			var firstName = $("#firstName").val();  
			var Status = $("#Status").val();  
			var address = $("#address").val();  
			var lastName = $("#lastName").val();  
			var HiddenID = $("#HiddenID").val();
			var birthDate = $("#birthDate").val();
			var joinedDate = $("#joinedDate").val();
			
			
			
		
			var dataString = 'Insert_cmbDepartment='+ cmbDepartment + '&QID='+ QID+ '&email='+ email+ '&basicSalary='+ basicSalary+ '&employeeCode='+ employeeCode
			+ '&Gender='+ Gender+ '&designation='+ designation+ '&mobileNmber='+ mobileNmber+ '&firstName='+ firstName+ '&Status='+ Status+ '&address='+ address 
			+ '&lastName='+ lastName+ '&HiddenID='+ HiddenID+ '&birthDate='+ birthDate+ '&joinedDate='+ joinedDate; 
			//alert(dataString)		
			// if(cmbDepartment==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select the Service Type');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('cmbDepartment').focus(); 
				
			// }else if (SparePartName ==''){
				// $(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Name');
				// $(".textalert2").fadeIn().delay(2000).fadeOut();
				// document.getElementById('cmbServiceType').focus(); 
			// }else if (ItemCode ==''){
				// $(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Name');
				// $(".textalert3").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtItemCode').focus(); 
			// }else if (Price ==''){
				// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Item Price');
				// $(".textalert4").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtItemCode').focus(); 
			// }
			// else{
			
				$.ajax({
					type: "POST",
					url: "RegisterEmployeeProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#Insert_Employee").html(html);
						// document.getElementById('txtServiceTypeID').value='';
						// document.getElementById('txtServiceType').value='';
						// document.getElementById('txtItemCode').value='';
						// document.getElementById('txtItemPrice').value='';
						// document.getElementById('cmbServiceType').value='';
						// document.getElementById('cmbServiceType').focus();
						
						
					}
				});
			//}
			return false;
	    });
	});
	</script>