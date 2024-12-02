<?php
// Sample data array (replace with database query in a real application)
$data = ["Apple", "Banana", "Cherry", "Date", "Elderberry", "Fig", "Grape"];

$query = isset($_GET['q']) ? strtolower($_GET['q']) : '';

$results = array_filter($data, function($item) use ($query) {
    return strpos(strtolower($item), $query) !== false;
});

foreach ($results as $result) {
    echo "<div>" . htmlspecialchars($result) . "</div>";
}
?>
