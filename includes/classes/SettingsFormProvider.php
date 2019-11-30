<?php  
    class SettingsFormProvider{

        public function createUserDetailsForm(){
            $firstNameInput = $this->createFirstNameInput(null);
            $firstLastInput = $this->createLastNameInput(null);
            $emailInput = $this->createEmailInput(null);
            $saveButton= $this->createSaveUserDetailsButton();
 
                return " <form action='processing.php' method = 'POST' enctype='multipart/form-data'>
                    $firstNameInput 
                    $firstLastInput
                    $emailInput
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


    }
?>