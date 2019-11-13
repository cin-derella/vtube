<?php
class VideoInfoControls{
    private $video,$userLoggedInObj;

    public function __construct($video,$userLoggedInObj){
        $this->video = $video;
        $this->userLoggedInObj = $userLoggedInObj;

    }

    public function create(){

        $likeButton = $this->createlikeButton();
        $dislikeButton = $this->createDislikeButton();

        return "<div class = 'controls'>
            $likeButton
            $dislikeButton
               </div>";
    }

    private function createLikeButton(){
        return "<button>like</button>";
     
    }

    private function createDislikeButton(){
        return "<button>dislike</button>";
    }
}

?>