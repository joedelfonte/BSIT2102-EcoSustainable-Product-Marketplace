<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>List of Users Dashboard</h2>
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>no.</th>
                    <th>EcoId</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by DataTables -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "getUserData.php", // Adjust the path to your PHP script
                    "type": "GET"
                },
                "columns": [
                    { "data": "EcoId" },
                    { "data": "Name" },
                    { "data": "Nickname"},
                    { "data": "Email" },
                    { "data": "Gender"},
                    { "data": "DateCreated" }
                ]
            });
        });
    </script>
</body>
</html>
