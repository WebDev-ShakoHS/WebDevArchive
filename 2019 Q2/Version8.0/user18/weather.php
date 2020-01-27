<?php
$apiKey = "2e4fd0386e9b64e38836bdf4f876a657"; //You will need to add in the 
$cityId = "5879400"; //5046997 Shakopee City Id//5879400 Anchorage
$cityId2 = "5037649";//Minneapolis
$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'metric'){//Changes the $temp varaible to match 
    $temp = "C";
}
else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;
$googleApiUrl2 = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId2 . "&lang=en&units=" . $units . "&APPID=" . $apiKey;
$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$data = json_decode($response);
curl_close($ch);

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_URL, $googleApiUrl2);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_VERBOSE, 0);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
$response1 = curl_exec($ch2);
curl_close($ch2);
$data1 = json_decode($response1);
$currentTime = time();
$backImage = "http://openweathermap.org/img/w/" . $data->weather[0]->icon. ".png";
?>

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
<link rel="stylesheet" type="text/css" href="CSS/styles.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Helvetica">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="JS/script.js"></script>
<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: #929292;
    background: url("<?php echo $backImage ?>");
}
   

.report-container {
    border: #E0E0E0 1px solid;
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
    .background-image {
        
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
   <li><a href='guestbook.php'>Guest Book</a></li>   
   <li class='active'><a href='weather.php'>Weather</a></li>
   <li><a href='solutions.html'>Solutions</a></li>
   <li><a href='references.html'>References</a></li>
   <li><a href='contact-us.html'>Contact Us</a></li>
</ul>
</div>
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
<div class="report-container">
        <h2><?php echo $data1->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data1->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data1->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data1->main->temp_max; ?>&deg;<?php echo $temp; ?><span
                class="min-temperature"><?php echo $data1->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data1->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data1->wind->speed; ?> km/h</div>
        </div>
    </div>

</body>
</html>