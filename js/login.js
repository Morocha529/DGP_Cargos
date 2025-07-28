$(document).ready(function() {

(function(){
  var usu_session =$("input#input_aux").val();

  if (usu_session != '' ){
    //hay session, esto deshabilita login
    $("a#a_link_login").addClass("disabled");
    $("a#a_link_bd").removeClass("disabled");
    $("a#a_link_logout").removeClass("disabled");
    //escribe la Usuario
    $("li.nav-item p#usuario").text(usu_session);
    //habilita INPUTS DE BUSQUEDA
    $("form#formDni #inputNroDni").prop("disabled",false);
    $("form#formDni #btnSubmit").prop("disabled", false);
  }
  else{
      //no hay session, esto habilita login
      $("a#a_link_login").removeClass("disabled");
      $("a#a_link_bd").addClass("disabled");
      $("a#a_link_logout").addClass("disabled");
      //escribe la Usuario
      $("li.nav-item p#usuario").text('');
}
})();
/*
$(".input-login").each(function() { 
    if ($(this).val() != "") {
      $(this).parent().addClass("animation");
    }
});
*/
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

$("#email").on("keyup", function() {
   // console.log($('#email').is(':empty'));
    $(this).parent().addClass("animation animation-color");

});

$("#password").on("focus",function(){
   $("#password").removeClass("has-error"); 
   $("span#textError").html('');
})
     
/*$("#loginModal").on("hidden.bs.modal", function () {
     $("#email").removeClass("has-error");
     $("#password").removeClass("has-error"); 
     $("span#textError").html('');
     $("#form_login")[0].reset();
});*/
/*LOGIN*/

/*LOGOUT*/
  $("#a_link_logout").click(function(event){
    event.preventDefault();
    $.ajax({
        url: "php/close.php",     
        type: "POST",       
        dataType:"json",          
    }).done(function(data) {
        //Esto habilita login
        $("a#a_link_login").removeClass("disabled");
        $("a#a_link_bd").addClass("disabled");
        $("a#a_link_logout").addClass("disabled");
        //escribe la Usuario
        $("li.nav-item p#usuario").text('');
    });
  });

  $("#a_link_bd").click(function(){
    $(location).attr('href', "verEntradas.php");
  });

  $('#togglePassword').on('click', function() {
    const isPassword = $('#password').attr('type') === 'password';
    
    $('#password').attr('type', isPassword ? 'text' : 'password');
    $('#toggleIcon').toggleClass('fa-eye fa-eye-slash');
});

})
