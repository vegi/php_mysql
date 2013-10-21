<?php

$id = $_GET['edit'];

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

      <h1>Update To-Do</h1>
      <p>

     <form class="well form-inline" name='update' action='update.php' method="POST">
      <fieldset>
    <input type="hidden" name="task_id" id="task_id" value="<?php echo $id;?>"></input>
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
    
   
      
      </p>

    </div> 
    
    
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    



  </body>
</html>
