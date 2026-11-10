
<?php

header("Content-Type: application/json");

$city = trim($_GET["city"] ?? "Puducherry");

if ($city === "") {
    echo json_encode(["error" => "Please enter a city name"]);
    exit;
}

// Function to retrieve API data
function getWeatherData($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return ["error" => $error];
    }

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status !== 200) {
        return ["error" => "Weather API request failed"];
    }

    $data = json_decode($response, true);

    if (!is_array($data)) {
        return ["error" => "Invalid API response"];
    }

    return $data;
}

// Step 1: Find the city's latitude and longitude
$cityUrl = "https://geocoding-api.open-meteo.com/v1/search?name="
         . urlencode($city)
         . "&count=1&language=en&format=json";

$locationData = getWeatherData($cityUrl);

if (isset($locationData["error"])) {
    echo json_encode($locationData);
    exit;
}

if (empty($locationData["results"])) {
    echo json_encode(["error" => "City not found"]);
    exit;
}

$location = $locationData["results"][0];

$latitude = $location["latitude"];
$longitude = $location["longitude"];
$cityName = $location["name"];

// Step 2: Get actual weather information
$weatherUrl = "https://api.open-meteo.com/v1/forecast"
    . "?latitude=" . $latitude
    . "&longitude=" . $longitude
    . "&current=temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code"
    . "&timezone=auto";

$weatherData = getWeatherData($weatherUrl);

if (isset($weatherData["error"])) {
    echo json_encode($weatherData);
    exit;
}

$current = $weatherData["current"];

// Step 3: Convert weather code into condition
$weatherConditions = [
    0 => "Clear Sky",
    1 => "Mainly Clear",
    2 => "Partly Cloudy",
    3 => "Overcast",
    45 => "Foggy",
    48 => "Rime Fog",
    51 => "Light Drizzle",
    53 => "Moderate Drizzle",
    55 => "Heavy Drizzle",
    61 => "Light Rain",
    63 => "Moderate Rain",
    65 => "Heavy Rain",
    71 => "Light Snow",
    73 => "Moderate Snow",
    75 => "Heavy Snow",
    80 => "Rain Showers",
    81 => "Moderate Rain Showers",
    82 => "Heavy Rain Showers",
    95 => "Thunderstorm"
];

$code = $current["weather_code"];

$condition = $weatherConditions[$code] ?? "Unknown";

// Step 4: Send weather details to JavaScript
$result = [
    "city" => $cityName,
    "temperature" => $current["temperature_2m"],
    "condition" => $condition,
    "humidity" => $current["relative_humidity_2m"],
    "wind_speed" => $current["wind_speed_10m"]
];

echo json_encode($result);

?>
