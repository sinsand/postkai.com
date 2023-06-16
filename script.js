function calculateCost() {
  // Get input values
  var distance = document.getElementById("distance").value;
  var weight = document.getElementById("weight").value;
  var speed = document.getElementById("speed").value;
  var mpg = document.getElementById("mpg").value;

  // Calculate cost
  var cost = distance * weight * speed / mpg;

  // Display result
  document.getElementById("result").innerHTML = "The cost of transport is $" + cost.toFixed(2) + ".";
}
