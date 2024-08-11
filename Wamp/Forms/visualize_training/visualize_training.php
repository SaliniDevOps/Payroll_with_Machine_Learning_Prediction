<?php
// Database connection
require_once("../../Connection/dbconnecting.php");

// Define the number of days before expiration to consider as "near expiration"
$daysBeforeExpiration = 30;

// Fetch certificates that are near expiration or expired
$query = "
    SELECT tc.*, e.FirstName, e.LastName 
    FROM `training_certificates` tc
    JOIN `employee` e ON tc.EmployeeID = e.EmployeeID
    WHERE tc.ExpirationDate <= CURDATE() + INTERVAL $daysBeforeExpiration DAY
    ORDER BY `ExpirationDate` ASC
";
$result = $db_handle->runQuery($query);

// Prepare data for Chart.js
$expiringCertificates = [];
$expiredCertificates = [];
$currentDate = new DateTime();

if (!empty($result)) {
    foreach ($result as $row) {
        $expirationDate = new DateTime($row['ExpirationDate']);
        $interval = $currentDate->diff($expirationDate);
        $daysToExpiration = $interval->days;

        if ($currentDate > $expirationDate) {
            // Expired certificates
            $expiredCertificates[] = [
                'name' => $row['FirstName'] . ' ' . $row['LastName'],
                'training' => $row['TrainingName'],
                'provider' => $row['TrainingProvider'],
                'expiration' => $row['ExpirationDate']
            ];
        } else {
            // Near expiration certificates
            $expiringCertificates[] = [
                'name' => $row['FirstName'] . ' ' . $row['LastName'],
                'training' => $row['TrainingName'],
                'provider' => $row['TrainingProvider'],
                'expiration' => $row['ExpirationDate']
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Training Certificates Expiration Dashboard</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        canvas {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Training Certificates Expiration Dashboard</h1>
        <h2>Expiring Certificates (Next 30 Days)</h2>
        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Training Name</th>
                    <th>Training Provider</th>
                    <th>Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($expiringCertificates)) {
                    foreach ($expiringCertificates as $certificate) {
                        echo '<tr>
                            <td>' . $certificate['name'] . '</td>
                            <td>' . $certificate['training'] . '</td>
                            <td>' . $certificate['provider'] . '</td>
                            <td>' . $certificate['expiration'] . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" style="text-align:center;">No expiring certificates found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        
        <h2>Expired Certificates</h2>
        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Training Name</th>
                    <th>Training Provider</th>
                    <th>Expiration Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($expiredCertificates)) {
                    foreach ($expiredCertificates as $certificate) {
                        echo '<tr>
                            <td>' . $certificate['name'] . '</td>
                            <td>' . $certificate['training'] . '</td>
                            <td>' . $certificate['provider'] . '</td>
                            <td>' . $certificate['expiration'] . '</td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" style="text-align:center;">No expired certificates found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        
        <canvas id="expirationChart" width="400" height="200"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('expirationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Expiring Certificates', 'Expired Certificates'],
                datasets: [{
                    label: 'Number of Certificates',
                    data: [<?php echo count($expiringCertificates); ?>, <?php echo count($expiredCertificates); ?>],
                    backgroundColor: ['rgba(255, 205, 86, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(255, 205, 86, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Certificates Expiration Status',
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
                            text: 'Status'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Number of Certificates'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
