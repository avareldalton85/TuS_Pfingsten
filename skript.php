<?php
	$xmlFile = 'status.xml'; 
	$idx = intval($_POST['table']);
	echo $idx . '<br>'; 
	if($_POST['formBtn']== "Cancel") {
		header("Location: Bierzelt.php");
		exit("cancel");
	}
	if (file_exists($xmlFile)) { 
		//$xmlFileStream = simplexml_load_file($xmlFile);
		$xml = simplexml_load_file($xmlFile);

		// new SimpleXMLElement(simplexml_load_file($xmlFile));
		
		foreach ($xml->table as $user ) {
			echo 'Id: ' . $user['id'] . '<br>';   
			echo 'Status: ' . $user->status . '<br>'; 
			if($user['id'] == $idx) {
				echo "reached <br>"; 
				$user->status = "booked";
			}
		}   		
		
		echo $xml->asXML($xmlFile);

		foreach ($xml->table as $user ) {
			echo 'Id: ' . $user['id'] . '<br>';   
			echo 'Status: ' . $user->status . '<br>';   
		}       
	} else { 
	    exit("Datei $xmlFile kann nicht geöffnet werden."); 
	} 
	$empfaenger = "empf@domain.de";
	$betreff = "Die Mail-Funktion";
	$from = "From: Nils Reimers <absender@domain.de>\n";
	$from .= "Reply-To: antwort@domain.de\n";
	$from .= "Content-Type: text/html\n";
	$text = "Hier lernt Ihr, wie man mit <b>PHP</b> Mails
	verschickt";
	 
	mail($empfaenger, $betreff, $text, $from);

	header("Location: Bierzelt.php");	
	exit("ok");
?>