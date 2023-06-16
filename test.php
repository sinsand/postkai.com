<!DOCTYPE html>
<html>
  <head>
    <title>Transport Cost Calculator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <h1>Transport Cost Calculator</h1>
    <form>
      <label for="distance">Distance (in miles):</label>
      <input type="number" id="distance" name="distance">

      <label for="weight">Weight (in pounds):</label>
      <input type="number" id="weight" name="weight">

      <label for="speed">Average speed (in mph):</label>
      <input type="number" id="speed" name="speed">

      <label for="mpg">Miles per gallon:</label>
      <input type="number" id="mpg" name="mpg">

      <button type="button" onclick="calculateCost()">Calculate Cost</button>
    </form>

    <div id="result"></div>

    <script src="script.js"></script>
  </body>
</html>
