<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="SHS WebDev Menu Sample">
        
        <title>Weather </title>
        
        <!-- Bootstrap core JS -->
        <!-- These are needed to get the responsive menu to work -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
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
    
</html>



<?php
$apiKey = "cc00fa9b0f86f58e7f534a5ee6f4c1bb"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'metric'){//Changes the $temp varaible to match 
    $temp = "C";
}
else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>

<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: #C500FF;
}

.report-container {
    border: black 9px solid;
    padding: 20px 40px 40px 40px;
    border-radius: 2px;
    width: 550px;
    margin: 0 auto;
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #FF0000;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    margin-left: 15px;
    color: #00FBFF;
}

.time {
    line-height: 25px;
}
    body {
        
        background-color: lightcyan;
        
        
    }
</style>

</head>
<body>

      <div class="menu">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a href="http://shakonet.isd720.com" class="navbar-brand"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="webDevUser06_AboutMe.html" class="nav-item nav-link">About Me</a>
                       <a href="webDevUser06_list.html" class="nav-item nav-link">List</a>
                      <a href="table.html" class="nav-item nav-link">Table</a>
                      <a href="webDevUser06_music.html" class="nav-item nav-link">FAQ</a>
                        <a href="WebDevUser06_Games.html" class="nav-item nav-link">Games</a>
                       <a href="notindex.php" class="nav-item nav-link">Popular Ford Vehicles</a>
                      <a href="weather.php" class="nav-item nav-link active">Weather</a>



                    </div>
                    <div class="navbar-nav ml-auto">
                        <a href="#" class="nav-item nav-link disabled">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    
    
    <br>
    <br>
    
    <br>
    
    <br>
    
    <br>
    
    
    
    
    
    
    
    
    <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?><span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>


</body>
</html>