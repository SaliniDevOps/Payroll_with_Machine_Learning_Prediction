 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(function() {
		$("#Add_Button").click(function() {
			var username = $("#username").val();
			var password = $("#password").val();
			
			var dataString = 'Insert_username='+ username + '&password='+ password; 
			
			if(username==''){
				$(".textalert1").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Username');
				$(".textalert1").fadeIn().delay(2000).fadeOut();
				document.getElementById('username').focus(); 
			}else if(password==''){
				$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Enter the Password');
				$(".textalert2").fadeIn().delay(2000).fadeOut();
				document.getElementById('password').focus(); 
			} else{
			
				$.ajax({
					type: "POST",
					url: "login.php",
					data: dataString,
					cache: false,
					success: function(response){

						$("#LoginMethod").html(response);
						
						var HiddenSuccess_T = $("#HiddenSuccess_T").val();
						//alert(HiddenSuccess_T)
						if(HiddenSuccess_T=='1'){
							window.location.href = '../Home/home.php';
						}
						else{
							$(".textalert2").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Invalid Username or Password!');
							$(".textalert2").fadeIn().delay(2000).fadeOut();
							document.getElementById('username').value='';
							document.getElementById('password').value='';
							document.getElementById('username').focus();
						}
						
					
						
					}
				});
			}	
			
			
			return false;
	    });
	});
	</script>