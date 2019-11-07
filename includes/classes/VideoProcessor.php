<?php 
    class VideoProcessor{
        private $con;
        private $sizeLimit = 500000000;
        private $allowedTypes = array("mp4","flv","webm","mkv","vob","ogv","avi","wmv","mov","mpeg","mpg");

        public function __construct($con){
            $this->con = $con;
        }
        public function upload($videoUploadData){
            $targetDir = "uploads/videos/";
            $videoData = $videoUploadData -> videoDataArray;

            $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);
            //"uploads/videos/5dc045126f608cats_playing.flv
            $tempFilePath = str_replace(" ","",$tempFilePath);

            $isValidData = $this->processData($videoData,$tempFilePath);

        }

        private function processData($videoData,$filePath){
            $videoType = pathInfo($filePath,PATHINFO_EXTENSION);

            if(!$this->isValidSize($videoData)){
                echo "File too large.Can't be more than".$this->sizeLimit."bytes";
                return false;
            }
            else if (!$this->isValidType($videoType)){
                echo "Invalid file type";
                return false;
            }
        }

        private function isValidSize($data){
            return $data["size"]<=$this->sizeLimit;
        }

        private function isValidType($type){
            $lowercased = strtolower($type);
            return in_array($lowercased,$this->allowedTypes);

        }

    }
?>