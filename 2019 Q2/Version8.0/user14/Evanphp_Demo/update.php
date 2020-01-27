<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$flavor = $company = $yum = "";
$flavor_err = $company_err = $yum_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_flavor = trim($_POST["Ramen Flavor"]);
    if(empty($input_flavor)){
        $flavor_err = "Please enter a Created Ramen Flavor.";
    } elseif(!filter_var($input_flavor, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $flavor_err = "Please enter a valid Ramen Flavor.";
    } else{
        $flavor = $input_flavor;
    }
    
    // Validate address address
    $input_company = trim($_POST["Ramen Company"]);
    if(empty($input_company)){
        $company_err = "Please enter a Ramen Company.";     
    } else{
        $company = $input_company;
    }
    
    // Validate salary
    $input_yum = trim($_POST["Yum Level"]);
    if(empty($input_yum)){
        $yum_err = "Please enter the Yum Level.";     
    } elseif(!ctype_digit($input_yum)){
        $yum_err = "Please enter a positive Yum Level.";
    } else{
        $yum = $input_yum;
    }
    
    // Check input errors before inserting in database
    if(empty($flavor_err) && empty($company_err) && empty($yum_err)){
        // Prepare an update statement
        $sql = "UPDATE Ramen Creation SET Ramen Flavor=?, Ramen Company=?, Yum Level=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_flavor, $param_company, $param_yum, $param_id);
            
            // Set parameters
            $param_flavor = $flavor;
            $param_company = $company;
            $param_yum = $yum;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
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
        $sql = "SELECT * FROM Ramen Creation WHERE id = ?";
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
                    $flavor = $row["Ramen Flavor"];
                    $company = $row["Ramen Company"];
                    $yum = $row["Yum Level"];
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
                        <div class="form-group <?php echo (!empty($flavor_err)) ? 'has-error' : ''; ?>">
                            <label>Ramen Flavor</label>
                            <input type="text" name="Ramen Flavor" class="form-control" value="<?php echo $flavor; ?>">
                            <span class="help-block"><?php echo $flavor_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                            <label>Ramen Company</label>
                            <textarea name="Ramen Company" class="form-control"><?php echo $company; ?></textarea>
                            <span class="help-block"><?php echo $company_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($yum_err)) ? 'has-error' : ''; ?>">
                            <label>Yum Level</label>
                            <input type="text" name="Yum Level" class="form-control" value="<?php echo $yum; ?>">
                            <span class="help-block"><?php echo $yum_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>