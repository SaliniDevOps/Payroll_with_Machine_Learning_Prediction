<?php 

include('LoginJavaScript.php');
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Login Employee</title>

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <link href="../../Forms/css/style_employee.css" rel="stylesheet" />
  <link href="../css/responsive.css" rel="stylesheet" />
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  
  <style>
 .logo-container {
    display: flex;
    align-items: center;
}

.icon {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.blue-square {
    width: 64px;
    height: 64px;
    border: 6px solid white; /* Blue border */
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.red-line {
    width: 6px;
    height: 40px;
    background-color: #E74C3C; /* Red line */
    position: absolute;
    transform: rotate(135deg);
}

.ComName {
    font-size: 24px;
    font-weight: bold;
    color: #fff;
}

.ComName .red {
    color: red;
}

button {
    width: 100%;
    padding: 10px;
    background-color: red;
	
    border: none;
    border-radius: 5px;
    cursor: pointer;
	height:50px;
}

button:hover {
    background-color: #b3cccc;
}

#error-message {
    color: red;
    margin-top: 10px;
}

  
  
  </style>
  
  
   
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 450px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
      }

    </style>
  
  
  
  
  
</head>

<body>
	<div class="hero_area">
		<!-- header section strats -->
		<header class="header_section">
			<div class="container-fluid">
				<nav class="navbar navbar-expand-lg custom_nav-container pt-3">
					<a class="navbar-brand" href="index.html">
						<span>
							<div class="logo-container">
								<div class="icon">
									<div class="blue-square">
										<div class="red-line"></div>
									</div>
								</div>
								<div class="ComName">
									<b>B A <span class="red">D</span>  R<br> Contracting & Trading W.L.L</b>
								</div>
							</div>
						</span>
					</a>
				</nav>
			</div>
		</header>
	</div>
	
	<div id="LoginMethod"></div>
	<div class="background"></div>
	
    <form id="form1" name="form1" method="post" autocomplete="off" action="">
        <h3>Login Here</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" name="username" required>
        <div class="textalert1" style="display:none; color:red; "><span>Please Enter the Spare Part Model <span></div>
		
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required>
        <div class="textalert2" style="display:none; color:red;">Please Enter the Spare Part Model </div>
		
        <button type="button" id="Add_Button">Login</button>
    </form>
 

	<!-- footer section -->
	<section class="container-fluid footer_section">
		<p>
			&copy; 2024 All Rights Reserved By
			<a href="https://html.design/">H G S M GUNATHILAKA, BCAS</a>
		</p>
	</section>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  

	</body>

</html>

