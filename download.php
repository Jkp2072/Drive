<?php
                    session_start();
                    if(isset($_SESSION['user_name'])){
                        echo "<h5 class='bg-dark text-white'>Hello , ".$_SESSION['user_name'];
                        echo' </t></t></t></t>';
                        echo '<a type="button" class="btn btn-danger" href="logout.php"> Logout</a>';
                    }
                    else{
                        header('location:./login.php');
                    }
                ?>
                






<?php include 'upload.php';?>
<!DOCTYPE html>
<html>

<head>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
  <title>Download files</title>
</head>
<body>
<div class="bg-dark text-light"><h1 align="center">Downloads</h1> </div>
<nav class="navbar sticky-top navbar-dark bg-dark">
           
                
                
                       <h1> <a class="nav-link active" aria-current="page" href="index.php">home</a></h1>
                       <h1> <a class="nav-link active" aria-current="page" href="search.php">Search</a></h1>

               
               
                
       
        </nav>
<div class="container-fluid">





<div class="card-body bg-dark text-light">
<div class="row">
  <?php foreach ($filesv as $file): ?>
    <div class="col-3 mx-0 mt-3 mb-3 p-2">
    <div class="card card-hover" style="width: 18rem;">
    <div class="card-deck">
  <div class="card-body">
  <h5 class="card-title text-dark">Filename : <?php echo $file['name']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">ID :<?php echo $file['id']; ?></h6>
    <div class="dropdown-divider"></div>
    <p class="card-text text-dark">Size :<?php echo floor($file['size'] / 1000) . ' KB'; ?></p>
    <p class="card-text text-dark">Downloads :<?php echo $file['downloads']; ?></p>
    <a type="button" class="btn btn-outline-success" href="download.php?file_id=<?php echo $file['id'] ?>">Download</a> <!--sending the php for download and passing file id to the upload.php file -->
    <a type="button" class="btn btn-danger" href="delete.php?filesno=<?php echo $file['id'] ?>">Delete</a>
   </div>
  </div>
</div>
    </div>
    
  <?php endforeach;?>
  
  </div>
    </div>

</div>
<script src="search1.js">

</script>
</body>
</html>