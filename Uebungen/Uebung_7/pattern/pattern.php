<?php  
  
require 'config.php';


class Post {  
        
        private $id;
        private $author;
        private $title;
        private $content;
        
        // Row Table Gateway
        public function findByID($id) {
                $sql = "SELECT * FROM tbl_person WHERE id = :id";
                $fieldValueMapping = array(':id'=>$id);
                 
                $pquery = prepareSql($sql);
                $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
                $pquery = executeSql($pquery, $fieldValueMapping);
                 
                $post = $pquery->fetch();
                $this->setId($post->getId());
                $this->setAuthor($post->getAuthor());
                $this->setTitle($post->getTitle());
                $this->setContent($post->getContent());
        }
        
        public function create() {
                $sql = "INSERT INTO tbl_person (author, title, content) VALUES (:author, :title, :content)";
                $fieldValueMapping = array(':author'=>$this->getAuthor(),':title'=>$this->getTitle(), ':content'=>$this->getContent());
        
                $pquery = prepareSql($sql);
                $pquery = executeSql($pquery, $fieldValueMapping);
                $this->setId(getDb()->lastInsertId());
        }
        
        public function update() {
                $sql = "UPDATE tbl_person SET author = :author, title = :title, content = :content WHERE id = :id";
                $fieldValueMapping = array(':author'=>$this->getAuthor(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':id'=>$this->getId());
                
                $pquery = prepareSql($sql);
                $pquery = executeSql($pquery, $fieldValueMapping);
        }
        
        public function delete() {
                $sql = "DELETE FROM tbl_person  WHERE id=:id";
                $fieldValueMapping = array(':id'=>$this->getId());
                 
                $pquery = prepareSql($sql);
                $pquery = executeSql($pquery, $fieldValueMapping);
        }
        
        // getters and setters
        
        public function setId($id)         {
                $this->id = $id;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function setAuthor($author)         {
                $this->author = $author;
        }
        
        public function getAuthor() {
                return $this->author;
        }
        
        public function setTitle($title)         {
                $this->title = $title;
        }
        
        public function getTitle() {
                return $this->title;
        }
        
        public function setContent($content)         {
                $this->content = $content;
        }
        
        public function getContent() {
                return $this->content;
        }
        
}



class PostTableGateway {  
        
    public function findByID($id) {
            $sql = "SELECT * FROM tbl_person WHERE id = :id";
            $fieldValueMapping = array(':id'=>$id);
            
            $pquery = prepareSql($sql);
            $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $pquery = executeSql($pquery, $fieldValueMapping);
            
            return $pquery->fetch();
    }
    
    public function findByAttribute($attribute, $value) {
            $sql = "SELECT * FROM tbl_person WHERE $attribute = :$attribute";
            $fieldValueMapping = array(":$attribute"=>$value);
            
            $pquery = prepareSql($sql);
            $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $pquery = executeSql($pquery, $fieldValueMapping);
             
            return $pquery->fetchAll();
    }
    
    public function findAll() {
            $sql = "SELECT * FROM tbl_person";
             
            $pquery = prepareSql($sql);
            $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
            $pquery = executeSql($pquery, array());
    
            return $pquery->fetchAll();
    }
    
    public function create($entry) {
            $sql = "INSERT INTO tbl_person (author, title, content) VALUES (:author, :title, :content)";
            $fieldValueMapping = array(':author'=>$entry->getAuthor(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent());
    
            $pquery = prepareSql($sql);
            $pquery = executeSql($pquery, $fieldValueMapping);
            $entry->setId(getDb()->lastInsertId());
            return $entry;
    }
    
    public function update($entry) {
            $sql = "UPDATE tbl_person SET author = :author, title = :title, content = :content WHERE id = :id";
            $fieldValueMapping = array(':author'=>$entry->getAuthor(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent(), ':id'=>$entry->getId());

            $pquery = prepareSql($sql);
            $pquery = executeSql($pquery, $fieldValueMapping);
            return $entry;
    }
    
    public function delete($entry) {
            $sql = "DELETE FROM tbl_person  WHERE id=:id";
            $fieldValueMapping = array(':id'=>$entry->getId());
            
            $pquery = prepareSql($sql);
            $pquery = executeSql($pquery, $fieldValueMapping);
    }
}

?>