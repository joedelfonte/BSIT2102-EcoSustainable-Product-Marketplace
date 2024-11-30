<!DOCTYPE html>
<html>
<head>
    <title>AJAX with PHP Examples</title>
    <script>
        function search() {
            var query = document.getElementById("searchQuery").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "data.php?q=" + query, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("results").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>AJAX with PHP Examplesss</h1>
    <input type="text" id="searchQuery" onkeyup="search()" placeholder="Search...">
    <div id="results"></div>
</body>
</html>
