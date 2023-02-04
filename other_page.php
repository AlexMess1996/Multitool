<html>
<style>
table, th, td {
  border:1px solid black;
  text-align: center;
}
</style>
<head><h1>Elbil ladninger</h1></head>


<body>
<table>
<tr>
<th>Dato</th>
<th>Start</th>
<th>Slutt</th>
<th>Pris</th>
</tr>
<tr>
<td>

<?php echo $_POST["dato"];?><br>

</td>
<td>
<?php $scharge = $_POST["scharge"];
	  echo $scharge * 6.25;?>%
</td>
<td>
<?php $echarge = $_POST["echarge"];
	  echo $echarge * 6.25;?>%
</td>
<td>
<p name="pris">
<?php
 $scharge = $_POST["scharge"];
 $scharge *= 6.25;
 $echarge = $_POST["echarge"];
 $echarge *=6.25;
 $chargingEfficiency = 95;
 $batteryCapacity = 14.5;
 $electricityCost = 0.15;
 $dollar2nok = 9.92105263;
 
 $chargingCost = $batteryCapacity*$electricityCost/$chargingEfficiency*($echarge-$scharge)*100/100;
 global $toNok;
 $toNok= $chargingCost*$dollar2nok;
 echo (round($toNok,2)." NOK");
?>
</p>
</td>
</tr>
</table>

<button type="button" onclick="location.href='test.php';">Home</button>
<button type="button" name="submit">Confirm and send</button>

<?php


if(isset($_POST['submit'])){
	$start = $_POST['scharge'];
	$slutt = $_POST['echarge'];
	$pris =  50;
	
	echo $pris;
	
}
?>


</body>

</html>



