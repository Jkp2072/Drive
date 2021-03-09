


<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">  
        <link href="signup.css" rel="stylesheet" type="css"/>
        
    </head>

    <body>
        
        
        <div class="container-fluid">
            <div class="card-header">
                <h1>Sign-up form</h1>
            </div>
            <div class = "card-body">
                <div class="row">
                    <div class="col-12">
                        <form class="form-inline justify-content-center" action="signupc.php" method="POST">
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
                                    <button type="submit" value="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" value ="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <a type="button" href="login.php" class="btn btn-link">login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>    
     </body>   
</html> 
