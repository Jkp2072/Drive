<html>
<?php
$files =$_POST['files'];

$conn = new mysqli('localhost','root','','web1');

if($conn->connect_error)
{
    die('connection failed '.$conn->connect_error);
}
else
{
    $q = $conn->prepare("INSERT INTO filesystem(files)values(?)");
    $q->bind_param("s",$files);
    $q->execute();
    
    header('location:./index.php');
    $q->close();
    $conn->close();
}
?>
</html>