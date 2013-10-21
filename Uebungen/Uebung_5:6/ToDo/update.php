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


$prio = $_POST['prio'];
$date = $_POST['date'];
$task = $_POST['task'];
$id = $_POST['task_id'];

$sql = "UPDATE todos SET Priority = :prio, Date = :date, Task = :task where ID = :task_id";
$sth = $dbconnect->prepare($sql);
$array = array(':prio'=>$prio, ':date'=>$date, ':task'=>$task, 'task_id'=>$id);
$sth->execute($array);

header("Location: index.php");
?>
