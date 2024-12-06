<link rel="stylesheet" href="../../assets/css/library.css">
<?php
require_once ('./../../config.php');
require_once(ROOT_PATH .'\src\products\crudProd.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id='prods'>

</div>
<div class="content"> <div id="pagination">
     <!-- Pagination controls --> 
    </div> 
</div>

<div id="pagination-control">
    
</div>   

<script>
    $(document).ready(function() {

        function loadProducts(page) {
                $.ajax({
                    type: 'GET',
                    url: '/project/BSIT2102-EcoSustainable-Product-Marketplace/src/products/libraryProduct.php',
                    data: { 
                        /* search : productSearch, */
                        page: page 
                    },
                    success: function(response) {
                        $('#prods').html(response);
                    },
                    error: function(xhr, status, error) { 
                        console.error('Failed to Fetch Data: ' + error); 
                    }
                });
        };
    });

    $(document).on('click', '.pagination-btn', function() { 
        const page = $(this).data('page'); 
        loadProducts('page');
    });
</script>

<script>
    $(document).ready(function() {
    const totalPages = 10; // Example total pages, you can set this dynamically

    // Function to create pagination buttons
    function createPagination(totalPages) {
        let paginationHtml = '';

        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<button class="pagination-btn" data-page="${i}">${i}</button>`;
        }

        $('#pagination').html(paginationHtml);
    }

    // Event listener for pagination buttons
    $(document).on('click', '.pagination-btn', function() {
        const page = $(this).data('page');
        console.log('Selected page:', page);
        loadProducts(page);
        // Add your page loading logic here
    });

    // Create pagination buttons
    createPagination(totalPages);
    loadProducts(1);
});
</script>