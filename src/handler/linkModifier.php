<?php

class ProcessLink {
    private $actualLink;
    
    function encryptLink($link){
        return base64_encode($link);
       // echo "<div class='result-item' data-url='redirect.php?redirect=" . htmlspecialchars($encodedUrl, ENT_QUOTES, 'UTF-8') . "'>Product Name</div>";

    }

} 


?>