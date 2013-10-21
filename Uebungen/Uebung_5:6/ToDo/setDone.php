<?php

if(DEBUG){
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        
}

$hostname = 'localhost';
$username = 'root';
$password = 'vagrant';
$dbname = 'hw';

$dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);     
$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$id = $_GET['done'];

$sql = "UPDATE todos SET Status = 'Done' where ID = :task_id";
$sth = $dbconnect->prepare($sql);
$array = array('task_id'=>$id);
$sth->execute($array);

header("Location: index.php");
?>