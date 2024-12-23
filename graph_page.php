<?php
// Database connection
$host = 'localhost';
$user = 'root'; 
$password = '';  
$dbname = 'visitor_expenditure';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT component, year_2010, year_2011 FROM expenditure";
$result = $conn->query($sql);

// Prepare data for the charts
$components = [];
$data2010 = [];
$data2011 = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $components[] = $row['component'];
        $data2010[] = $row['year_2010'];
        $data2011[] = $row['year_2011'];
    }
} else {
    echo "No data found in the database.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Expenditure Graphs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Visitor Expenditure Graphs (2010 vs 2011)</h1>
    <canvas id="barChart" width="800" height="400"></canvas>
    <canvas id="lineChart" width="800" height="400"></canvas>

    <script>
        // Data from PHP
        const labels = <?php echo json_encode($components); ?>;
        const data2010 = <?php echo json_encode($data2010); ?>;
        const data2011 = <?php echo json_encode($data2011); ?>;

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '2010',
                        data: data2010,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: '2011',
                        data: data2011,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Visitor Expenditure Comparison (Bar Chart)'
                    }
                }
            }
        });

        // Line Chart
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '2010',
                        data: data2010,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: '2011',
                        data: data2011,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        fill: false,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Visitor Expenditure Comparison (Line Chart)'
                    }
                }
            }
        });
    </script>
</body>
</html>
