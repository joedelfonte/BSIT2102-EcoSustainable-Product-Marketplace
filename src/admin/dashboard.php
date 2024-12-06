<title>DashBoard</title>
<?php
require_once ('./../../config.php');
require_once(ROOT_PATH .'\src\database\database.php');
require_once(ROOT_PATH .'\assets\pageTemplate\header.php');
?>

<!-- Chart Js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- datatable -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

<link rel="stylesheet" href="dash.css">

<body>
    
    <div></div>
    <div class="user-chart">
        <h3>DashBoard</h3>
        <div>
            <div class="chart-users">
                <h4>OverView</h4>
                <canvas id="userChart"></canvas>
            <?php
            if (file_exists('dashboardProcess.php')) {
                require_once('dashboardProcess.php');
            } else {
                echo 'Error Opening Table';
            }
            ?>
            </div>
        </div>
    </div>
    
</body>
</html>