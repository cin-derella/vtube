<?php  
    class SettingsFormProvider{

        public function createUserDetailsForm($firstName,$lastName,$email){
            $firstNameInput = $this->createFirstNameInput($firstName);
            $firstLastInput = $this->createLastNameInput($lastName);
            $emailInput = $this->createEmailInput($email);
            $saveButton= $this->createSaveUserDetailsButton();
 
                return " <form action='settings.php' method = 'POST' enctype='multipart/form-data'>
                    <span class ='title'>User details</span>
                    $firstNameInput 
                    $firstLastInput
                    $emailInput
                    $saveButton
              
                </form>";
        }

        public function createPasswordForm(){
            $oldPasswordInput = $this->createPasswordInput("oldPassword","Old password");
            $newPassword1Input = $this->createPasswordInput("newPassword","New password");
            $newPassword2Input = $this->createPasswordInput("newPassword2","Confirm New password");

            $saveButton= $this->createSavePasswordButton();
 
                return " <form action='settings.php' method = 'POST' enctype='multipart/form-data'>
                    <span class ='title'>Update password</span>
                    $oldPasswordInput 
                    $newPassword1Input
                    $newPassword2Input
                    $saveButton
              
                </form>";
        }

        private function createFirstNameInput($value){
            if($value == null) $value="";
            return "<div class='form-group'>
                   
                    <input type='text' class='form-control-file' placeholder='First Name'  name = 'firstName' value = $value required>
                    </div>";
        }

        private function createLastNameInput($value){
            if($value == null) $value="";
            return "<div class='form-group'>
                   
                    <input type='text' class='form-control-file' placeholder='Last Name'  name = 'lastName' value = $value required>
                    </div>";

        }

        private function createEmailInput($value){
            if($value == null) $value="";
            return "<div class='form-group'>
                   
                    <input type='email' class='form-control-file' placeholder='Email'  name = 'email' value = $value required>
                    </div>";

        }

        private function createSaveUserDetailsButton(){
            return "<button type = 'submit' class = 'btn btn-primary' name = 'saveUserDetailsButton'>Save</button>";
        }

        private function createSavePasswordButton(){
            return "<button type = 'submit' class = 'btn btn-primary' name = 'savePasswordButton'>Save</button>";
        }

        
        private function createPasswordInput($name,$placeholder){
            
            return "<div class='form-group'>
                   
                    <input type='password' class='form-control-file' placeholder='$placeholder'  name = '$name'  required>
                    </div>";
        }
    }
?>