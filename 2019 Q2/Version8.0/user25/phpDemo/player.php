<!DOCTYPE html>
<html lang="en">
<head>
          <title>Lance's Bad Website</title>
      
<link rel="apple-touch-icon" sizes="180x180" href="../Images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon-16x16.png">
<link rel="manifest" href="../Images/site.webmanifest">
    
    <meta charset="UTF-8">

 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body style="background-color:#ffdd00">
   
    <br>
    <br>
    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="../webDevUser25.html">About Me</a>

        </div>

        <div class="collapse navbar-collapse">

           <ul class="nav navbar-nav">

            <li style="text-size:1.2em;"><a href="../index.html">Home</a></li>

            <li><a href="../WebDevUser25_Music.html">Music</a></li>
            
            <li><a href="../WebDevUser25_Games.html">Games</a></li> 

            <li><a href="../webDevUser25.html">NBA Players</a></li> 

            <li><a href="../WebDevUser25_NFL.html">NFL Players</a></li>
               
            <li><a href="../MovieAPI/apii.html">Video Games</a></li>
               
    <li class="active"><a href="http://127.0.0.1:8080/GitHub/WebDev2/Version8.0/user25/phpDemo/player.php">Player Lister</a></li>
               
               
            <li><a href="https://www.espn.com/">ESPN</a></li>
            
         

          </ul>

        </div><!--/.nav-collapse -->

      </div>

    </div>     
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Player Stat Lister</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add Player</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM players";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Player_Name</th>";
                                        echo "<th>Team</th>";
                                        echo "<th>Jersey_Number</th>";
                                        echo "<th>Options</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Player_Name'] . "</td>";
                                        echo "<td>" . $row['Team'] . "</td>";
                                        echo "<td>" . $row['Jersey_Number'] . "</td>";
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
</body>
</html>