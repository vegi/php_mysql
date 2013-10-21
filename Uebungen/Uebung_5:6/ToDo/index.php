<?php
if(DEBUG){
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        date_default_timezone_set('Europe/Zurich');
}
        function showTasks(){

        $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sth = $dbconnect->prepare("SELECT * FROM `todos` WHERE 1");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $value) { 
        
            echo "<tr><td> " .$value['ID'] . "</td><td> " . $value['Status'] . "</td>
                <td> ". $value['Priority'] . "</td><td> " .$value['Date'] . "</td><td> " .
                    $value['Task'] . "</td><td><a href='edit.php?edit=".$value['ID'] ."'>edit</a></td>
                        <td><a href='index.php?delete=" .$value['ID'] ."'>delete</a></td>
                            <td><a href='setDone.php?done=" .$value['ID']."'>Task Done</a></td></tr>" ;
        
}
        }
        
        function deleteTask(){
        $id = $_GET['delete'];
        
        $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM todos WHERE ID=:id";
        $sth = $dbconnect->prepare($sql);
        $sth->execute(array(':id'=>$id));
}
        
        
        if (isset($_GET['delete'])) {
                        deleteTask();
        }
        
        function showAllOpen(){
        $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sth = $dbconnect->prepare("SELECT * FROM todos WHERE Status = 'Open'");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $value) { 
        
            echo "<tr><td> " .$value['ID'] . "</td><td> " . $value['Status'] . "</td>
                <td> ". $value['Priority'] . "</td><td> " .$value['Date'] . "</td><td> " .
                    $value['Task'] . "</td><td><a href='edit.php?edit=".$value['ID'] ."'>edit</a></td>
                        <td><a href='index.php?delete=" .$value['ID'] ."'>delete</a></td>
                            <td><a href='setDone.php?done=" .$value['ID']."'>Task Done</a></td></tr>" ;
        
}
        
        }
        
        function showAllDone(){
        $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sth = $dbconnect->prepare("SELECT * FROM todos WHERE Status = 'Done'");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $value) { 
        
            echo "<tr><td> " .$value['ID'] . "</td><td> " . $value['Status'] . "</td>
                <td> ". $value['Priority'] . "</td><td> " .$value['Date'] . "</td><td> " .
                    $value['Task'] . "</td><td><a href='edit.php?edit=".$value['ID'] ."'>edit</a></td>
                        <td><a href='index.php?delete=" .$value['ID'] ."'>delete</a></td>
                            <td><a href='setDone.php?done=" .$value['ID']."'>Task Done</a></td></tr>" ;
        
}
        
        }
        
function deleteAll(){
    $hostname = 'localhost';
        $username = 'root';
        $password = 'vagrant';
        $dbname = 'hw';
        
        
        $dbconnect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
       
        $dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $sth = $dbconnect->prepare("TRUNCATE TABLE todos");
        $sth->execute();
        
        header("Location: index.php");
    
}        
            
        

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>To-Do for ZHAW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="To-Do App" content="">
    <meta name="Jérôme Koller" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">My To-Dos</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>To-Do List</h1>
      <p>

     <form class="well form-inline" action="addTask.php" method="POST">
      <fieldset>
    <input type="text" name="task" id="task" class ="span5" required placeholder="Type in your Task description :)"></input>
    <label> Priority </label>
      <label class="control-label" for="select01"></label>
      <select name ="prio" id="prio" class="span2">
    <option value="Low">Low</option>
    <option value="Medium">Medium</option>
    <option value="High">High</option>
      </select>
    
    <input type="date" name="date" placeholder="Date" required>

    </input>
    <input class="btn btn-primary" id ="addButton" value="Submit" type="submit"></input>
    
  </fieldset>
    </form>
      <div><a href="index.php?allOpen">All Open Tasks</a></div>
      <div><a href="index.php?allDone">All Completed Tasks</a>
          <div><a href="index.php">Show All</a></div>
      </div>
    <table class="table table-striped table-bordered" id="toDoList">
      <colgroup>
    <col width="3%"> 
    <col width="7%">
    <col width="7%">
    <col width="9%">
    <col width="55%">
    </colgroup>
    <thead>
    <tr>
    <th name ="tabId" id ="tabId">ID</th>
    <th name ="tabStatus"id ="tabStatus">Status</th>
    <th name ="tabPrio" id ="tabPrio">Priority</th>
    <th name ="tabDate" id ="tabDate">Date</th>
    <th name ="tab"id ="tabTask">Task</th>
    
    </tr>
  </thead>
  <tbody id ="entries">
    
    <?php
    if(!isset($_GET['allOpen'])&&(!isset($_GET['allDone']))){
        echo showTasks();
    }
    
    if(isset($_GET['allOpen'])){
         echo   showAllOpen();
        }
    if(isset($_GET['allDone'])){
            echo showAllDone();
        }
    if(isset($_GET['deleteAll'])){
        echo deleteAll();
        echo showTasks();
    }    
        
    ?>
    
    
    
    
    </table>
      <p><a href="index.php?deleteAll">Delete All Entries</a></p>  
      </p>

    </div> 
    
    
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    



  </body>
</html>
