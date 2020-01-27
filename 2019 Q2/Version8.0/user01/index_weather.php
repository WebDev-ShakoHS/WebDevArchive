<?php
$apiKey = "e9a362e042b26fbe91a4a3cb02af1223"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "metric";//metric-Celcius  imperial-Farhenheit
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
<title>Brandon's Server - Weather</title>
<link rel="shortcut icon" href="images/User01.ico" type="image/x-icon">

 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"

          href="https://fonts.googleapis.com/css?family=Lobster">
<style>

.background {
        background-image:url(minecraft%20snow%20biome.jpeg);
        
    }
 
    .background2 {
        background-image:url(weather%20commands.jpeg);
        background-size: cover;
    }
    
.center {
       display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
    }
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #212121;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    margin-left: 15px;
    color: #929292;
}

.time {
    line-height: 25px;

}
</style>

</head>
<body>

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
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="index.html">Home</a></li> 
<li><a href="webDevUser01_AboutMe.html">About Me</a></li>
<li><a href="webDevUser01_List.html">Epic Minecraft Lists</a></li>
<li><a href="webDevUser01_Table.html">Best Minecraft Blocks</a></li>
<li><a href="webDevUser01_Games.html">Gamer Time</a></li>
<li class="active"><a href="index_weather.php">/Weather</a></li>
<li><a href="index_crud.php">Minecraft Form</a></li>
<li><a href="webDevUser01_FAQ.html">FAQ</a></li> 
</ul>

        </div><!--/.nav-collapse -->

      </div>

    </div>

<div class="container">
<div class ="row h-100" id="content">
<div class="col-sm-12 my-auto">
<div class="card card-block w-25 mx-auto">

    <br>

    <br>
    

    <div class="background" class="report-container">
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
    <br>
    <br>
    
    <div class="background2" class="report-container">
  <a href="https://gamepedia.cursecdn.com/minecraft_gamepedia/7/76/Impulse_Command_Block.gif?version=ae473f5423228eab8453aa5b67475325">
    <img class="center" alt="Command Block" src="https://gamepedia.cursecdn.com/minecraft_gamepedia/7/76/Impulse_Command_Block.gif?version=ae473f5423228eab8453aa5b67475325" width="500" height="500"></img></a>
    </div>
</body>
</html>