<?php 
class Video{
    private $con,$sqlData,$userLoggedInObj;
    public function __construct($con,$input,$userLoggedInObj){
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;

        if(is_array($input)){
            $this->sqlData = $input;
        }
        else{
            $query = $this->con->prepare("SELECT * FROM videos WHERE id = :id");
            $query->bindParam(":id",$input);
            $query->execute();
    
            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getId(){
        return $this->sqlData["id"];
    }

    public function getUploadedBy(){
        return $this->sqlData["uploadedBy"];
    }

    public function getTitle(){
        return $this->sqlData["title"];
    }

    public function getDescription(){
        return $this->sqlData["description"];
    }

    public function getPrivacy(){
        return $this->sqlData["privacy"];
    }

    public function getFilePath(){
        return $this->sqlData["filePath"];
    }
    public function getCategory(){
        return $this->sqlData["category"];
    }

    public function getUploadDate(){
        return $this->sqlData["uploadDate"];
    }
    public function getViews(){
        return $this->sqlData["views"];
    }

    public function getDuration(){
        return $this->sqlData["duration"];
    }

    public function incrementViews(){
        $views = $this->getViews();
        //echo "<br>views is [$views]<br>";
        if ($views == NULL) {
            //echo "it is null";
            $query = $this->con->prepare("UPDATE videos SET views = 1 WHERE id = :id");
        }
        else {
            $query = $this->con->prepare("UPDATE videos SET views = views + 1 WHERE id = :id");
        }
        
        $query->bindParam(":id",$videoId);

        $videoId = $this->getId();
        

        $query->execute();

        $this->sqlData["views"]=$this->sqlData["views"]+1;
    }    

    public function getLikes(){
        $query = $this->con->prepare("SELECT count(*) as 'count' FROM likes WHERE videoId=:videoId");
        $query->bindParam(":videoId",$videoId);
        $videoId = $this->getId();
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data["count"];
    }

    public function getDislikes(){
        $query = $this->con->prepare("SELECT count(*) as 'count' FROM dislikes WHERE videoId=:videoId");
        $query->bindParam(":videoId",$videoId);
        $videoId = $this->getId();
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data["count"];
    }

    public function like(){
        $id = $this->getId();

        $query = $this->con->prepare("SELECT * FROM likes WHERE username = :username AND videoId = :videoId");
        $query->bindParam(":username",$username);
        $query->bindParam(":videoId",$id);

        $username = $this->userLoggedInObj->getUsername();
        $query->execute();

        if($query->rowCount()>0){
            //User has already liked
            echo "liked";
        }
        else{
            //User has not liked
            $query = $this->con->prepare("INSERT INTO likes(username,videoId) VALUES(:username,:videoId)");
            $query->bindParam(":username",$username);
            $query->bindParam(":videoId",$id);

            $query->execute();

        }
    }
}
?>