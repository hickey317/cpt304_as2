<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Holidays and Accommodation Finder</title>
</head>
<body>
    <h1>Public Holidays and Accommodation Finder</h1>
    <form action="fetch_data.php" method="POST">
        <label for="country">Select country:</label>
        <input type="text" name="country" id="country" placeholder="Country code (e.g., US)" required>
        <br><br>
        <label for="area">Enter area (state, province, or city):</label>
        <input type="text" name="area" id="area" placeholder="Area name" required>
        <br><br>
        <input type="submit" value="Get Information">
    </form>
</body>
</html>
