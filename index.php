<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding to UTF-8 -->
    <meta charset="UTF-8">
    <!-- Configure the viewport to be mobile-friendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set the title of the page -->
    <title>Public Holidays and Accommodation Finder</title>
</head>
<body>
    <!-- Display the main header of the page -->
    <h1>Public Holidays and Accommodation Finder</h1>
<!-- Create a form with POST method that submits data to fetch_data.php -->
<form action="fetch_data.php" method="POST">
    <!-- Create a label and input field for the country -->
    <label for="country">Select country:</label>
    <input type="text" name="country" id="country" placeholder="Country code (e.g., US)" required>
    <br><br>

    <!-- Create a label and input field for the area (state, province, or city) -->
    <label for="area">Enter area (state, province, or city):</label>
    <input type="text" name="area" id="area" placeholder="Area name" required>
    <br><br>

    <!-- Create a submit button to submit the form -->
    <input type="submit" value="Get Information">
</form>
</body>
</html>
