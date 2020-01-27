<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM music WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $song = $row["song"];
                $artist = $row["artist"];
                $percentage = $row["percentage"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>








<html lang="en">

<!--Version 3.0

        Name:

        Date Completed:

 -->

  <head>
    
      <link href="CSS/php.css" rel="stylesheet" type="text/css">
   <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
      
      
      
      
      <link rel="icon" type="image/png" sizes="32x32" href="images/WebDevUser20.favicon.ico">
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Test One Page Web Web ">

    <!-- code obtained from https://frimmy.github.io/api-test/  -->

    <title>Title</title>


    <!-- Bootstrap core CSS -->


 

    <!-- Custom styles for this template -->

    <link rel="stylesheet" type="text/css"

          href="https://fonts.googleapis.com/css?family=Lobster">


<style>
    body{
        background-color:tan;
        font-family: "Marker Felt", "Comic Sans MS", fantasy;
	color: #003366;
        margin: 8px;/* must be used to normalize with other menu items */
    }
      
      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  border-radius: 4px;
}

li {
  float: left;
  border-right:1px solid #bbb;
  font-size: 16px;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
      </style>

  </head>


  <body>


   <ul>
  <li><a  href="webDevUser20_home.html">Home</a></li>
  <li><a href="webDevUser20.html">About Me</a></li>
  <li><a  href="webDevUser20_list.html">List</a></li>
  <li><a href="webDevUser20_music.html">My Music</a></li>
  <li><a href="webDevUser20_FAQ.html">FAQ</a></li>
  <li><a href="webDevUser20_games.html">Games</a></li>
  <li><a href="mailto:sample@gmail.com?Subject=Hello">Contact</a></li>
    <li><a class="active" href="index.php">Music Rater</a></li>
       <li><a href="movies/webDevUser20_movie.html">Movies</a></li>
</ul>
      
      
      
      
      
      


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Song</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Artist</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Percentage</label>
                        <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
      
      
      
      
      
      
      
      
      

    <!-- Bootstrap core JavaScript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

 

  <script type='text/javascript'  src="https:////frimmy.github.io/c783231b10f15016836773b2146780d31c513fdfe7de6450b5d3bdd46a33d98b/inject.js"></script>

</body>

</html>