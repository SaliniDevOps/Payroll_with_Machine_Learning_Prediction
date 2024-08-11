<?php
// Database connection
require_once("../../Connection/dbconnecting.php");

// Fetch budgeted and actual labor costs data
$budgetQuery = "
    SELECT ProjectID, SUM(BudgetedCost) as TotalBudgetedCost
    FROM budgeted_labor_costs
    GROUP BY ProjectID
";
$budgetResult = $db_handle->runQuery($budgetQuery);

$actualQuery = "
    SELECT ProjectID, SUM(ActualCost) as TotalActualCost
    FROM actual_labor_costs
    GROUP BY ProjectID
";
$actualResult = $db_handle->runQuery($actualQuery);

// Prepare data for Chart.js
$projects = [];
$budgetedCosts = [];
$actualCosts = [];

if (!empty($budgetResult)) {
    foreach ($budgetResult as $row) {
        $projects[] = $row['ProjectID'];
        $budgetedCosts[] = $row['TotalBudgetedCost'];
    }
}

if (!empty($actualResult)) {
    foreach ($actualResult as $row) {
        $index = array_search($row['ProjectID'], $projects);
        if ($index !== false) {
            $actualCosts[$index] = $row['TotalActualCost'];
        } else {
            $projects[] = $row['ProjectID'];
            $budgetedCosts[] = 0; // No budgeted cost entry for this project
            $actualCosts[] = $row['TotalActualCost'];
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Labor Cost Comparison</title>
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
        <h1>Labor Cost Comparison</h1>
        <canvas id="laborCostChart" width="400" height="200"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('laborCostChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($projects); ?>,
                datasets: [
                    {
                        label: 'Budgeted Cost',
                        data: <?php echo json_encode($budgetedCosts); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Actual Cost',
                        data: <?php echo json_encode($actualCosts); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Real-Time Labor Cost vs. Budgeted Labor Cost',
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
                            text: 'Project ID'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Cost'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
