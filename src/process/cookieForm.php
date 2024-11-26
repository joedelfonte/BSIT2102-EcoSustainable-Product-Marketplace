

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icons/eco-banner.png" type="image/x-icon">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Cookie banner styles */
        #error-banner {
            display: none;
        }

        .cookie-banner {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f9f9f9;
            border-top: 1px solid #ccc;
            padding: 5px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .cookie-banner p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .cookie-banner a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .cookie-banner a:hover {
            text-decoration: underline;
        }

        .accept-cookies {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .accept-cookies:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <!-- Cookie Notification Banner -->
    <div id="cookie-banner" class="cookie-banner">
        <p>We use cookies to improve your experience on our site. By using our site, you agree to our use of cookies. 
        <a href="/cookie-policy" >Learn more</a></p>
        <form method="POST" style="display:inline;">
            <button type="button" id="accept-Cookies" name="accept-Cookies" class="accept-cookies">Accept</button>
        </form>
    </div>

    <div class="cookie-banner " id="error-banner">
        <p>Cookie Error. Please reload or contact support if the issue persists.
        </p>
    </div>

    <script>
        $(document).ready(function(){
            $('#accept-Cookies').click(function(){
                $.ajax({
                    type: 'POST',
                    url: 'src/process/cookiesProcess.php',
                    data: { 
                        sessiondat: 'inital_session_value',
                    },
                    success: function(response) {
                        try {
                            response = JSON.parse(response);
                            if (response.success == true) {
                                $('#cookie-banner').hide();
                            } else {
                                $('#cookie-banner').hide();
                                $('#error-banner').show();
                                setTimeout(function() { 
                                    $('#error-banner').addClass('hidden'); 
                                }, 1000)
                                console.error('Failed to set cookie: ' + response.message);
                            }
                        } catch (error) {
                            console.error('Failed to parse response: ' + error);
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error('Failed to set cookie: ' + error); 
                    }
                });
            })
        })



      
    </script>


</body>
</html>








