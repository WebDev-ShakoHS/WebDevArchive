<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$flavor = $company = $yum = "";
$flavor_err = $company_err = $yum_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["Ramen Flavor"]);
    if(empty($input_name)){
        $name_err = "Please enter a Ramen Flavor.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid Ramen Flavor.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["Ramen Company"]);
    if(empty($input_address)){
        $address_err = "Please enter a Ramen Company Name.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["Yum Level"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the Yum Level of this Ramen.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($flavor_err) && empty($company_err) && empty($yum_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Ramens (Ramen Flavor, Ramen Company, Yum Level) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_flavor, $param_company, $param_yum);
            
            // Set parameters
            $param_flavor = $flavor;
            $param_company = $company;
            $param_ym = $yum;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Ramen Info</title>
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
                        <h2>Create Ramen Info</h2>
                    </div>
                    <p>Please fill this form and submit to add Ramen Flavor to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>