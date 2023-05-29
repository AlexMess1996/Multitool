<html>
<head>
<link href="headerFooter.css" rel="stylesheet" type="text/css">
<style>
body{
	background: rgba(76, 175, 80, 0.2)
	
}

.container{
	display: inline;
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}





.table{
	inline: 1;
	background-color: white;
	
}



</style>
<body>

<header>

<div class = "header-con">
<h1>Multitool</h1>
<div class ="hometab">
<form action ="./home.php">
<button class="btn">Home</button>
</form>
</div>
<div class="dropdown">
  <button class="dropbtn">Register</button>
  <div class="dropdown-content">
    <a href="test.php">Register El-car charges</a>
    <a href="example.php">Register receipts (under development)</a>
  </div>
</div>
<div class="dropdown2">
  <button class="dropbtn2">Show data</button>
  <div class="dropdown-content2">
    <a href="show.php">El-car Charging historic</a>
    <a href="example.php">Receipt History (under development)</a>
  </div>
</div>
</div>
</header>
<div class="container">
<div class="title">
<h1>El-car Charging Tab</h1>
</div>
<div class= "table">
<?php
$GLOBALS['check'] = false;
$GLOBALS['a'] = 5;
$GLOBALS['month'] = 0;



function toBrikker($var){
	$a = $var/100;
	$maxCap = 16;
	$b = $a * $maxCap; 
	$brikker=round($b);
	
	return $brikker." (brikker) ";
}

$dbhost='localhost';
$dbname='db';
$dbusername='root';
$dbpass='';


$conn =new mysqli($dbhost,$dbusername,$dbpass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Dato,Start,Slutt,Pris FROM elbil WHERE MONTH(Dato) = 1;";

$result = $conn->query($sql);

if(isset($_POST['search'])){
	$a = 10;
	$month = $_POST["month"];
	$sqls = "SELECT Dato,Start,Slutt,Pris FROM elbil WHERE MONTH(Dato) = '$month';";
	$results = $conn->query($sqls);
	
} 

if($a == 10){
	if($results ->num_rows > 0){
	$sum = 0;
	echo "<table border='1'>
	

<tr>

<th>Dato</th>

<th>Start</th>

<th>Slutt</th>

<th>Pris</th>

</tr>";
	
	while($row = $results->fetch_assoc()){
		 echo "<tr>";

  echo "<td>" . $row['Dato'] . "</td>";

  echo "<td>" .toBrikker($row["Start"]) . "</td>";

  echo "<td>" . toBrikker($row["Slutt"]). "</td>";

  echo "<td>" . round($row["Pris"],2) . " NOK</td>";
	$sum += round($row["Pris"],2);
  echo "</tr>";
  
	}
	echo "<tr>";
	echo "<th> Totalt: </th>";
  echo "<td>" . $sum . " NOK</td>";
  echo "</tr>";
	echo "</table>";

} else{
	echo "0 results";
}
	
}else{
	if($result ->num_rows > 0){
	$sum = 0;
	echo "<table border='1'>
	

<tr>

<th>Dato</th>

<th>Start</th>

<th>Slutt</th>

<th>Pris</th>

</tr>";
	
	while($row = $result->fetch_assoc()){
		 echo "<tr>";

  echo "<td>" . $row['Dato'] . "</td>";

  echo "<td>" .toBrikker($row["Start"]) . "</td>";

  echo "<td>" . toBrikker($row["Slutt"]). "</td>";

  echo "<td>" . round($row["Pris"],2) . " NOK</td>";
	$sum += round($row["Pris"],2);
  echo "</tr>";
  
	}
	echo "<tr>";
	echo "<th> Totalt: </th>";
  echo "<td>" . $sum . " NOK</td>";
  echo "</tr>";
	echo "</table>";

} else{
	echo "0 results";
}

}








echo "</div>
<div class='buttons'>
<br><br>

<a href= 'test.php'>
<button>Register</button>
</a>
<a href='edit.php?id=".$month."'>
<button>Edit</button>
</a>";

$conn->close();
?>
<br>
<form action="show.php" method="post">
<select size="1" name="month">
 <optgroup label="Choose a month">
	<option value="1">January</option>
	<option value="2">February</option>
	<option value="3">March</option>
	<option value="4">April</option>
	<option value="5">May</option>
	<option value="6">Juny</option>
	<option value="7">July</option>
	<option value="8">August</option>
	<option value="9">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
</select>


<input type="submit" value="Search" name="search">
</form>



</div>

</div>
<footer>
<p>Copyright ©2023 Multitool Created by Alexandros Messaritakis C.</p>
</footer>
</body>
</head>
</html>