<?php
class NavigationMenuProvider{
    private $con,$userLoggedInObj;
    public function __contruct(){
        $this->con = $con;
        $this->userLoggedInOjb =$userLoggedInObj;
    }

    public function create(){
        $menuHtml = $this->createNavItem("Home","assets/images/icons/home.png","index.php");
        $menuHtml .= $this->createNavItem("Trending","assets/images/icons/trending.png","trending.php");
        $menuHtml .= $this->createNavItem("Subscriptions","assets/images/icons/subscriptions.png","subscriptions.php");
        $menuHtml .= $this->createNavItem("Liked Videos","assets/images/icons/thumb-up.png","likeVideos.php");
   
        if(User::isLoggedIn()){
            $menuHtml .= $this->createNavItem("Settings","assets/images/icons/settings.png","settings.php");
            $menuHtml .= $this->createNavItem("Log out","assets/images/icons/logout.png","logout.php");
        }
        //create subscriptions section
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
}

?>