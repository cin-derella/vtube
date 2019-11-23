<?php
    require_once("../includes/config.php");

    if(isset($_POST['commentText']) && isset($_POST['postedBy'])&& isset($_POST['videoId'])){
        $query = $con->prepare("INSERT INTO comments(postedBy,videoId,responseTo,body)
                                VALUE (:postedBy,:videoId,:responseTo,:body)");
        $query->bindParam(":postedBy",$postedBy);
        $query->bindParam(":videoId",$videoId);
        $query->bindParam(":responseTo",$responseTo);
        $query->bindParam(":body",$commentText);

        echo "<br> [$postedBy][$videoId][$responseTo][$commentText] <br>";
        $postedBy = $_POST['postedBy'];
        $videoId = $_POST['videoId'];
        $responseTo = $_POST['responseTo'];
        $commentText = $_POST['commentText'];

        $query->execute();


        //return new comment html

       
    }
    else{
        echo "One or more parameters are not passed into the subscribe.php file";
    }
?>