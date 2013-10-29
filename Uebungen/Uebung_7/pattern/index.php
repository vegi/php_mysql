<?php
require 'pattern.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="patterns" content="">
    <meta name="Jérôme Koller" content="">

    <title></title>
  </head>

  <body>
        <?php 
                
                
                echo '<h1>TableGateway</h1>';
                
                $tableGateway = new PostTableGateway;

                
                foreach ($tableGateway->findAll() as $post) {
                        $tableGateway->delete($post);
                }
                
                $firstPost = new Post;
                $firstPost->setAuthor("Awesome");
                $firstPost->setTitle("1. TableGateway Eintrag");
                $firstPost->setContent("Erster Eintrag mit Table Gateway Pattern");
                $tableGateway->create($firstPost);
                
                $secondPost = new Post;
                $secondPost->setAuthor("Useless");
                $secondPost->setTitle("2. TableGateway Eintrag");
                $secondPost->setContent("Zweiter Eintrag mit Table Gateway Pattern");
                $tableGateway->create($secondPost);
                
                
                $thirdPost = new Post;
                $thirdPost->setAuthor("Trist");
                $thirdPost->setTitle("3. TableGateway Eintrag");
                $thirdPost->setContent("Nochmals ein Eintrag...");
                $tableGateway->create($thirdPost);
                
                
                echo '<h3>Aktuelle DB Einträge</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                foreach ($tableGateway->findAll() as $post) {
                        echo '<tr><td>'.$post->getAuthor().'</td><td>'
                        .$post->getTitle().'</td><td>'.$post->getContent().'</td></tr>';       
                }
                echo '</table>';
                
                
                echo '<h3>Aktuelle Einträge mit dem Author = Awesome:</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                foreach ($tableGateway->findByAttribute('author', 'Awesome') as $post) {
                        echo '';
                        echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                                '</td><td>'.$post->getContent().'</td></tr>';
                }
                echo '</table>';
                
                
                echo '<h3>Aktuelle Einträge in der DB mit der ID = '.$secondPost->getId().'</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                $post = $tableGateway->findById($secondPost->getId());
                
                echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                        '</td><td>'.$post->getContent().'</td></tr>';
                
                echo '</table>';
                                
                echo '<h3>Eintrag mit der ID = '.$post->getId().' wird aktualisiert........................</h3>';
                
                $post->setContent("Neuer Inhalt mit erfrischendem Text");
                $tableGateway->update($post);
                
                echo '<h3>Aktualisierter Eintrag in der DB mit der ID = '.$post->getId().'</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                $post = $tableGateway->findById($post->getId());
                
                echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                        '</td><td>'.$post->getContent().'</td></tr>';
                echo '</table><br />';
                
                echo '<hr>';
                
                echo '<h1>RowGateway</h1>';
                
                $firstPost = new Post;
                $firstPost->setAuthor("ZHAW");
                $firstPost->setTitle("1. Row Gateway Eintrag");
                $firstPost->setContent("Das ist der Inhalt des Row Gateway Eintrages");
                $firstPost->create();
                
                
                $secondPost = new Post;
                $secondPost->setAuthor("Dojo");
                $secondPost->setTitle("2. Row Gateway Eintrag");
                $secondPost->setContent("Suuuuuuupeeeeeeeer");
                $secondPost->create();
                
                
                $thirdPost = new Post;
                $thirdPost->setAuthor("Joker");
                $thirdPost->setTitle("3. Row Gateway Eintrag");
                $thirdPost->setContent("der dritte...");
                $thirdPost->create();
                
                         
                echo '<h3>Aktuelle Einträge in der DB... </h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                foreach ($tableGateway->findAll() as $post) {
                echo '';
                echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                        '</td><td>'.$post->getContent().'</td></tr>';
                
                }
                echo '</table>';

                
                echo '<h3>Aktuelle Einträge in der DB mit der ID = '.$secondPost->getId().'</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                $post = new Post;
                $post->findById($secondPost->getId());
                echo '';
                echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                        '</td><td>'.$post->getContent().'</td></tr>';
                echo '</table>';

                
                echo '<h3>Eintrag mit der ID = '.$post->getId().' wird aktualisiert........................</h3>';
                $post->setContent("Supreeeeme Victory");
                $post->update();
                
                
                echo '<h3>Aktualisierter Eintrag in der DB mit der ID = '.$post->getId().'</h3>';
                echo '<table border="5">';
                echo '<tr><th>Author</th><th>Title</th><th>Content</th></tr>';
                $post = new Post;
                $post->findById($secondPost->getId());
                echo '';
                echo '<tr><td>'.$post->getAuthor().'</td><td>'.$post->getTitle().
                        '</td><td>'.$post->getContent().'</td></tr>';
                echo '</table>';
                
                foreach ($tableGateway->findAll() as $post) {
                        $post->delete();
                }
        ?>
  </body>
</html>