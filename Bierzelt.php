<?php

	$rows = 4;
	$columns = 4;
	$tblWidth = 142;	
	$tblHeigth = 200;
	
	$len = $columns*$rows;
	
	$xmlFile = 'status.xml'; 
	
	if (file_exists($xmlFile)) { 
	$xml = simplexml_load_file($xmlFile); 
	$i = 1;
	foreach ($xml->table as $user ) {
		//echo 'Id: ' . $user['id'] . '<br>';   
		//echo 'Status: ' . $user->status . '<br>';   
		$status[$i] = $user->status;
		$i = $i + 1;
	}   
	for ($i = 1; $i <= $len; $i++) {
		//echo 'Status: ' . $status[$i] . '<br>';
		if($status[$i] == "free") {
			$tableIcon[$i] = "biertisch_free.png";
		}
		if($status[$i] == "booked") {
			$tableIcon[$i] = "biertisch_booked.png";
		}
		//echo $tableIcon[$i] . '<br>';

	}         
	} else { 
	    exit("Datei $xmlFile kann nicht geöffnet werden."); 
	} 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="de" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Tischreservierung</title>
<style type="text/css">
.auto-style1 {
	text-align: right;
}
</style>
</head>

<body background="Bierzelt.jpg" >
<center>
<p><img alt="" height="100%" src="helene.jpg" width="766" align="middle" /></p>
<br />
<form action=formular.php method="post" style="width: 766px">
<?php
//	<input type=submit value="2" name="btn"  style="background: #ccc url(biertisch_booked.png); width: 142px; height: 200px" enableviewstate="false" disabled="disabled">>
//<br />

	for ($k = 1; $k <= $rows; $k++) {
		$shift = $columns*($k-1);
		echo "<form action='formular.php' method='post' style='width: 766px'>";
		for ($i = 1; $i <= $columns; $i++) {
			$idx = $i+$shift;
			//echo "<input name='btn' value='".$i."' type='submit'>"; 
			if($status[$idx] == "free") {
				echo "<input name='btn' value='".$idx."' type='submit'style='background: #ccc url(biertisch_free.png); width: ".$tblWidth."px; height: ".$tblHeigth."px'>";
			}
			if($status[$idx] == "booked") {
				echo "<input name='btn' value='".$idx."' type='submit'style='background: #ccc url(biertisch_booked.png); width: ".$tblWidth."px; height: ".$tblHeigth."px' enableviewstate='false' disabled='disabled'>";
				//echo "enableviewstate='false' disabled='disabled';";
			}
		} 
		echo "<br />;";
	}
?>
<br />
</center>  
</body>

</html>
