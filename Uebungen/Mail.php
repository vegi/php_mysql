<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
Mail sent!	
<body>
<?php
$empfaenger = "kollejer@students.zhaw.ch";
$betreff = "PHP/MySQL_Test";
$text = "Hallo Jaime" . "\r\n" .
        "Das ist nun mit dem PHP Mailer geschickt" . "\r\n" .
        "Gruss". "\r\n" .
        "Jérôme";
$header = "From: kollejer@students.zhaw.ch";
mail($empfaenger, $betreff, $text, $header);
?>
	</body>
</html>