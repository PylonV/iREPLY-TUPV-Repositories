<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Link to your custom app.css -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="dashboard-header">
        <div class="dashboard-title">
            Dashboard
        </div>
        <div class="header-buttons">
            <a href="/profile" class="button">Profile</a>
            <a href="/" class="button">Logout</a>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="welcome-message">
            <h2>Welcome, User!</h2>
            <p>This is your personalized dashboard. Here you can find an overview of your activities and important information.</p>
        </div>

        <div class="dashboard-cards-container">
            <div class="dashboard-card">
                <h3>Recent Activity</h3>
                <ul>
                    <li>Task A completed on 2025-07-15</li>
                    <li>New message from Admin on 2025-07-14</li>
                    <li>Report generated on 2025-07-13</li>
                </ul>
            </div>

            <div class="dashboard-card">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#" class="card-link">Manage Settings</a></li>
                    <li><a href="#" class="card-link">View Reports</a></li>
                    <li><a href="#" class="card-link">Contact Support</a></li>
                </ul>
            </div>

            <div class="dashboard-card">
                <h3>Notifications</h3>
                <p>You have 3 unread notifications.</p>
                <button class="view-all-button">View All</button>
            </div>
        </div>

        <div class="dashboard-footer">
            <p>&copy; 2025 IREPLY. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
