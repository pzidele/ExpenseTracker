<?php
    session_start();
    // user will be logged in on every page in website
   

    // Check if the user is signed in
    if (isset($_SESSION['UserID'])) {
        // The user is signed in, so get their ID
        $usersID = $_SESSION['UserID'];        
    } 
    
?>

<!DOCTYPE html>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="styles.css"/>
        <title>Practicum Project</title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
             <!-- Navbar -->
       <nav class = "navbar navbar-expand-lg bg-dark navbar-dark">

        <div class="container-fluid">
            
        <a class="navbar-brand" href="#">
            <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Expense Tracker
        </a>       
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" 
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
           <div class="collapse navbar-collapse" id="navbarNav">
               
                <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                    
                </li>
                    

                <?php
                    if (isset($_SESSION["UserUsername"])) {

                        echo "<li class='nav-item'><a class='nav-link' href='budget.php'>Budget</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Analytics</a></li>";
              
                        echo "<li><a href='account.php'><span class='glyphicon glyphicon-user'></span>My Account</a></li>";
                        echo "<li><a href='includes/logout.inc.php'><span class='glyphicon glyphicon-log-in'></span>Logout</a></li>";
                    
                        
                    } else {
                        echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
                        echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                    }
                    ?>
                                
            </ul>
            </div>
       </nav>