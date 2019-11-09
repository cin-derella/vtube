<?php 
    class VideoProcessor{
        private $con;
        private $sizeLimit = 500000000;
        private $allowedTypes = array("mp4","flv","webm","mkv","vob","ogv","avi","wmv","mov","mpeg","mpg");
        private $ffmpegPath = "ffmpeg/ffmpeg";

        private $ffprobePath = "ffmpeg/ffprobe";

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

            if(!$isValidData){
                return false;
            }
            

            if(move_uploaded_file($videoData["tmp_name"],$tempFilePath)){
               // echo "File moved succesfully";
               $finalFilePath = $targetDir . uniqid() . ".mp4";
               
               if(!$this->insertVideoData($videoUploadData,$finalFilePath)){
                    echo "Insert query failed";
                    return false;
               }
               if(!$this->convertVideoToMp4($tempFilePath,$finalFilePath)){
                   echo "Upload failed";
                   return false;
                }   
               if(!$this->deleteFile($tempFilePath)){
                echo "Upload failed\n";
                return false;
                }
            
                if(!$this->generateThumbnails($finalFilePath)){
                echo "Upload failed-could not generate thumbnail\n";
                return false;
                }

            }
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
            else if ($this->hasError($videoData)){
                echo "Error code:".$videoData["error"];
                return  false;
            }

            return true;
        }

        private function isValidSize($data){
            return $data["size"]<=$this->sizeLimit;
        }

        private function isValidType($type){
            $lowercased = strtolower($type);
            return in_array($lowercased,$this->allowedTypes);

        }

        private function hasError($data){
            return $data["error"]!= 0;
        }

        private function insertVideoData($uploadData,$filePath){
            $query = $this->con->prepare("INSERT INTO videos(title,uploadedBy,description,privacy,category,filePath)
                                            VALUES(:title,:uploadedBy,:description,:privacy,:category,:filePath)");
           
            $query->bindParam(":title",$uploadData->title);
            $query->bindParam(":uploadedBy",$uploadData->uploadedBy);
            $query->bindParam(":description",$uploadData->description);
            $query->bindParam(":privacy",$uploadData->privacy);
            $query->bindParam(":category",$uploadData->category);
            $query->bindParam(":filePath",$filePath);

            return $query->execute();
        }
        public function convertVideoToMp4($tempFilePath,$finalFilePath){
            $cmd = "$this->ffmpegPath -i $tempFilePath $finalFilePath 2>&1";
            echo $cmd . "<br>";

            $outputLog = array();
            exec($cmd,$outputLog,$returnCode);

            if($returnCode !=0){
                //command failed
                foreach($outputLog as $line){
                    echo $line . "<br>";
                }
                return false;
            }
            return true;
        }

        private function deleteFile($filePath){
            if(!unlink($filePath)){
                echo "Could not delete file\n";
                return false;
            }
            return true;
        }

        public function generateThumbnails($filePath){
            $thumbnailSize = "210x118";
            $numThumbnails =3;
            $pathToThumbnail = "uploads/videos/thumbnails";

            $duration = $this->getVideoDuration($filePath);
            echo "duration:$duration";

        }
        private function getVideoDuration($filePath){
            return shell_exec("$this->ffprobePath -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $filePath");
        }
    }

?>