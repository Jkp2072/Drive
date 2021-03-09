<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
</head>
<div class="container-fluid">
<div class="card-header bg-dark text-light">
<?php

$conn = mysqli_connect('localhost', 'root', '', 'web1');
// used for display ,we will pass filesv to the download.php as it will contain list of all the files in the db
$sql = "SELECT * FROM filesystem";
$result = mysqli_query($conn, $sql);

$filesv = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['submit'])) { 
    // name 
    $filename = $_FILES['files']['name'];

    // destination
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['files']['tmp_name'];
    $size = $_FILES['files']['size'];

    
     
        // move the uploaded (temporary) file 
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO filesystem (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                header('location:./download.php');
                
            }
        } else {
            echo "Failed to upload file.";
        }
    
}

// access file_id from the download.php
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM filesystem WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE filesystem SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>
</div>
</div>
</html>