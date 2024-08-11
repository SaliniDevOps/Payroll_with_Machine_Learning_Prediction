 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">

	function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }


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
			var photo = $("#photo")[0].files[0];

        var lenQID = QID.toString().length;
        var lenMobile = mobileNmber.toString().length;

        var formData = new FormData();
        formData.append('Insert_cmbDepartment', cmbDepartment);
        formData.append('QID', QID);
        formData.append('email', email);
        formData.append('basicSalary', basicSalary);
        formData.append('employeeCode', employeeCode);
        formData.append('Gender', Gender);
        formData.append('designation', designation);
        formData.append('mobileNmber', mobileNmber);
        formData.append('firstName', firstName);
        formData.append('Status', Status);
        formData.append('address', address);
        formData.append('lastName', lastName);
        formData.append('HiddenID', HiddenID);
        formData.append('birthDate', birthDate);
        formData.append('joinedDate', joinedDate);
        formData.append('photo', photo);
		
			var dataString = 'Insert_cmbDepartment='+ cmbDepartment + '&QID='+ QID+ '&email='+ email+ '&basicSalary='+ basicSalary+ '&employeeCode='+ employeeCode
			+ '&Gender='+ Gender+ '&designation='+ designation+ '&mobileNmber='+ mobileNmber+ '&firstName='+ firstName+ '&Status='+ Status+ '&address='+ address 
			+ '&lastName='+ lastName+ '&HiddenID='+ HiddenID+ '&birthDate='+ birthDate+ '&joinedDate='+ joinedDate+ '&photo='+ photo; 
			
			//alert(dataString)	
			
			if(cmbDepartment==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select the Service Type');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('cmbDepartment').focus(); 
				
			}
			
			// else if (employeeCode ==''){
				// $(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Employee Code');
				// $(".textalert2").fadeIn().delay(2000).fadeOut();
				// document.getElementById('employeeCode').focus(); 
			// }
			// else if (firstName ==''){
				// $(".textalert3").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the First Name');
				// $(".textalert3").fadeIn().delay(2000).fadeOut();
				// document.getElementById('employeeCode').focus(); 
			// }
			// else if (lastName ==''){
				// $(".textalert4").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Last Name');
				// $(".textalert4").fadeIn().delay(2000).fadeOut();
				// document.getElementById('lastName').focus(); 
			// }
			// else if (QID ==''){
				// $(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the QID');
				// $(".textalert5").fadeIn().delay(2000).fadeOut();
				// document.getElementById('QID').focus(); 
			// }
			// else if(lenQID != 11){
				// $(".textalert5").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid QID');
				// $(".textalert5").fadeIn().delay(2000).fadeOut();
				// document.getElementById('QID').focus(); 
				
			// }
			// else if (Gender ==''){
				// $(".textalert6").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Gender');
				// $(".textalert6").fadeIn().delay(2000).fadeOut();
				// document.getElementById('Gender').focus(); 
			// }
			// else if (Status ==''){
				// $(".textalert7").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Status');
				// $(".textalert7").fadeIn().delay(2000).fadeOut();
				// document.getElementById('Status').focus(); 
			// }
			// else if (birthDate ==''){
				// $(".textalert8").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Birth Date');
				// $(".textalert8").fadeIn().delay(2000).fadeOut();
				// document.getElementById('birthDate').focus(); 
			// }
			// else if (email ==''){
				// $(".textalert9").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter E-Mail');
				// $(".textalert9").fadeIn().delay(2000).fadeOut();
				// document.getElementById('email').focus(); 
			// }
			
			// else if (!validateEmail(email)) {
                // $(".textalert9").fadeIn(100).html('<span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Invalid E-Mail');
                // $(".textalert9").fadeIn().delay(2000).fadeOut();
                // document.getElementById('email').focus();
			// }
			// else if (address ==''){
				// $(".textalert10").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Address');
				// $(".textalert10").fadeIn().delay(2000).fadeOut();
				// document.getElementById('address').focus(); 
			// }
			// else if (joinedDate ==''){
				// $(".textalert11").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Joined Date');
				// $(".textalert11").fadeIn().delay(2000).fadeOut();
				// document.getElementById('joinedDate').focus(); 
			// }
			// else if (basicSalary ==''){
				// $(".textalert12").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Basic Salary');
				// $(".textalert12").fadeIn().delay(2000).fadeOut();
				// document.getElementById('basicSalary').focus(); 
			// }
			// else if (mobileNmber ==''){
				// $(".textalert13").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter Mobile Number');
				// $(".textalert13").fadeIn().delay(2000).fadeOut();
				// document.getElementById('mobileNmber').focus(); 
			// }
			// else if(lenMobile != 10){
				// $(".textalert13").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Mobile Number');
				// $(".textalert13").fadeIn().delay(2000).fadeOut();
				// document.getElementById('mobileNmber').focus(); 
				
			// }
			/*
			// else if(photo == '') {
				// $(".textalert14").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select a Photo');
				// $(".textalert14").fadeIn().delay(2000).fadeOut();
				// document.getElementById('photo').focus();
				// return false;
			// }
			*/
			else{
				alert("a")
				$.ajax({
                type: "POST",
                url: "RegisterEmployeeProcess.php",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(html){
                    $("#Insert_Employee").html(html);
                    //window.location.reload();
                }
            });
			}
			return false;
	    });
	});
	</script>
	
	
	
	
	
	