<title>DashBoard</title>
<?php
require_once dirname('../../config.php') . '\config.php';
require_once(ROOT_PATH .'\assets\header.php');
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
        <h3>Showing All Users by Month</h3>
        <div class="chart-users">
            <canvas id="userChart"></canvas>
        </div>
    </div>
    
    <?php
        require_once('dashboardProcess.php')
    ?>

    <div>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "user_data.php",
                "columns": [
                    { "data": "EcoId" },
                    { "data": "Name" },
                    { "data": "email" },
                    { "data": "DateCreated" }
                ]
            });
        });
    </script>


</body>
</html>