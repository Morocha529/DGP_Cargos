$(document).ready(function(){

	(function(){
	//var $loading = $('.loadingDiv');
		
		$.post("php/login.php", { quienllama: "valida_session"})
            .done(function(responde) {
			data=JSON.parse(responde);
			
            if(data['resp'] == true){   /*hay session*/
              
                $("a#a_link_inicio").css("display", "block");
                $("a#a_link_logout").css("display", "block");
                $("a#a_link_login").css("display", "none");
                $("li.nav-item p#p_link_usuario").text('Usuario: '+ data['email']);
            }
        })
    })();
	

	
	/*definicion de variables globales*/
	var nrodni='';
	var apellynomb='';
	var es_regular='';
	var cadena=[];
	// obtener la fecha y la hora actual
	var today = new Date();
	var now = today.toLocaleString();
	now = now.split(',');
	var fechahora=now[0]+' '+now[1]; //concateno elementos de array

		
	$(document).on("ajaxStart", function(){
		$('#loadingDiv').show();
	})
	$(document).on("ajaxStop",function(){
		$('#loadingDiv').hide();
	});

	
	var tabla = $('#tabla-html').DataTable({
		/*"paging": true,*/
		"ordering": false,
		"info": false,
		"searching": false,
		/*"columnDefs": [ {
				"targets": 2,
				"createdCell": function (td, cellData, rowData, row, col) {
				if ( cellData == 'NO' ) {
					$(td).css('color', 'red')
				} else{
					$(td).css('color', 'green')
				}
				$(td).css('text-align', 'center')
					}
				},
				{ className: "dni_class", "targets": [ 0 ] },
				{ className: "apell_nomb_class", "targets": [ 1 ] },
			{
					"targets": [0,1],
					"createdCell": function (td, cellData, rowData, row, col) {
						$(td).css('padding', '5px 0px 5px 30px')
					}
			}
			],
			*/
	});

	function getPersona(){	
		$.ajax({
			//async: false,
			url:'./php/migra-bienes.php',
			dataType:'json',
			type:'post'			
			})
			
		.done(function(respuesta){
			
            //console.log(respuesta);
            const result = JSON.stringify(respuesta);
            cadena = JSON.parse(result);
			            
			if (Array.isArray(cadena)){
				for (var i = 0; i <= cadena.length - 1;  i++) {
					let acciones='';
					//agrego dos elementos al array CADENA
					//cadena[i].dni = dni;	
					//cadena[i].fechahora =fechahora;

					numero_patrimonial = cadena[i].numero_patrimonial;
					descripcion_bien = cadena[i].descripcion_bien;
					fecha_alta = cadena[i].fecha_alta;	
                    valor_bien = cadena[i].valor_bien;	
                    observaciones = cadena[i].observaciones;	

					tabla.row.add([
                        numero_patrimonial,	
                        descripcion_bien, 
					    fecha_alta, 
                        valor_bien, 
                        observaciones
                    ]).draw(true);
				}
			
			}
			else{
				//No es array es OBJETO! GREGO dni y hora
				cadena['dni']= dni;	
				cadena['fechahora'] = fechahora;
				$("span.aviso").text("error: "+cadena['mensaje']+ ", "+cadena['descripcion']);
				}
			})
		.fail( function( jqXHR, textStatus, errorThrown ) {
			if (jqXHR.status == 404) {
				alert('Requested page not found [404]');
		} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
		} else if (textStatus === 'parsererror') {
				alert('Requested JSON parse failed.');
		}else alert('Uncaught Error: ' + jqXHR.responseText);
		});
	}
	/*aca pondria el ajax para grabar los datos en la tabla Merendero_xxx*/
	function insertPersona(){
		$.ajax({
			async: false,
			url:'./php/getpersona.php',
			dataType:'json',
			type:'post',
			data:{'cadena':JSON.stringify(cadena), 'opcion':'insert'}
			})
		}

	$('form').submit(function(e){
		e.preventDefault();
		$("#loadingDiv").toggleClass("loadingDiv");
	     getPersona();
		e.preventDefault();
        //alert('btn submit');
        /*
		$("span.aviso").text('');
		tabla.clear();
		tabla.draw();
		let	dni = $('#inputNroDni').val();

		if (dni.length < 8){
			$("span.aviso").text('el DNI ingresado no es correcto, la longuitud minima requerida son 8 numeros');
		} else {
			
			if (dni.length > 10) {
				dni_array = dni.split('"');
				dni = dni_array[4];
				$("#inputNroDni").val(dni);
			}
			getPersona(dni);
			insertPersona();
			$("#inputNroDni").focus();
		
		}
		$("#inputNroDni").focus();
        */
	});

	$("#inputNroDni").on("click", function () {
		$("#inputNroDni").val('');
		$("span.aviso").text('');
		tabla.clear();
		tabla.draw();
		$(this).focus();
	});

	$("#inputNroDni").keypress(function(e) {
		let code = (e.keyCode ? e.keyCode : e.which);

		if(code==13){
			$("span.aviso").text('');
			tabla.clear();
			tabla.draw();
			let	dni = $('#inputNroDni').val();

			if (dni.length < 8){
				$("span.aviso").text('el DNI ingresado no es correcto, la longuitud minima requerida son 8 numeros');
			} else {
				
				if (dni.length > 10) {
					dni_array = dni.split('"');
					dni = dni_array[4];
					$("#inputNroDni").val(dni);
				}
				getPersona(dni);
				//insertPersona();
				//$("#inputNroDni").focus();
				e.preventDefault();
			}
		}	
	});


});
