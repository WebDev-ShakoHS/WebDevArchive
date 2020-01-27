<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$Player_Name = $Team = $Jersey_Number = "";
$Player_Name_err = $Team_err = $Jersey_Number_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_Player_Name = trim($_POST["Player_Name"]);
    if(empty($input_Player_Name)){
        $Player_Name_err = "Please enter a name.";
    } elseif(!filter_var($input_Player_Name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $Player_Name_err = "Please enter a valid name.";
    } else{
        $Player_Name = $input_name;
    }
    
    // Validate address address
    $input_Team = trim($_POST["Team"]);
    if(empty($input_Team)){
        $Team_err = "Please enter their team.";     
    } else{
        $Team = $input_Team;
    }
    
    // Validate salary
    $input_Jersey_Number = trim($_POST["Jersey_Number"]);
    if(empty($input_Jersey_Numbery)){
        $Jersey_Number_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_Jersey_Number)){
        $Jersey_Number_err = "Please enter a positive integer value.";
    } else{
        $Jersey_Number = $input_Jersey_Number;
    }
    
    // Check input errors before inserting in database
    if(empty($Player_Name_err) && empty($Team_err) && empty($Jersey_Number_err)){
        // Prepare an update statement
        $sql = "UPDATE players SET Player_Name=?, Team=?, Jersey_Number=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);
            
            // Set parameters
            $param_name = $Player_Name;
            $param_address = $Team;
            $param_salary = $Jersey_Number;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM players WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $Player_Name = $row["Player_Name"];
                    $Team = $row["Team"];
                    $Jersey_Number = $row["Jersey_Number"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
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
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($Player_Name_err)) ? 'has-error' : ''; ?>">
                            <label>Player Name</label>
                            <input type="text" name="Player_Name" class="form-control" value="<?php echo $Player_Name; ?>">
                            <span class="help-block"><?php echo $Player_Name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Team_err)) ? 'has-error' : ''; ?>">
                            <label>Team</label>
                            <textarea name="Team" class="form-control"><?php echo $Team; ?></textarea>
                            <span class="help-block"><?php echo $Team_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Jersey_Number_err)) ? 'has-error' : ''; ?>">
                            <label>Jersey Number</label>
                            <input type="text" name="Jersey_Number" class="form-control" value="<?php echo $Jersey_Number; ?>">
                            <span class="help-block"><?php echo $Jersey_Number_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="player.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>