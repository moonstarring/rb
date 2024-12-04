<?php
        require_once 'includes/owner-header-sidebar.php';
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>RentBox Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .main-content {
            margin-left: 260px; /* Adjust to match the sidebar width */
            padding: 80px 20px; /* Ensure header spacing with top padding */
            background: #f8f9fa;
            min-height: 100vh; /* Ensure the content spans full height */
        }
        .header {
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        }
    </style>
</head>
<body>

    <div class="main-content">
        <div class="container">
            <h2 class="mb-4">Dashboard</h2>
            
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
                    <h5>Avg. Income Per Transaction</h5>
                    <h2>₱210.21</h2>
                    <p class="text-success">+3.16% From last month</p>
                </div>
                <div class="card">
                    <h5>Monthly Income</h5>
                    <h2>₱65,720.18</h2>
                    <p class="text-success">+3.16% From last month</p>
                </div>
            </div>

            <div class="chart-container">
                <h4>Rental Income Overtime</h4>
                <!-- Placeholder for charts -->
                <canvas id="incomeChart"></canvas>
            </div>

            <div class="chart-container mt-5">
                <h4>User Growth</h4>
                <!-- Placeholder for user growth chart -->
                <canvas id="userGrowthChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Example chart configurations
        const ctxIncome = document.getElementById('incomeChart').getContext('2d');
        new Chart(ctxIncome, {
            type: 'line',
            data: {
                labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue',
                    data: [5000, 10000, 15000, 20000, 15000, 10000, 5000],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            }
        });

        const ctxUserGrowth = document.getElementById('userGrowthChart').getContext('2d');
        new Chart(ctxUserGrowth, {
            type: 'line',
            data: {
                labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'User Growth',
                    data: [1000, 2000, 4000, 8000, 9000, 10000, 12000],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2
                }]
            }
        });
    </script>
</body>
</html>