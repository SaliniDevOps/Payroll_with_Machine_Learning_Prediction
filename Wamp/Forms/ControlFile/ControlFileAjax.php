 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        $(function() {
            $("#Add_Apply").click(function() {
                var Year = $("#txtYear").val();
                var Month = $("#txtMonth").val();
				var Payroll_Process = $("#txtpayroll").is(":checked") ? 1 : 0;
                var Monthend_Process = $("#txtmonthend").is(":checked") ? 1 : 0;
				
                
                var dataString = 'Insert_Year=' + Year + '&Month=' + Month + '&Payroll_Process=' + Payroll_Process + '&Monthend_Process=' + Monthend_Process;
             

                $.ajax({
                    type: "POST",
                    url: "ControlFileProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html){
                        $("#UpdateControlFile").html(html);
						
						$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Saved Successfully!');
						$(".alertSave").fadeIn().delay(2000).fadeOut();
						
						window.location.reload();
						
                    },
                    // error: function(xhr, status, error) {
                        // console.error("AJAX error: " + status + ' : ' + error);
                    // }
                }); 
                
                return false;
            });
        });
    </script>
	
	
	
	
	
	