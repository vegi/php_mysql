<?php
session_start();
	ini_set("display_errors <br>", 1);
	error_reporting(E_ALL |  E_STRICT);

    if ($_POST['password'] != 'password' && $_POST['username'] != 'username' ) {
      die('Credentials incorrect! TIP: smallcase...');
    } else {
        echo "Credentials valid <br>";
    };
    
    if (!empty($_POST['submit'])) {

	if ($_POST['captcha'] == $_SESSION['captcha_spam']) {
		echo "Captcha korrekt! <br/>";
	} else {
		echo 'Du hast den Captcha falsch eingegeben! <br/>';
	};
    }
    $uploaddir = "/var/upload";
    $filename = $uploaddir . "/form.txt";
    $from = "kollejer@students.zhaw.ch";
    $to = "kollejer@students.zhaw.ch";
    
$formcontent = array(
    "username" => $_POST['username'],
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "telefon" => $_POST['telefon'],
    "callback" => $_POST['callback'],
    "web" => $_POST['web'],
    "date" => $_POST['date'],
    "prio" => $_POST['prio'],
    "bugtype" => $_POST['bugtype'],
    "text" => $_POST['text'],
    "screenshot" => $_FILES['screenshot']['name'],
    "repro" => $_POST['repro'],
);
print_r($formcontent, true);

    
if(file_put_contents($filename, print_r($formcontent, true))) {
	echo "Content erfolgreich ins File geschrieben <br>";
};
  
$uploadfile = $uploaddir . "/" . time() . "-" . $_FILES['file']['name'];

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "Datei erfolgreich hochgeladen";
}; 

 require('class.phpmailer.php');

    $mail = new PHPMailer();
     
    $mail->From     = 'bugs@bugs.com';
    $mail->AddAddress($formcontent['email']);
    $mail->Subject  = 'Newly added bug report';
    $mail->AddEmbeddedImage($uploadfile, 'file', 'file');
    $mail->Body     = 'Username: ' . $formcontent['username'] . '\n\n' .
                      'Name: ' . $formcontent['name'] . '\n\n' .
                      'E-Mail: ' . $formcontent['email'] . '\n\n' .
                      'Telefon: ' . $formcontent['telefon'] . '\n\n' .
                      'Callback: ' .$formcontent['callback'] . '\n\n' .
                      'Web: ' . $formcontent['web'] . '\n\n' .
                      'Date: ' . $formcontent['date']. '\n\n' .
                      'Prio: ' . $formcontent['prio'] . '\n\n' .
                      'Bugtype: ' . $formcontent['bugtype']  . '\n\n' .
                      'Text: ' . $formcontent['text'] . '\n\n' .
                      'Reproduzierbar: ' . $formcontent['repro'];
                              
    if(!$mail->Send()) {
            die('Failed to send Email :(');
    } else {
            echo 'Success!';
    }
    
    
?>