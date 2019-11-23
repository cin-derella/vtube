<?php
class Comment{
    private $con,$sqlData,$userLoggedInOjb,$videoId;
    public function __construct($con,$input,$userLoggedInOjb,$videoId){
        if(!is_array($input)){
            $query = $con->prepare("SELECT *FROM comments WHERE id = :id");
            $query->bindParam(":id",$input);
            $query->execute();

            $input = $query->fetch(PDO::FETCH_ASSOC);

        }
        $this->sqlData = $input;
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInOjb;
        $this->videoId = $videoId;
    }

    public function create(){

    }
}

?>