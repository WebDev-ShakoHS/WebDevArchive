<!DOCTYPE html>

<html lang="en">

<!--Version 8.0
        Name:
        Date Completed:
 -->

  <head>    
      
      <link rel="icon" type="image/png" sizes="32x32" href="images/WebDevUser20.favicon.ico">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Test One Page Web Web ">
      <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
       <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>  

    <!-- code obtained from https://frimmy.github.io/api-test/  -->



    <!-- Bootstrap core CSS -->


 

    <!-- Custom styles for this template -->

    <link rel="stylesheet" type="text/css"

          href="https://fonts.googleapis.com/css?family=Lobster">

    <link href="CSS/php.css" rel="stylesheet">

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
      
<link href="CSS/index.css" rel="stylesheet" type="text/css">

  </head>


  <body>


   <ul class='navbar'>
  <li><a  href="webDevUser20_home.html">Home</a></li>
  <li><a href="webDevUser20.html">About Me</a></li>
  <li><a href="webDevUser20_list.html">List</a></li>
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
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Music Rater </h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Songs</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM music";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Song</th>";
                                        echo "<th>Artist</th>";
                                        echo "<th>Percentage</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
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