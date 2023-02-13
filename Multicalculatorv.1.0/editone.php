<?php
$dbhost='localhost';
$dbname='db';
$dbusername='root';
$dbpass='';


$conn =new mysqli($dbhost,$dbusername,$dbpass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ladnr = $_GET['id'];
$sql = "SELECT Start,Dato,Slutt FROM elbil WHERE LadNr =". $ladnr ."";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

function toBrikker($var){
	$a = $var/100;
	$maxCap = 16;
	$b = $a * $maxCap; 
	$brikker=round($b);
	
	return $brikker." (brikker) ";
}
echo "<div class='inputform'>
<form action='' method='post'>
<table>
<tr>
<th>
Start
</th>
<td>
<input type='number' name='scharge' min= '0' max= '16'  value=".toBrikker($row["Start"])."><br>
</td>
</tr>
<tr>
<th>
Slutt
</th>
<td>
<input type='number' name='echarge' min= '0' max= '16'  value=".toBrikker($row["Slutt"])."><br>
</td>
</tr>
<tr>
<th>
Dato
</th>
<td>
<input type='date' name='date' value=".$row["Dato"]."><br>
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type='submit' name='submit' value='Edit'>
</td>
</tr>
</table>
</form>
</div>";



if(isset($_POST['submit'])){
	
$start = $_POST["scharge"];
$start *=6.25;
$slutt = $_POST["echarge"];
$slutt *= 6.25;
$date = $_POST["date"];

 $chargingEfficiency = 95;
 $batteryCapacity = 14.5;
 $electricityCost = 0.15;
 $dollar2nok = 9.92105263;
 
 $chargingCost = $batteryCapacity*$electricityCost/$chargingEfficiency*($slutt-$start)*100/100;
 $toNok= $chargingCost*$dollar2nok;

$updateSql = "UPDATE elbil SET Start =". $start .",Slutt=". $slutt .",Dato='". $date ."',Pris =". $toNok ." WHERE Ladnr=". $ladnr ."";


$result2= $conn->query($updateSql);
if($result){
	 echo '<script>alert("Elbil-ladningen er blitt registert!")</script>';
 }else{
	 echo '<script>alert("Noe gikk galt!")</script>';
 }

}

?>

<html>
<head>
<link href="headerFooter.css" rel="stylesheet" type="text/css">
<style>
body{
	background: rgba(76, 175, 80, 0.2)
	
}
.inputform {
	margin: 0;
    position: absolute;
    top: 40%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
	
}

.container{
	display: inline;
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
}



.contentContainer{
	height: 60%;
	position: relative;
	margin: 0;
	width:50%;
    left:25%;
	top: 20%;
}

.title{
	height: 5em;
	position: relative;
}

.title h1{
	margin: 0;
    position: absolute;
    top: 60%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
}

</style>
</head>
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
<footer>
<p>Copyright ©2023 Multitool Created by Alexandros Messaritakis C.</p>
</footer>
</body>
</html>

