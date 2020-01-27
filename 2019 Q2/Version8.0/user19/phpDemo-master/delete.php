<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Game</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
     <br>
    <br>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Test One Page Web Web ">

    <!-- code obtained from https://frimmy.github.io/api-test/  -->

    <title>Newest Games</title>


    <!-- Bootstrap core CSS -->

    <link href="CSS/bootstrapEdit.css" rel="stylesheet">

 

    <!-- Custom styles for this template -->

    <link rel="stylesheet" type="text/css"

          href="https://fonts.googleapis.com/css?family=Lobster">

    <link href="CSS/MainCSS.css" rel="stylesheet">


  </head>


  <body>
<style>
body {
    background-image: url('images/download.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
    </style>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

         <!-- Custom styles for this template -->

    <link rel="stylesheet" type="text/css"

          href="https://fonts.googleapis.com/css?family=Lobster">
<!-- Bootstrap core JS -->
        <!-- These are needed to get the responsive menu to work -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="CSS/MainCSS.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <style type="text/css">
            .menu{
                margin: 0px;
            }
            
            .wideMargin{
                margin: 15px;
            }
            #footer{
                font-size: 12px;
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <div class="menu">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a href="http://shakonet.isd720.com" class="navbar-brand">WebDev</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
<!---------------------------------- Edit These Items in your Menu ------------->                        
                        <a href="../index.html" class="nav-item nav-link">Home</a>
                        <a href="../FAQ.html" class="nav-item nav-link">Apps</a>
                        <a href="../favthings.html" class="nav-item nav-link">Best and Worst Games 2019</a>
                        <a href="../NewGames.html" class="nav-item nav-link active">Newest Games of 2020</a>
                        <a href="../JavascriptGame.html" class="nav-item nav-link">Java Games</a>
                        <a href="../Weather/index.php" class="nav-item nav-link">Weather</a>
                        <a href="mailto:aidanmusil@gmail.com?Subject=Hello" class="nav-item nav-link disabled" tabindex="-2">Contact</a>
<!----------------------------------^ Edit These Items in your Menu ^ ------------->                        
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a href="#" class="nav-item nav-link disabled">Login</a>
                    </div>
                </div>
            </nav>
        </div>
</body>
</html>