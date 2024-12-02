<!-- <?php 
// require_once(ROOT_PATH .'\src\products\crudProd.php');
// require_once('allUsersCount.php');

// $userAll = new Users();
// $result = $userAll->read();
// $summa = new DatabaseSummary();
// $res = $summa->userSummary();

// // Count user by PHP
// $totalUserByMonth = [];
// foreach ($res as $user) {
//     //Extract the month from the DateCreated
//     $month = date('Y-m', strtotime($user['DateCreated']));
    
//     if (isset($totalUserByMonth[$month])) {
//         $totalUserByMonth[$month]++;
//     } else {
//         $totalUserByMonth[$month] = 1;
//     }
// }

// Convert the PHP array to JSON
//$totalUserByMonthJson = json_encode($res);
?>

<script>
    // Parse the PHP JSON into JavaScript
    var totalUserByMonth = JSON.parse('<?= $totalUserByMonthJson ?>');

    const labels = Object.keys(totalUserByMonthJson);
    const data = {
        labels: labels,
        datasets: [{
            label: 'Number of Users by Month',
            data: Object.values(totalUserByMonthJson),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const userChartConfig = {
        type: 'line',
        data: data,
    };

    // Initialize the chart
    const userChartCtx = document.getElementById('userChart').getContext('2d'); 
    new Chart(userChartCtx, userChartConfig);
</script> -->

<?php 
require_once(ROOT_PATH .'\src\products\crudProd.php');
require_once('allUsersCount.php');

$summa = new DatabaseSummary();
$res = $summa->userSummary();
$user1 = $summa->executeQuery($summa->userRoleStatusSummary());

// Convert the PHP array to JSON
$totalUserByMonthJson = json_encode($res);
?>

<script>
    // Parse the PHP JSON into JavaScript
    var totalUserByMonth = JSON.parse('<?= $totalUserByMonthJson; ?>');

    // Prepare labels and data arrays
    const labels = totalUserByMonth.map(item => item.Month); // Extract the months as labels
    const dataPoints = totalUserByMonth.map(item => item.NumberOfUsers); // Extract the counts as data

    const data = {
        labels: labels,
        datasets: [{
            label: 'Number of Users by Month',
            data: dataPoints,
            fill: false,
            borderColor: 'rgb(75, 192, 90)',
            tension: 0.1
        }]
    };

    const userChartConfig = {
        type: 'line',
        data: data,
    };

    window.addEventListener('load', () => {
        const userChartCtx = document.getElementById('userChart').getContext('2d'); 
        new Chart(userChartCtx, userChartConfig);
    });
</script>
