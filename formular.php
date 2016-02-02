<?php

	function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('A', 'Z'));
	
	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	
	    return $key;
	}

	$table = $_POST['btn'];
	$uniqID= random_string(10);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="de" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	margin-top: 0px;
}
.auto-style2 {
	margin-top: 19px;
}
</style>
</head>

<body background="Bierzelt.jpg" style="font-size: 1cm" >

<label id="Label1" style="font-family: Cambria, Cochin, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: xx-large">
Buchungsformular für Tisch: <?php echo $table; ?></label>
<label id="Label2" style="font-family: Cambria, Cochin, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: xx-large">
<br>uniqueID: <?php echo $uniqID; ?></label>
<br>
<form action="skript.php" method="post">
<input id="lbl1" type="hidden" name="table" value="<?php print $table; ?> "style='width: 0cm; height: 0cm'</input>
<table border="0" cellspacing="0" cellpadding="2" class="auto-style2">
  <tbody style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 1cm">
    <tr>
      <td>Anrede:</td>
        <td>
        <input checked="checked" name="Anrede" type="radio" value="Herr" /> Herr
        <input name="Anrede" type="radio" value="Frau" /> Frau
      </td>
    </tr>
    <tr>
      <td>Vorname:</td>
      <td style="height: 29px">
        <input maxlength="50" name="Vorname" size="45" type="text" class="auto-style1" style="height: 31px" />
      </td>
    </tr>
    <tr>
      <td>Nachname:</td>
      <td>
        <input name="Nachname" size="45" type="text" style="height: 33px" />
      </td>
    </tr>
    <tr>
      <td>Email:</td>
      <td>
        <input name="Email" size="45" type="text" style="height: 30px" />
      </td>
    </tr>
    <tr>
      <td style="height: 142px">Mitteilung:</td>
      <td style="height: 142px">
	  <textarea name="Mitteilung" style="width: 273px; height: 128px">Irgendwelche Fragen???</textarea></td>
    </tr>
    <tr>
      	<td></td>
      	<td><button 'type='submit' name='formBtn' value='OK' style='width: 4cm; height: 2cm; font-size: 7mm;' />Ok</td>
    </tr>
    <tr>
		<td></td>
		<td><button 'type='submit' name='formBtn' value='Cancel' style='width: 4cm; height: 2cm; font-size: 7mm;' />Cancel</td>
    </tr>
  </tbody>
</table>
</form>

</body>

</html>

