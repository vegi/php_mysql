<?php
        
        $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        $tabPrio = $_POST['prio'];
        $tabDate = $_POST['date'];
        $tabTask = $_POST['task'];
        $id = $_POST['task_id'];
        
        
        try{
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        echo 'Connected!';
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sql = "INSERT INTO `todos`(`ID`, `Status`, `Priority`, `Date`, `Task`) VALUES
            ('$id','Open','$tabPrio','$tabDate','$tabTask')";
        
        $dbconnect->exec($sql);
        echo '<br />Record created!';
        }
        catch(PDOException $ex){
        
            echo $sql .'<br />' . $ex->getMessage();
            
        }
        
       
        
       header("Location: index.php");
       ?>
