<?php
    require_once 'includes/owner-header-sidebar.php'; // Includes header and sidebar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Analytics and Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin-left: 260px; /* Matches the sidebar width */
            padding: 80px 20px; /* Adjust padding for header spacing */
            background: #f8f9fa;
            min-height: 100vh;
        }
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            padding: 20px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background: white;
        }
        .chart-container {
            margin-top: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="main-content">
    <div class="container">
        <h2 class="mb-4">Analytics and Reports</h2>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <h5>Total Users</h5>
                <h2>11,834</h2>
                <p class="text-success">25% Increase compared to August</p>
            </div>
            <div class="card">
                <h5>Pending Verifications</h5>
                <h2>32</h2>
                <a href="#" class="text-primary">Review All</a>
            </div>
            <div class="card">
                <h5>Rental Transactions</h5>
                <h2>312</h2>
                <p><span class="text-success">254 Finished</span>, <span class="text-warning">58 Active</span></p>
            </div>
            <div class="card">
                <h5>Monthly Income</h5>
                <h2>₱65,720.18</h2>
                <p class="text-success">+3.16% From last month</p>
            </div>
        </div>

        <!-- Rental Income Chart -->
        <div class="chart-container mt-5">
            <h4>Rental Income Overtime</h4>
            <canvas id="incomeChart"></canvas>
        </div>

        <!-- User Growth Chart -->
        <div class="chart-container mt-5">
            <h4>User Growth</h4>
            <canvas id="userGrowthChart"></canvas>
        </div>

        <!-- Most Popular Gadgets Chart -->
        <div class="chart-container mt-5">
            <h4>Most Popular Gadgets</h4>
            <canvas id="popularGadgetsChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Rental Income Chart
    const incomeChart = document.getElementById('incomeChart').getContext('2d');
    new Chart(incomeChart, {
        type: 'line',
        data: {
            labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue',
                data: [5000, 10000, 15000, 20000, 15000, 10000, 5000],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });

    // User Growth Chart
    const userGrowthChart = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(userGrowthChart, {
        type: 'bar',
        data: {
            labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Users',
                data: [1000, 2000, 3000, 5000, 7000, 9000, 11000],
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });

    // Most Popular Gadgets Chart
    const popularGadgetsChart = document.getElementById('popularGadgetsChart').getContext('2d');
    new Chart(popularGadgetsChart, {
        type: 'pie',
        data: {
            labels: ['Playstation 5', 'Printer', 'Laptop', 'RGB CPU Cooler'],
            datasets: [{
                data: [40, 30, 20, 10],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>
</body>
</html>