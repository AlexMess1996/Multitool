<?php
include("config.php");
?>

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
</head>


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
<div class="contentContainer">
<div class="title">
<h1>Elbil-kalkulator</h1>
</div>
<div class="inputform">
<form action="" method="post">
<table>
<tr>
<th>
<label for="scharge">Start<label/>
</th>
<td>
<input type="number"  name="scharge" min="0" max="16"><br>
</td>
</tr>
<tr>
<th>
<label for="echarge">Slutt<label/>
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

<div class="buttons">
<a href="home.php">
<button>Hjem</button>
</a>
<br>
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
