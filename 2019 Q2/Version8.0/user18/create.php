<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $comments = "";
$name_err = $email_err = $comments_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate email address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email address.";     
    } else{
        $email = $input_email;
    }
    
    // Validate comments
    $input_comments = trim($_POST["comments"]);
    if(empty($input_comments)){
        $comments_err = "Please enter some comments.";
    } else{
        $comments = $input_comments;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($comments_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO guestbook (name, email, comments) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_comments);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_comments = $comments;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: guestbook.php");
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
    <title>My Guest Book - Add Guest</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Helvetica">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="JS/script.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='index.html'>Home</a></li>
   <li><a href='global-warming.html'>Global Warming</a></li>
   <li><a href='climate-change.html'>Climate Change</a></li>
   <li><a href='problems.html'>Problems</a></li>
   <li class='active'><a href='guestbook.php'>Guest Book</a></li>   
   <li><a href='weather.php'>Weather</a></li>
   <li><a href='solutions.html'>Solutions</a></li>
   <li><a href='references.html'>References</a></li>
   <li><a href='contact-us.html'>Contact Us</a></li>
</ul>
</div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add guest record to the guesbook.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>						
                        <div class="form-group <?php echo (!empty($comments_err)) ? 'has-error' : ''; ?>">
                            <label>Comments</label>
                            <textarea name="comments" class="form-control"><?php echo $comments; ?></textarea>
                            <span class="help-block"><?php echo $comments_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="guestbook.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>