<?php
include("config.php");
//include("test.php"); if i let this uncommented, it will be added to test.php page together with its content
?>

<html>
<head>
 <link href="headerFooter.css" rel="stylesheet" type="text/css">
<style>
body{
	background: rgba(76, 175, 80, 0.2)
	
}
 h1 {
        font-size: 110px;
      }
	  
.container {
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.center-element {
  text-align: center;
}

</style>
</head>


<body>


<header>
<div class = "header-con">
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

<div class = "container">
	<div class= "center-element">
		<h1>Multi-tool</h1>
	</div>
</div>
<footer>
<p>Copyright ©2023 Multi-tool Created by Alexandros Messaritakis C.</p>
</footer>
</body>

</html>
