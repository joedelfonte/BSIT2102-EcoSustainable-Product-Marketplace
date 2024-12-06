<link rel="stylesheet" href="\project\BSIT2102-EcoSustainable-Product-Marketplace\assets\css\profile.css">
<?php
require_once realpath(dirname(__FILE__) . '/../../config.php');
require_once ROOT_PATH .'/assets/pageTemplate/header.php';
require_once(ROOT_PATH .'\src\database\userCrud.php'); // Include the database connection file

try {

    // Create an instance of the Database class and establish a connection
$db = new Users();
$user = $db->readAll('ECO0002');
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
        <form id="edit-form" action="editProcess.php" method="POST">
            <div class="profile-details">
                <div class="profile-header">
                    <h1>User Profile</h1>
                </div>
                <div class="profile-info">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name='username' value='<?php echo htmlspecialchars($row['username']);?>' required>
                </div>
                <div class="profile-info">
                    <label for="nickname">Nickname:</label>
                    <input type="text" id="nickname" name='nickname' value='<?php echo htmlspecialchars($row['nickname']);?>'>
                </div>
                <div class="profile-info">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name='gender' value='<?php echo htmlspecialchars($row['gender']);?>' required>
                </div>
                <div class="profile-info">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name='email' value='<?php echo htmlspecialchars($row['email']);?>' required>
                </div>
                <div class="profile-info">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name='address' value='<?php echo htmlspecialchars($row['address']);?>'>
                    
                </div>
                <div class="profile-info">
                    <label for="pssword">Password:</label>
                    <input type="password" id="password" name='password'>
                </div>

                <div class="button-container">
                    <a href="userprofile.php"><button type="button">Cancel</button></a>
                    <button type="submit" id="submit-btn">Submit </button>
                </div>
            </div>
        </form>

        <script>
            document.getElementById('submit-btn').addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to edit your profile?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                        saveEdit();
                    }
                });
            });

            function saveEdit(){
                const formdata = {
                    username: document.getElementById('username').value, 
                    nickname: document.getElementById('nickname').value, 
                    gender: document.getElementById('gender').value, 
                    email: document.getElementById('email').value, 
                    address: document.getElementById('address').value,
                    password: document.getElementById('password').value
                    EcoId: <?= $row['']?>
                }

                $.ajax({
                    type: 'POST',
                    url: 'editProcess.php',
                    data: formdata, $user,
                    success: function(response) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Your work has been saved",
                            showConfirmButton: false,
                            timer: 2500
                        });
                    },
                    
                    error: function(xhr, status, error) { 
                        console.error('Failed to Fetch Data: ' + error);
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Data Not Saved",
                            showConfirmButton: false,
                            timer: 2500
                        });

                    }
                });
            }
        </script>
    </div>
</div>
<?php
    }
} catch (Exception $err){
    echo 'Error';

}
?>
