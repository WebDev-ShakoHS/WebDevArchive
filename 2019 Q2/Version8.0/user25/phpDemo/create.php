<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$Player_Name = $Team = $Jersey_Number = "";
$Player_Name_err = $Team_err = $Jersey_Number_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_Player_Name = trim($_POST["Player_Name"]);
    if(empty($input_Player_Name)){
        $Player_Name_err = "Please enter a name.";
    } elseif(!filter_var($input_Player_Name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Player_Name_err = "Please enter a valid name.";
    } else{
        $Player_Name = $input_Player_Name;
    }
    
    // Validate address
    $input_Team = trim($_POST["Team"]);
    if(empty($input_Team)){
        $Team_err = "Please enter a team.";     
    } else{
        $Team = $input_Team;
    }
    
    // Validate salary
    $input_Jersey_Number = trim($_POST["Jersey_Number"]);
    if(empty($input_Jersey_Number)){
        $Jersey_Number_err = "Please enter their jersey number.";     
    } elseif(!ctype_digit($input_Jersey_Number)){
        $Jersey_Number_err = "Please enter a positive integer value.";
    } else{
        $Jersey_Number = $input_Jersey_Number;
    }
    
    // Check input errors before inserting in database
    if(empty($Player_Name_err) && empty($Team_err) && empty($Jersey_Number_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO players (Player_Name, Team, Jersey_Number) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $Player_Name;
            $param_address = $Team;
            $param_salary = $Jersey_Number;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: player.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Player</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Player Details</h2>
                    </div>
                    <p>Fill out this form to add your player</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Player_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="Player_Name" class="form-control" value="<?php echo $Player_Name; ?>">
                            <span class="help-block"><?php echo $Player_Name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Team_err)) ? 'has-error' : ''; ?>">
                            <label>Team</label>
                            <textarea name="Team" class="form-control"><?php echo $Team; ?></textarea>
                            <span class="help-block"><?php echo $Team_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Jersey_Number_err)) ? 'has-error' : ''; ?>">
                            <label>Jersey</label>
                            <input type="text" name="Jersey_Number" class="form-control" value="<?php echo $Jersey_Number; ?>">
                            <span class="help-block"><?php echo $Jersey_Number_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="player.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>