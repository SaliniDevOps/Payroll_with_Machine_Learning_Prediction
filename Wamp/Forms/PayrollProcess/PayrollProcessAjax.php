
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
		$("#PayrollBTN").click(function() {
			var HiddenValue = $("#HiddenValue").val();
			//var HiddenID = $("#HiddenID").val();
			
			var dataString = 'Insert_PayrollBTN='+ HiddenValue;
			
			// if(Department==''){
				// $(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the department');
				// $(".textalert1").fadeIn().delay(2000).fadeOut();
				// document.getElementById('txtDepartment').focus(); 
			// }else{	
			alert('lll')
				$.ajax({
					type: "POST",
					url: "PayrollProcess.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("#PayrollProcess_Details").html(html);
						
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
	
	
	
	
	
<script type="text/javascript">
    $(function() {
        $("#PaySlipGenerate").click(function() {
            var HiddenValue = $("#HiddenValue").val();
            var dataString = 'ShowPaySlip=' + HiddenValue;
			alert(dataString)
            $.ajax({
                type: "POST",
                url: "PayrollReport.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    $("#PayrollPaySlip_Details").html(html);
                }
            });
            return false;
        });
    });
</script>
