<?php

	ini_set("display_errors", 1);
	error_reporting(E_ALL |  E_STRICT);

    if ($_POST['password'] != 'password' && $_POST['username'] != 'username' ) {
      die('Credentials incorrect');
    } else {
        echo "Credentials valid";
    }
    
    $uploaddir = "/vagrant/upload";
    $filename = $uploaddir . "/form.txt";
    
    
$content = array(
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "telefon" => $_POST['telefon'],
    "web" => $_POST['web'],
    "date" => $_POST['date'],
    "prio" => $_POST['prio'],
    "bugtype" => $_POST['bugtype'],
    "text" => $_POST['text'],
    "screenshot" => $_FILES['screenshot']['name'],
    "repro" => $_POST['repro'],
);
    print_r($content);

    
    file_put_contents($filename, $content)

?>
