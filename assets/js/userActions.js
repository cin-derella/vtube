function subscribe(userTo,userFrom,button){
    if(userTo == userFrom){
        alert("You cant subscribe to yourself");
        return;
    }

    $.post("ajax/subscribe.php")
    .done(function(){
        
        console.log("done");
    });

}
