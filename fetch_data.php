<?php
// Get the country and area values from the submitted form
$country = $_POST['country'];
$area = $_POST['area'];

// Public Holidays API
// Build the URL for the Public Holidays API request
$public_holidays_url = "https://date.nager.at/api/v3/publicholidays/2023/" . urlencode($country);
// Get the Public Holidays data and decode the JSON response
$public_holidays_data = json_decode(file_get_contents($public_holidays_url), true);

// OpenWeatherMap API
// Set the API key for the OpenWeatherMap API
$weather_api_key = "4101c59cfdaacab0b63fecbc3bfdf63e";
// Build the URL for the OpenWeatherMap API request
$weather_url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($area) . "&appid=" . $weather_api_key;
// Get the weather data and decode the JSON response
$weather_data = json_decode(file_get_contents($weather_url), true);

// Booking.com API
// Set the API key for the RapidAPI (Booking.com API)
$rapidapi_key = "e765e96392msh3e6379b0a0afa55p1f0e76jsnc5a8dc4683ec";
// Set the URL for the Booking.com API request
$booking_url = "https://booking-com.p.rapidapi.com/v2/hotels/search";
// Build the query string for the Booking.com API request
$booking_query = http_build_query([
    'order_by' => 'popularity',
    'adults_number' => '2',
    'checkin_date' => '2023-09-27',
    'filter_by_currency' => 'AED',
    'dest_id' => '-553175',
    'locale' => 'en-gb',
    'checkout_date' => '2023-09-28',
    'units' => 'metric',
    'room_number' => '1',
    'dest_type' => 'city',
    'include_adjacency' => 'true',
    'children_number' => '2',
    'page_number' => '0',
    'children_ages' => '5,0',
    'categories_filter_ids' => 'class::2,class::4,free_cancellation::1',
]);
// Set the options for the Booking.com API request, including the API key and request method
$booking_options = [
    'http' => [
        'header' => "X-RapidAPI-Host: booking-com.p.rapidapi.com\r\n" .
                    "X-RapidAPI-Key: " . $rapidapi_key . "\r\n",
        'method' => 'GET',
    ],
];
// Create a stream context for the Booking.com API request with the specified options
$booking_context = stream_context_create($booking_options);
// Get the Booking.com data and decode the JSON response
$booking_data = json_decode(file_get_contents($booking_url . '?' . $booking_query, false, $booking_context), true);

// Display the Public Holidays data
echo "<h1>Public Holidays in " . htmlspecialchars($country) . "</h1>";
echo "<ul>";
foreach ($public_holidays_data as $holiday) {
    echo "<li>" . htmlspecialchars($holiday['name']) . " - " . htmlspecialchars($holiday['date']) . "</li>";
}
echo "</ul>";

// Display the Weather Information data
echo "<h2>Weather Information for " . htmlspecialchars($area) . "</h2>";
echo "Temperature: " . htmlspecialchars($weather_data['main']['temp']) . "K<br>";
echo "Humidity: " . htmlspecialchars($weather_data['main']['humidity']) . "%<br>";
echo "Weather: " . htmlspecialchars($weather_data['weather'][0]['description']) . "<br>";

// Display the Booking.com Accommodation Rentals data
echo "<h2>Short-term Accommodation Rentals in " . htmlspecialchars($area) . "</h2>";
echo "<ul>";
foreach ($booking_data['result'] as $property) {
    echo "<li>" . htmlspecialchars($property['hotel_name']) . " - " . htmlspecialchars($property['address']) . "</li>";
}
echo "</ul>";
?>
