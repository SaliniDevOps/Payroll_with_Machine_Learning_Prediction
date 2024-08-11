<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
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

	</style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="logo.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Payroll</a></li>
                    <li><a href="#">People</a></li>
                    <li><a href="#">HR</a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Tasks</a></li>
                    <li><a href="#">Time</a></li>
                    <li><a href="#">Insurance</a></li>
                    <li><a href="#">Apps</a></li>
                    <li><a href="#">Tools</a></li>
                </ul>
            </nav>
        </aside>
        <div class="main-content">
            <header>
                <h1>Good morning, Alex</h1>
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
    </div>
</body>
</html>
