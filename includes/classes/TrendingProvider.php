<?php
class TrendingProvider{
        private $con,$userLoggedInObj;
        public function __construct($con,$userLoggedInObj){
            $this->con = $con;
            $this->userLoggedInObj = $userLoggedInObj;
}

public funct getVideos(){
    $videos = array();
    $query= $this->con->prepare("SELECT * FROM uploadDate WHERE uploadDate>= now() -INTERVAL 7 DAY
                                ORDER BY views DESC LIMIT 15");
    $query->execute();

    while($row =$query->fetch(PDO::FETCH_ASSOC)){
        $video = new Video($this->con, $row,$this->userLoggedInObj);
        array_push($videos,$video);
    }
    return videos;
}
?>