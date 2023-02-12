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
	width:325px;
}

.buttons {
	width: 200px;

}

.Edit{
	background-color: lightgreen;
}

.Delete{
	background-color: red;
}
</style>
<body>
<header>
<div class = "header-con">
<h1>Multitool</h1>
<div class="dropdown">
  <button class="dropbtn">Register</button>
  <div class="dropdown-content">
    <a href="test.php">Register elbil-ladninger</a>
    <a href="example.php">Register Kvitteringer</a>
  </div>
</div>
<div class="dropdown2">
  <button class="dropbtn2">Show data</button>
  <div class="dropdown-content2">
    <a href="show.php">Datatabel av elbil-ladningene</a>
    <a href="example.php">Datatabel av kvitteringene</a>
  </div>
</div>
</div>
</header>
<div class="container">
<div class="title">
<h1>Elbil-Ladninger</h1>
</div>
<div class= "table">
<?php
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
$sql = "SELECT LadNr,Dato,Start,Slutt,Pris FROM elbil";

$result = $conn->query($sql);

if($result ->num_rows > 0){
	
	echo "<div style='overflow-y:scroll; height:500px;'>";
	echo "<table border='1'>

<tr>

<th>Dato</th>

<th>Start</th>

<th>Slutt</th>

<th>Pris</th>
<th>Edit/Delete</th>

</tr>";
	
	while($row = $result->fetch_assoc()){
		 echo "<tr>";

  echo "<td>" . $row['Dato'] . "</td>";

  echo "<td>" .toBrikker($row["Start"]) . "</td>";

  echo "<td>" . toBrikker($row["Slutt"]). "</td>";

  echo "<td>" . round($row["Pris"],2) . " NOK</td>";
  
  echo "<td> <a href='editone.php?id=". $row['LadNr']. "'><button class='Edit'>Edit</button></a><button class='Delete'>Delete</button></td>";
  

  echo "</tr>";
		
	}
	echo "</table>";
	echo "</div>";
	

} else{
	echo "0 results";
}

$conn->close();

?>
</div>
<div class="buttons">
<br><br>

<a href= "show.php">
<button>Vis tabell</button>
</a>
<br>
<a href= "home.php">
<button>Hjem</button>
</a>
</div>

</div>
<footer>
<p>Copyright ©2023 Multitool Created by Alexandros Messaritakis C.</p>
</footer>
</body>
</head>
</html>