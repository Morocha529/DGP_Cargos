
$(document).ready(function(){
    function validar(){
        var respuesta;
        if ($("#email").val().length != 0 ){
            if ($("#password").val().length != 0){
            respuesta=true;        
            }else{
            respuesta=false;
            $("#password").addClass("has-error");
            }
        }else{
            respuesta=false;
            $("#email").addClass("has-error"); 
            
            if($("#password").val().length == 0){
            $("#password").addClass("has-error");
            respuesta=false;
            }};
        return respuesta;
    }
/*LOGIN*/
    $("#btnSiguiente").click(function(event){
        event.preventDefault();
        //if(validar()){
            let email= $("#email").val();
            let password = $("#password").val();
              
       
            $.ajax({
                url:"php/login_server.php", 
                //dataType:"json",
                method: "post",
                //data:{username:username, password:password, quienllama:'login'}
                data:{email:email, password:password}
            })
            .done(function(data){
                console.log(data);
                result = JSON.parse(data);
                console.log(result);
                if ((result["resp"])== true){ 
                
                $("li.nav-item p#p_link_usuario").text('usuario: ' + data['email']);
                    //nav   
                $("a#a_link_login").css("display", "none");
                $("a#a_link_logout").css("display", "block");
                //sidebar
                $("#a_link_ingreso, #a_link_consultadetallada, #a_link_consultatotal").removeClass("disabled-href");
                    
                //$("#loginModal").modal("hide");
                $(location).attr('href', "./Post_Principal.php");

                }else
                    {
                        if ((result['error_password']) == true ){
                            $("span#textError").html('Contraseña Incorrecta!!!');    
                        }else
                            $("span#textError").html('Email Incorrecto!!!');    
                        
                    }
            })
            /*
            .fail( function( jqXHR, textStatus, errorThrown ) {
                $.get("php/close_conexion.php");
                
                if (jqXHR.status == 404) {
                alert('Requested page not found [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (textStatus === 'parsererror') {
                    alert('Requested JSON parse failed.');
                }else alert('Uncaught Error: ' + jqXHR.responseText);
                
            });
            */
        //}
    });
});

