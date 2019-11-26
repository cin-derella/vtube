<?php
class NavigationMenuProvider{
    private $con,$userLoggedInObj;
    public function __construct($con,$Obj){
        $this->con = $con;
        $this->userLoggedInObj =$Obj;
    }

    public function create(){
        $menuHtml = $this->createNavItem("Home","assets/images/icons/home.png","index.php");
        $menuHtml .= $this->createNavItem("Trending","assets/images/icons/trending.png","trending.php");
        $menuHtml .= $this->createNavItem("Subscriptions","assets/images/icons/subscriptions.png","subscriptions.php");
        $menuHtml .= $this->createNavItem("Liked Videos","assets/images/icons/thumb-up.png","likedVideos.php");
   
        if(User::isLoggedIn()){
            $menuHtml .= $this->createNavItem("Settings","assets/images/icons/settings.png","settings.php");
            $menuHtml .= $this->createNavItem("Log out","assets/images/icons/logout.png","logout.php");

            $menuHtml .=$this->createSubscriptionsSection();
        }
     
     

        return "<div class = 'navigationItems'>
                    $menuHtml
                </div>";
    }

    private function createNavItem($text,$icon,$link){
        return "<div class = 'navigationItem'>
                 <a href ='$link'>
                    <img src = '$icon'>
                    <span>$text</span>
                 </a>

                </div>";

    }

    private function createSubscriptionsSection(){
        //echo "<br>loginObj[".var_dump($this->userLoggedInObj)."]<br>";
        $subscriptions = $this->userLoggedInObj->getSubscriptions();

        $html = "<span class = 'heading'>Subscriptions</span>";

        foreach($subscriptions as $sub){
            $subUsername = $sub->getUsername();
            $html .=$this->createNavItem($subUsername,$sub->getProfilePic(),"profile.php?username=$subUsername");
        }
        return $html;
    }
}

?>