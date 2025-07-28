$(document).ready(function() {

$(".input-login").each(function() { 
    if ($(this).val() != "") {
      $(this).parent().addClass("animation");
    }
});

$(".login-input").focus(function(){
  $(this).parent().addClass("animation animation-color");
    if( $(this).attr("id") == "email"){
  }
});

//Remove animation(s) when input is no longer focused
$(".login-input").focusout(function(){
  if($(this).val() === "")
    $(this).parent().removeClass("animation");
    $(this).parent().removeClass("animation-color");
})

$("#email").on("focus",function(){
   $("#email").removeClass("has-error");
   $("span#textError").html('');
})

$("#password").on("focus",function(){
   $("#password").removeClass("has-error"); 
   $("span#textError").html('');
})
     
$("#loginModal").on("hidden.bs.modal", function () {
     $("#email").removeClass("has-error");
     $("#password").removeClass("has-error"); 
     $("span#textError").html('');
     $("#form_login")[0].reset();
});

})
