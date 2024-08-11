<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<?php include('../../Include/headerlinks.php');  
	//include('ViewEmployeeAjax.php');
	?>
	
	
	
	<style>
	body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: #fff;
    height: 100vh;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar-logo {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar-logo img {
    width: 150px;
}

.sidebar nav ul {
    list-style-type: none;
    padding: 0;
}

.sidebar nav ul li {
    margin: 20px 0;
}

.sidebar nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.sidebar nav ul li a:hover,
.sidebar nav ul li a.active {
    text-decoration: underline;
}

.main-content {
    flex: 1;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #eaeaea;
}

header h1 {
    font-size: 24px;
    color: #2c3e50;
}

.search-bar input {
    width: 300px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

main {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px 0;
}

section {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #eaeaea;
    border-radius: 4px;
    flex: 1 1 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
}

section h2 {
    font-size: 18px;
    color: #2c3e50;
    margin-bottom: 10px;
}

.upcoming-payroll .payroll-details {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.upcoming-payroll button {
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.upcoming-payroll button:hover {
    background-color: #2980b9;
}

.payroll-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 20px;
}

.top-todos ul,
.grow-your-business ul {
    list-style-type: none;
    padding: 0;
}

.top-todos li,
.grow-your-business li {
    padding: 10px;
    border-bottom: 1px solid #eaeaea;
}

.chart {
    height: 200px;
    background-color: #ecf0f1;
    margin-bottom: 20px;
}

.payroll-amount span {
    font-size: 16px;
    color: #2c3e50;
}

.calendar-details {
    height: 200px;
    background-color: #ecf0f1;
}


/*   Predic Labor Cost Button */
.button-64 {
  align-items: center;
  background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 3px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
}

.button-64:active,
.button-64:hover {
  outline: 0;
}

.button-64 span {
  background-color: rgb(5, 6, 45);
  padding: 16px 24px;
  border-radius: 6px;
  width: 100%;
  height: 100%;
  transition: 300ms;
}

.button-64:hover span {
  background: none;
}

@media (min-width: 768px) {
  .button-64 {
    font-size: 24px;
    min-width: 196px;
  }
}

	</style>
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <?php include('../../Include/sidebar.php'); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            
            <?php include('../../Include/header.php'); ?>    

			<div class="main-content">
            <header>
                <!--h1>Good morning, Alex</h1-->
				<!-- HTML -->
				<a href="../PredictLaborCost/PredictLaborCost.php">
					<button class="button-64" role="button">
						<span class="text">Predict Labor Cost</span>
					</button>
				</a>

                <div class="search-bar">
                    <input type="text" placeholder="How can we help today?">
                </div>
            </header>
            <main>
                <section class="upcoming-payroll">
                    <h2>Upcoming payroll</h2>
                    <div class="payroll-details">
                        <span>Weekly</span>
                        <span>Check date: 11/21/2020</span>
                        <span>Pay period: 11/13 - 11/19</span>
                        <button>Run payroll</button>
                    </div>
                    <div class="payroll-actions">
                        <button>New off-cycle payroll</button>
                        <button>Calculate paychecks</button>
                    </div>
                </section>
                <section class="top-todos">
                    <h2>Top to-dos</h2>
                    <ul>
                        <li>Outstanding timesheet for Sam Smith</li>
                        <li>Add the social security number for Meredith de Silva</li>
                    </ul>
                </section>
                <section class="grow-your-business">
                    <h2>Grow your business</h2>
                    <ul>
                        <li>HR</li>
                        <li>Time Tracking</li>
                        <li>Insurance Services</li>
                    </ul>
                </section>
                <section class="recent-payroll">
                    <h2>Recent payroll</h2>
                    <div class="chart">
                        <!-- Add chart here -->
                    </div>
                    <div class="payroll-amount">
                        <span>Biweekly: $12,958.47</span>
                    </div>
                </section>
                <section class="calendar">
                    <h2>Calendar</h2>
                    <div class="calendar-details">
                        <!-- Add calendar here -->
                    </div>
                </section>
            </main>
        </div>            
              
            <!-- Breadcome start-->
            <!--div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Search..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Project List</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            
			<?php include('../../Include/menuarea.php'); ?>
            
            <!-- stockprice, feed area end-->
            <!--div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>View Form</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                       


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
        </div>
    </div>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
