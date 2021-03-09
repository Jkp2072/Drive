<?php
session_start();
$conn = new mysqli('localhost','root','','web1'); 
 if($conn->connect_error)
{
    die('connection failed of the database ...please refer to steps in the README.md :' .$conn->connect_error);
}
  
?>




<html>
    <head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
<link href="login.css" rel="stylesheet" type="css"/>


</head>

<body>
    <div class="container-fluid text-center bg-dark text-light">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h1 class="read-item">Login form</h1>
                </div>
            </div>
        </div>       
        <div class="card-body">  
        <div class="row">
            <div class="col-12">
                <form class="form-inline justify-content-center" action="" method="POST">
                    <div class="input-group mb-3 flex-nonwrap">
                        <input type="text" name="email" class="form-control" placeholder="Email-Id" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                    <div class="input-group mb-3 flex-nonwrap">
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">*****</span>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" value="submit" class="btn btn-success" name="submit">Submit</button>
                            <button type="reset" value ="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                    <div class="row">
                        <a type="button" href="signup.php" class="btn btn-link">new to our website</button>
                    </div>
                </form>
            </div> 
        </div>
        </div>
    </div>    
</body>
</html>

<?php
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$password=$_POST['password'];

    if(isset($email) && isset($password)) // check if password and usernae are there or not.
    {
       
        $query = "SELECT * FROM user WHERE email = '$email' && password='$password'";
        $data=mysqli_query($conn , $query);
        $total = mysqli_num_rows($data);  // check if a row of this password and username exists

        if($total==1)
        {
           $_SESSION['user_name']= $email;
           header('location:./index.php');  // enter path of home page.
          
        }
        else
        {
            echo "wrong credentials";
            
        }
    }
    }
    



?>