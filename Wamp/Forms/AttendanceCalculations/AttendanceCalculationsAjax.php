
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
		$("#calculateAttendance").click(function() {
			var Department = $("#cmbDepartment").val();
			//var HiddenID = $("#HiddenID").val();
			
			var dataString = 'Insert_cmbDepartment='+ Department;
			
			// if(Department==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the department');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtDepartment').focus(); 
			// }else{	
			alert('lll')
				$.ajax({
					type: "POST",
					url: "AttendanceCalculationsProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#calculateAttendanceProcess").html(html);
						
						// document.getElementById('txtDepartment').value='';
						// document.getElementById('HiddenID').value='';
						// document.getElementById('txtDepartment').focus();
						
					}
				});
			//}
			return false;
	    });
	});
	</script>