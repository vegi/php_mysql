<?php
 
 	session_start(); 
	unset($_SESSION['captcha_spam']); 

	// Funktion um zufälligen String zu generieren //
	function rand_string($length=5) {
		$str = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 1, 2, 3, 4, 5, 6, 7, 8, 9);
		for ($i = 1; $i <= (count($str)*2); $i++) {
			$swap = mt_rand(0,count($str)-1); $tmp = $str[$swap]; $str[$swap] = $str[0]; $str[0] = $tmp;
		}
		return substr(implode('', $str),0,$length);
	}

	$text = rand_string(5);  // Anzahl der Stellen //

	$_SESSION['captcha_spam'] = $text; // Den Captcha Code in einem Session Cookie speichern //
    
	// Header: Mitteilen, dass es sich um ein Bild handelt und dass dieses nicht im Cache gespeichert werden soll //
	//header('Expires: Mon, 26 Jul 1990 05:00:00 GMT');
	//header("Last-Modified: ".date("D, d M Y H:i:s")." GMT");
	//header('Cache-Control: no-store, no-cache, must-revalidate');
	//header('Cache-Control: post-check=0, pre-check=0', false);
	//header('Pragma: no-cache');
	header('Content-type: image/png');

	// Captcha Bild erstellen, Text schreiben & Bild darüber legen //
	$img = ImageCreateFromPNG('bg_captcha.png'); // Pfad zum Hintergrundbild //
	$color = ImageColorAllocate($img, 0, 0, 0); // Farbe (R,G,B) für die Schrift //
	$ttf = '../captcha/Classica-Bold.ttf'; // Pfad zur Schriftart //
	$ttfsize = 25; // Schriftgröße //
	$angle = mt_rand(0,5); // Winkel (Gerade/Ungerade) //
	$t_x = mt_rand(5,20);  // X-Position //
	$t_y = 35; // Y-Position //
	imagettftext($img, $ttfsize, $angle, $t_x, $t_y, $color, $ttf, $text);
	imagecopy($img, ImageCreateFromPNG('bg_captcha_over.png'), 0, 0, 0, 0, 140, 40);
	imagepng($img); 
	imagedestroy($img); 
?>