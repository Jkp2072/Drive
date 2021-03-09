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
<?php
// Turn off all error reporting
error_reporting(0);
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
</head>
<div class="card-deck">

<?php
$conn = new mysqli('localhost', 'root','','web1');

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM filesystem";
	$result = $conn->query($sql);
	
	echo"
		
		<style>
			table, th, td{
			border: 0px solid black;
			border-collapse: collapse;
            color : white;
		}
		</style><body>
        <nav class='navbar sticky-top navbar-dark bg-dark'>
		
        
           
                    
                       <h3> <a class='nav-link active text-primary' aria-current='page' href='index.php'>home</a></h3>
                      <h3> <a class='nav-link active text-primary' aria-current='page' href='download.php'>View</a></h3>
                      
                  
               
                

               
                
            
        
        </nav>
        <input type='search' placeholder='search' id='te' onkeyup='myFunction()'></input>
		<table id='down'>
        <div class=' bg-dark text-light'>
			<tr><th>File Name</th><th>Download</th></tr>
            </div>
	";
	
	if($result->num_rows > 0){
		// output data of each row
		while($row = $result->fetch_assoc()){
			echo
			"<div class='card bg-dark text-light'>
            <tr><td>".$row['name']."</td>
            <td><p><a type='button' class='btn btn-outline-success' href='download.php?file_id=".$row['id']."' target='_blank '>Download</a></p></td>
            <td><p><a type='button' class='btn btn-outline-danger' href='delete.php?filesno=".$row['id']."' target='_blank '>DELETE</a></p></td></tr>
            </div>";
			}
	}
	else{
		echo "No results to display";
	}
	// }
	
echo ' </table> <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("te");
  filter = input.value.toUpperCase();
  table = document.getElementById("down");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>';


    $conn->close();
    ?>
    </html>