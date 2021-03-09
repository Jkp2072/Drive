<html>
    <!--<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
    </head>-->
    <body>
        
        <?php
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = new mysqli('localhost','root','','web1');

        if($conn->connect_error)
        {
            die('connection failed '.$conn->connect_error);
        }
        else
        {
            $q = $conn->prepare("INSERT INTO user(email,password)values(?,?)");
            $q->bind_param("ss",$email,$password);
            $q->execute();
            
            header('location:./login.php');
            $q->close();
            $conn->close();
        }
        
        
        
        
        
        
        ?>
    </body>    
</html>    