<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="../controller.jpeg">
    <link rel="stylesheet" href="../CSS/style.css">
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js">
    </script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
<script src="../JS/javascript.js"></script>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

        </div>

        <div style='padding:0px 15px;'class="collapse navbar-collapse">

           <ul class="nav navbar-nav">
               
            <li><a class="navbar-brand" href="../index.html">Home</a></li>

           

            <li><a href="../Rankings.html">Rankings</a></li>
               
               <li><a href="../About.html">About</a></li>

<li><a href="../Music.html">My Music</a></li>
               
            <li><a href="../FAQ.html">FAQ</a></li>

            <li><a href="../Games.html">Games</a></li>
               
            <li><a href="../movies/index.html">Movies</a></li>
               
            <li class='acitve'><a href="index.php">Gamer Info</a></li>
             </ul>

        </div><!--/.nav-collapse -->

      </div>

    </div>
              
    <br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Gamer Info</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Info</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM gamer";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th style='background-color:white;'>#</th>";
                                        echo "<th style='background-color:white;'>User Name</th>";
                                        echo "<th style='background-color:white;'>Games</th>";
                                        echo "<th style='background-color:white;'>System</th>";
                                        echo "<th style='background-color:white;'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td style='background-color:#f9f9f9;'>" . $row['id'] . "</td>";
                                        echo "<td style='background-color:#f9f9f9;'>" . $row['name'] . "</td>";
                                        echo "<td style='background-color:#f9f9f9;'>" . $row['address'] . "</td>";
                                        echo "<td style='background-color:#f9f9f9;'>" . $row['salary'] . "</td>";
                                        echo "<td style='background-color:#f9f9f9;'>";
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
<br/>
</body>
</html>