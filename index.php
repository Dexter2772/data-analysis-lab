<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>

.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}
svg {
  padding-left: 50px;
}
</style>
<?php
function loadCsv($path) {
  $csvFile = file($path);
  $csv = array_map('str_getcsv', $csvFile);
  array_walk($csv, function(&$a) use ($csv) {
    $a = array_combine($csv[0], $a);
  });
  array_shift($csv); # remove column header
  return $csv;
}

$tempData = loadCsv('http://localhost/dataAnalysisLab/HawaiiStats.csv');

$population = array();

foreach($tempData as $data){
  array_push($population, $data["Population"]);
}

?>
<h1>Hawaii Counties By Population (2018)</h1>
<html>
<head>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <svg height="500" width="960"></svg>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <script>

  var svg = d3.select("svg"),
  margin = {top: 20, right: 20, bottom: 30, left: 40},
  width = +svg.attr("width") - margin.left - margin.right,
  height = +svg.attr("height") - margin.top - margin.bottom;

  var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
  y = d3.scaleLinear().rangeRound([height, 0]);

  var g = svg.append("g")
  .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
  d3.csv("HawaiiStats.csv", function(d) {
    d.Population = +d.Population;
    //Log data array to make sure it works.
    console.log(d);
    return d;
  }, function(error, data) {
    if (error) throw error;

    x.domain(data.map(function(d) { return d.County; }));
    y.domain([0, d3.max(data, function(d) { return d.Population; })]);

    g.append("g")
    .attr("class", "axis axis--x")
    .attr("transform", "translate(0," + height + ")")
    .call(d3.axisBottom(x));

    g.append("g")
    .attr("class", "axis axis--y")
    .call(d3.axisLeft(y).ticks(10))
    .append("text")
    .attr("transform", "rotate(-90)")
    .attr("y", 6)
    .attr("dy", "0.71em")
    .attr("text-anchor", "end")
    .text("Population");

    g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
    .attr("class", "bar")
    .attr("x", function(d) { return x(d.County); })
    .attr("y", function(d) { return y(d.Population); })
    .attr("width", x.bandwidth())
    .attr("height", function(d) { return height - y(d.Population); });
  });

  </script>
</body>
</html>

</table>
