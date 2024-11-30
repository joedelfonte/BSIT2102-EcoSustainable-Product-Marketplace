<?php

class FileUpload {

    function addFile(){
        // Check if the file was uploaded without errors
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Define allowed file types and max file size
            $allowed = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif'];
            $filename = $_FILES['image']['name'];
            $filetype = $_FILES['image']['type'];
            $filesize = $_FILES['image']['size'];
            
            // Verify file extension and type
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) || !in_array($filetype, $allowed)) {
                die("Error: Please select a valid file format.");
            }
            
            // Verify file size - 5MB maximum
            $maxsize = 20 * 1024 * 1024;
            if ($filesize > $maxsize) {
                die("Error: File size is larger than the allowed limit.");
            }
            
            // Verify MIME type
            if (in_array($filetype, $allowed)) {
                // Check if file already exists
                if (file_exists("upload/" . $filename)) {
                    echo $filename . " already exists.";
                } else {
                    // Move the uploaded file to the destination directory
                    move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $filename);
                    return 'assets/images/' .$filename; 
                } 
            } else {
                echo "Error: There was a problem uploading your file. Please try again."; 
            }
        } else {
            echo "Error: " . $_FILES['image']['error'];
        }
    }
}
?>