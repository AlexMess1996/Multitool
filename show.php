<html>
<head>
<style>
body{
	background: rgba(76, 175, 80, 0.2)
	
}
header {
    background-color: #333; /* background color of the header */
    color: white; /* text color */
    padding: 1rem; /* add some padding */
    display: flex; /* use flex layout */
    justify-content: space-between; /* align items to the left and right */
    align-items: center; /* align items vertically */
	margin-right:-8px;
	margin-left:-8px;
	margin-top:-8px;
}

header h1 {
    margin: 0; /* remove margin */
    font-size: 2rem; /* increase font size */
    font-weight: bold; /* make text bold */
}





.container{
	display: inline;
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}


.dropbtn {
  background-color: #333;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
 
}

.dropdown {
  position: relative;
  display: inline-block;
  right:40%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
	background-color: grey;
	
	
	}

.dropdown:hover .dropdown-content  {
	display: block;
	

	
	}

.dropdown:hover .dropdown-content a {
	color:white;
	
	
	}



.dropdown:hover .dropbtn {
	background-color: white;
	color:black;
	}
	
	footer{
	position:fixed;
	bottom:0;
	left:0;
	width:100%;
	background-color: #333;
	color: white;
	padding: 1rem;
	text-align: center;
}



.dropbtn2 {
  background-color: #333;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown2 {
  position: relative;
  display: inline-block;
  right:80%;
}

.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content2 a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content2 a:hover {
	background-color: grey;
	
	
	}

.dropdown2:hover .dropdown-content2  {
	display: block;
	

	
	}

.dropdown2:hover .dropdown-content2 a {
	color:white;
	
	
	}



.dropdown2:hover .dropbtn2 {
	background-color: white;
	color:black;
	}
	
	footer{
	position:fixed;
	bottom:0;
	left:0;
	width:100%;
	background-color: #333;
	color: white;
	padding: 1rem;
	text-align: center;
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
footer{
	position:fixed;
	bottom:0;
	left:0;
	width:100%;
	background-color: #333;
	color: white;
	padding: 1rem;
	text-align: center;
}

</style>
<body>
<header>
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
$sql = "SELECT Dato,Start,Slutt,Pris FROM elbil";

$result = $conn->query($sql);

if($result ->num_rows > 0){
	
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

  echo "</tr>";
		
	}
	echo "</table>";

} else{
	echo "0 results";
}

$conn->close();

?>
</div>
<div class="buttons">
<br><br>

<a href= "test.php">
<button>Registere nytt</button>
</a>
<a href= "edit.php">
<button>Edit</button>
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