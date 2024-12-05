function sanitizeInput(input) {
var element = document.createElement('div');
element.innerText = input;
return element.innerHTML;
}

$(document).ready(function() {
    $('#Search').on('input', function() {
        let keyword = $(this).val();
        keyword = sanitizeInput(keyword);
        if (keyword.length > 0) {
            $.ajax({
                type: 'POST',
                url: 'assets/pageTemplate/searchHandler.php',
                data: { 
                    liveSearch: keyword 
                },
                success: function(response) {
                    $('#search-results').html(response).show();
                },
                error: function(xhr, status, error) { 
                    console.error('Failed to Fetch Data: ' + error); 
                }
            });
        } else {
            $('#search-results').hide().empty();
        }
    });

    $(document).on('click', '.result-item', function() {
        const selectedResult = $(this).text();
        $('#search').val(selectedResult);
        $('#search-results').hide().empty();
    });

    
});

