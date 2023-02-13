<?php
include("config.php");
?>

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

.inputform{
	height: 10em;
    position: relative;
	
	
}

.inputform form{
	margin: 0;
    position: absolute;
    top: 40%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
	
}

.buttons{
	height: 5em;
    position: relative;
}

.buttons button{
	margin: 0;
    position: relative;
    top: 40%;
    left: 50%;
    margin-right: -30%;
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
    <a href="test.php">Register El-car charges</a>
    <a href="example.php">Register receipts (under development)</a>
  </div>
</div>
<div class="dropdown2">
  <button class="dropbtn2">Show data</button>
  <div class="dropdown-content2">
    <a href="show.php">El-car Charging historic </a>
    <a href="example.php">Receipt History (under development)</a>
  </div>
</div>
</div>
</header>
<div class="contentContainer">
<div class="title">
<h1>El-Car Calculator</h1>
</div>
<div class="inputform">
<form action="" method="post">
<table>
<tr>
<th>
<label for="scharge">Initial charge<label/>
</th>
<td>
<input type="number"  name="scharge" min="0" max="16"><br>
</td>
</tr>
<tr>
<th>
<label for="echarge">Final charge<label/>
</th>
<td>
<input type="number"  name="echarge" min="0" max="16"><br>
</td>
</tr>
<tr>
<th>
<label for="date">Date<label/>
</th>
<td>
<input type="date" name="dato"><br>
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" name="submit" value="Register">
</td>
</tr>
</table>
</form>
</div>


<?php
	
if(isset($_POST['submit']))
{
 $dato = $_POST["dato"];
 $scharge = $_POST["scharge"];
 $scharge *= 6.25;
 $echarge = $_POST["echarge"];
 $echarge *=6.25;
 $chargingEfficiency = 95;
 $batteryCapacity = 14.5;
 $electricityCost = 0.15;
 $dollar2nok = 9.92105263;
 
 $chargingCost = $batteryCapacity*$electricityCost/$chargingEfficiency*($echarge-$scharge)*100/100;
 $toNok= $chargingCost*$dollar2nok;
 
 $result = mysqli_query($mysqli,"INSERT into elbil values('','$scharge','$echarge','$toNok','$dato')");
 
 if($result){
	 echo '<script>alert("Elbil-ladningen er blitt registert!")</script>';
 }else{
	 echo '<script>alert("Noe gikk galt!")</script>';
 }
}	

?>
</div>
<footer>
<p>Copyright ©2023 Multitool Created by Alexandros Messaritakis C.</p>
</footer>
</body>

</html>
