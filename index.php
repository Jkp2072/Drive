
<?php include 'upload.php'?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
<link href="index.css" rel="stylesheet" type="css"/>

    </head>

    <body>
    <div class="card-header bg-dark ">
                
                <?php
                    session_start();
                    if(isset($_SESSION['user_name'])){
                        echo "<h5 class='text-white'>Hello , ".$_SESSION['user_name'];
                        echo' </t></t></t></t>';
                        echo '<a type="button" class="btn btn-danger" href="logout.php"> Logout</a>';
                    }
                    else{
                        header('location:./login.php');
                    }
                ?>
                </div>
    
    <nav class="navbar sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="download.php">view</a>
                    </li>
                    
                </ul>
                

               
                
            </div>
        </nav>
    <div class="container-fluid">
               
        <form class="form-inline justify-context-center" action="./upload.php" method="POST" enctype="multipart/form-data">
       
        
        
        <div class="row">
            <div class="col-md-12">
                <h1> Upload Files</h1>
            </div>
        </div>

        <div class="mb-3">
           
            <input class="form-control" name="files" id="files" type="file" multiple>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" value="submit" class="btn btn-success" name="submit">Submit</button>                
            </div>
        </div>

     </form>   
    </div>
    </body>


</html>