<?php
// Database connection
require_once("../../Connection/dbconnecting.php");

// Fetch daily emissions data
$query = "
    SELECT Date, SUM(Emmision) as TotalEmission
    FROM vehicledailyusage
    GROUP BY Date
    ORDER BY Date ASC
";
$result = $db_handle->runQuery($query);

// Prepare data for Chart.js
$dates = [];
$emissions = [];

if (!empty($result)) {
    foreach ($result as $row) {
        $dates[] = $row['Date'];
        $emissions[] = $row['TotalEmission'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Carbon Emissions</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        canvas {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daily Carbon Emissions</h1>
        <canvas id="emissionsChart" width="400" height="200"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('emissionsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Daily Carbon Emissions (kg CO2)',
                    data: <?php echo json_encode($emissions); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Daily Carbon Emissions Over Time',
                        font: {
                            size: 20
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Emissions (kg CO2)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
