<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph: Domestic Visitor Expenditure</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Domestic Visitors and Tourists Expenditure (2010 & 2011)</h1>
    <canvas id="barChart" width="800" height="400"></canvas>
    <canvas id="lineChart" width="800" height="400"></canvas>

    <script>
        // Data for the charts
        const data2010Visitors = [8914, 8098, 7975, 6130, 894, 2667]; // Visitors (2010)
        const data2011Visitors = [13149, 10019, 9691, 5028, 1097, 3362]; // Visitors (2011)
        const data2010Tourists = [2603, 6220, 6448, 6096, 595, 1722]; // Tourists (2010)
        const data2011Tourists = [3801, 7417, 7756, 4985, 801, 2249]; // Tourists (2011)
        const labels = ['Shopping', 'Transport', 'Food & Beverages', 'Accommodation', 'Packages/Fees', 'Other Activities'];

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Visitors 2010',
                        data: data2010Visitors,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Visitors 2011',
                        data: data2011Visitors,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Tourists 2010',
                        data: data2010Tourists,
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Tourists 2011',
                        data: data2011Tourists,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
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
                        text: 'Expenditure Comparison (Bar Chart)'
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
                        label: 'Visitors 2010',
                        data: data2010Visitors,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Visitors 2011',
                        data: data2011Visitors,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Tourists 2010',
                        data: data2010Tourists,
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Tourists 2011',
                        data: data2011Tourists,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
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
                        text: 'Expenditure Comparison (Line Chart)'
                    }
                }
            }
        });
    </script>
</body>
</html>
