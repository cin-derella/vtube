function subscribe(userTo,userFrom,button){
    //alert(`subscribe ${userTo} ${userFrom} ${button}`);
    if(userTo == userFrom){
        alert("You cant subscribe to yourself");
        return;
    }

    $.post("ajax/subscribe.php",{userTo: userTo,userFrom: userFrom})
    .done(function(count){
        //alert("subscribe ajax done");
        if(count != null){
            $(button).toggleClass("subscribe unsubscribe");

            var buttonText  = $(button).hasClass("subscribe")? "SUBSCRIBE" : "SUBSCRIBED";
            $(button).text(buttonText + " " +count);
            
        }
        else{
            alert("Something went wrong");
        }
        //alert("return from subscribe");
    });

}
