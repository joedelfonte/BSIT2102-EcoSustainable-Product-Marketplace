<link rel="stylesheet" href="\project\BSIT2102-EcoSustainable-Product-Marketplace\assets\css\profile.css">
<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
require_once(ROOT_PATH .'\src\database\userCrud.php'); // Include the database connection file

// echo $_SESSION['email'];
// echo $_SESSION['Id'];
try {
    // Create an instance of the Database class and establish a connection
    $db = new Users();
    $user = $db->readAll($_SESSION['Id']);
    if (empty($user) || count($user) > 1){throw new Exception('Invalid Parameters Gather in database');}
    foreach($user as $row){
?>
    <title>User Profile</title>

    <!-- Include SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <div class="profile-container">
        <div class="profile-picture">
            <img src="avatar.jpg" alt="Profile Picture">
        </div>
        <form id="edit-form" method="POST">
            <div class="profile-details">
                <div class="profile-header">
                    <h1>User Profile</h1>
                </div>
                <div class="profile-info">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>
                <div class="profile-info">
                    <label for="nickname">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['nickname']); ?>">
                </div>
                <div class="profile-info">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <!-- <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>" required> -->
                </div>
                <div class="profile-info">
                    <label for="email">Email:</label>
                    <span id="email"><?php echo htmlspecialchars($row['email']); ?></span>
                    <!-- <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required> -->
                </div>
                <!-- <div class="profile-info">
                    <label for="address">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($row['']); ?>">
                </div> -->
                <div class="profile-info">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>">
                </div>
                
                <div class="button-container">
                    <a href="userprofile.php"><button type="button" class="edit-but">Cancel</button></a>
                    <button type="submit" id="submit-btn" class="edit-but">Submit</button>
                    <button type="button" id="delete-button" class="edit-red">Delete</button>
                </div>
            </div>
        </form>

        <script>
             $(document).ready(function() {
                $('#delete-button').on('button', function(event) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Delete!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            
                        }
                    })
                })
             });



            $(document).ready(function() {
            $('#edit-form').on('submit', function(event) {
                event.preventDefault(); 

                const formdata = {
                username: document.getElementById('username').value,
                name: document.getElementById('name').value,
                gender: document.getElementById('gender').value,
                // email: document.getElementById('email').value,
                address: document.getElementById('address').value,
                EcoId: '<?php echo $_SESSION['Id']; ?>'
                };

                console.log(formdata);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Apply Changes!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: 'editProcess.php',
                        type: 'POST',
                        data: formdata,
                            success: function(response) {
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Your work has been saved",
                                showConfirmButton: false,
                                timer: 2500
                                });
                                window.location.href = 'userprofile.php';
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Data Not Saved",
                                showConfirmButton: false,
                                timer: 2500
                                });
                                console.log('An error occurred: ' + error);
                                window.location.href = 'userprofile.php';
                            }
                        });
                        
                    }
                });

                });
            });
        </script>
    </div>
</div>
<?php
    }
} catch (Exception $err){
    echo 'Error';
}

?>

