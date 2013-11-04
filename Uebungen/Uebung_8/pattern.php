<?php  
  
require 'config.php';


class Post {  
        
        private $id;
        private $created;
        private $title;
        private $content;
        private $version;
        
        // Row Table Gateway
        public function findByID($id) {
                $sql = "SELECT * FROM tbl_person WHERE id = :id";
                $fieldValueMapping = array(':id'=>$id);
                 
                $pquery = prepareSql($sql);
                $pquery->setFetchMode(PDO::FETCH_CLASS, 'Post');
                $pquery = executeSql($pquery, $fieldValueMapping);
                 
                $post = $pquery->fetch();
                $this->setId($post->getId());
                $this->setCreated($post->getCreated());
                $this->setTitle($post->getTitle());
                $this->setContent($post->getContent());
                $this->setVersion($post->getVersion());
        }
        
        public function create() {
                $sql = "INSERT INTO tbl_person (created, title, content, version) VALUES (:created, :title, :content, :version)";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':version'=> $this->getVersion());
        
                $pquery = prepareSql($sql);
                $pquery = executeSql($pquery, $fieldValueMapping);
                $this->setId(getDb()->lastInsertId());
        }
        
        public function update() {
                $sql = "UPDATE tbl_person SET created = :created, title = :title, content = :content, version = :nextVersion WHERE id = :id and version=:version";
                $fieldValueMapping = array(':created'=>$this->getCreated(),':title'=>$this->getTitle(), ':content'=>$this->getContent(), ':nextVersion'=>$this->getVersion() + 1, ':id'=>$this->getId(), 'version'=>$this->getVersion());
                
                $pquery = prepareSql($sql);
                $pquery = executeSql($pquery, $fieldValueMapping);
                
                if($pquery->rowCount() == 0) {
                    throw new Exception("Could not save changes, because object has already been updated, try again");
                }
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
        
        public function setCreated($created)         {
                $this->created = $created;
        }
        
        public function getCreated() {
                return $this->created;
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
        
        public function setVersion($version){
            $this->version = $version;
        }
        
        public function getVersion(){
            return $this->version;
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
            $sql = "INSERT INTO tbl_person (created, title, content, version) VALUES (:created, :title, :content, :version)";
            $fieldValueMapping = array(':created'=>$entry->getCreated(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent(), ':version'=>$entry->getVersion());
    
            $pquery = prepareSql($sql);
            $pquery = executeSql($pquery, $fieldValueMapping);
            $entry->setId(getDb()->lastInsertId());
            return $entry;
    }
    
    public function update($entry) {
            $sql = "UPDATE tbl_person SET created = :created, title = :title, content = :content, version = :nextVersion WHERE id = :id and version = :version";
            $fieldValueMapping = array(':created'=>$entry->getCreated(),':title'=>$entry->getTitle(), ':content'=>$entry->getContent(),':nextVersion'=>$entry->getVersion()+1, ':id'=>$entry->getId(), ':version'=>$entry->getVersion() );

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