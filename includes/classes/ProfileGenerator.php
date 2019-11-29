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
        $name = $this->profileData->getProfileUserFullName();
        return "<div class = 'coverPhotoContainer'>
                    <img src='$coverPhotoSrc' class = 'coverPhoto'>
                    <span class = 'channelName'>$name</span>
                </div>";
    }

    public function createHeaderSection(){
        $profileImage = $this->profileData->getProfilePic();
        $name = $this->profileData->getProfileUserFullName();
        $subCount = $this->profileData->getSubscriberCount();

        $button = $this->createHeaderButton();
        return "<div class = 'profileHeader'>
                    <div class='userInfoContainer'>
                        <img class='profileImage' src = '$profileImage'>
                        <div class='userInfo'>
                            <span class = 'title'>$name</span>
                            <span class = 'subscriberCount'>$subCount subscribers</span>
                        </div>
                    </div>

                    <div class='buttonContainer'>
                        <div class='buttonItem'>
                            $button
                        </div>
                    </div>

                </div>";
    }

    public function createTabsSection(){
        
    }

    public function createContentSection(){
        
    }

    private function createHeaderButton(){
        if($this->userLoggedInObj->getUsername()==$this->profileData->getProfileUsername()){
            return "";
        }
        else{
            return ButtonProvider::createSubscriberButton(
                $this->con,
                $this->profileData->getProfileUserObj(),
                $this->userLoggedInObj);
        }
    }
}
?>