<?php
$command = escapeshellcmd('D:/A BaDR Project/check_minimum_wage.ipynb 2>&1');
$output = shell_exec($command);

// Debugging: Display raw output
echo "<pre>Raw output:\n$output</pre>";

// Decode JSON
$data = json_decode($output, true);

// Check for JSON errors
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "<p>JSON Decode Error: " . json_last_error_msg() . "</p>";
    exit;
}

$status = $data['status'];
$summary = $data['summary'];
$details = $data['details'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Minimum Wage Compliance Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
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
        .status {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }
        .status.non-compliance {
            background-color: #ffcccc;
            color: #cc0000;
        }
        .status.compliance {
            background-color: #ccffcc;
            color: #006600;
        }
        .summary {
            font-size: 16px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-data {
            text-align: center;
            font-size: 16px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Minimum Wage Compliance Report</h1>
        <div class="status <?php echo empty($details) ? 'compliance' : 'non-compliance'; ?>">
            <?php echo htmlspecialchars($status); ?>
        </div>
        <?php if (!empty($summary)) : ?>
            <div class="summary">
                <strong>Summary:</strong>
                <p><?php echo nl2br(htmlspecialchars($summary)); ?></p>
            </div>
        <?php endif; ?>
        <?php if (!empty($details)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Monthly Salary (QAR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($details as $detail) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($detail['FirstName'] . ' ' . $detail['LastName']); ?></td>
                            <td><?php echo htmlspecialchars($detail['MonthlySalary']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="no-data">All employees are paid at or above the minimum wage.</p>
        <?php endif; ?>
    </div>
</body>
</html>
