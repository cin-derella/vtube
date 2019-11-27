<?php
require_once("ProfileData.php");

class ProfileGenerator{
    private $con,$userLoggedInObj,$profileUsername;
    public function __construct($con,$userLoggedInObj,$profileUsername){
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
        $this->profileData = new ProfileData($con,$profileUsername);
    }

    public function create(){
        $profileUsername = $this->profileData->getProfileUsername();
        if (!$this->profileData->userExists()){
            return "User does not exist";
        }

        $coverPhotoSection = $this->createCoverPhotoSection();
        $headerSection = $this->createHeaderSection();
        $tabsSection = $this->createTabsSection();
        $ContentSection = $this->createContentSection();

        return "<div class = 'profileContainer'>
                    $coverPhotoSection
                    $headerSection 
                    $tabsSection 
                    $ContentSection
                </div>";
    }

    public function createCoverPhotoSection(){
        $coverPhotoSrc = $this->profileData->getCoverPhoto();
        echo $coverPhotoSrc;
    }

    public function createHeaderSection(){
        
    }

    public function createTabsSection(){
        
    }

    public function createContentSection(){
        
    }

}
?>