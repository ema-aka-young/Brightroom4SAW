$(document).ready(function(){
        $("#confirm").keyup(function(){
             if ($("#pass").val() != $("#confirm").val()) {
                 $("#msg").html("Password do not match").css("color","red");
             }else{
                 $("#msg").html("Password matched").css("color","green");
            }
      });
});
/* magari da mettere nel main?*/
