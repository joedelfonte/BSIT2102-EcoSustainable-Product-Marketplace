<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search with AJAX</title>
    <link rel="stylesheet" href="assets/css/search.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Type to search...">
        <div id="search-results"></div>
    </div>

    <script>
        /* script.js */
$(document).ready(function() {
    $('#search-input').on('input', function() {
        const query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: 'search.php', // URL to your PHP search script
                method: 'GET',
                data: { search: query },
                success: function(response) {
                    displayResults(response);
                }
            });
        } else {
            $('#search-results').hide();
        }
    });

    function displayResults(results) {
        const resultsDiv = $('#search-results');
        resultsDiv.empty();
        results.forEach(result => {
            const item = $(`<div class="result-item">${result}</div>`);
            item.on('click', function() {
                $('#search-input').val(result); // Fill search input with the clicked result
                $('#search-results').hide(); // Optionally hide the results
                // You can add a redirect here if needed
                // window.location.href = `/path/to/${result.toLowerCase()}.php`;
            });
            resultsDiv.append(item);
        });
        resultsDiv.show();
    }
});


    </script>

</body>
</html>
