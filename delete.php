<?php include "upload.php"?>

<?php
if(isset($_GET['filename'])){
    $name = $_GET['filename'];
    }
if(isset($_GET['filesno'])){
$id = $_GET['filesno'];
}
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'web1');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM filesystem WHERE id=$id";


unlink("./uploads/".$name);
if (mysqli_query($conn, $sql)) {
  header('location:./download.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>