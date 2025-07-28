
(function(){
    $.get("php/login.php",function(responde) {
        data=JSON.parse(responde);
        console.log(data['resp'] == true);

        if(data['resp'] == true){
            /*hay session*/
            $("a#a_link_inicio").css("display", "block");
            $("a#a_link_logout").css("display", "block");
            $("a#a_link_login").css("display", "none");
            $("li.nav-item p#p_link_usuario").text('Usuario: '+ data['dni']);
        }
    })
})();

var tabla = $('#tabla-html').DataTable({
    dom: 'frtipB',
    buttons: [
        {
            extend: 'pdfHtml5',
            download: 'open'
        }
    ],
    "paging": false,
    "ordering": false,
    "info": false,
    "searching": false,
    "columnDefs": [ {
            "target": 0,
            "createdCell": function (td, cellData, rowData, row, col) {
            if ( rowData[3] === 'historico' ) {
                $(td).css('color', '#fff')
    
            }}
        },
        {  "target": 3,
        "visible": false,
        }  
    ]
});

$("form").submit(function(event){
    event.preventDefault();
    //tabla.ajax.reload();
    var situacion='';
    if($("#check_historico").is(":checked")){
        situacion='historico';
    }else situacion='a_diario';

    tabla.clear();
    tabla.draw();
    let fecha = $('#fecha').val();
    $.ajax({
        url: './php/serialize.php',
        dataType:'json',
        type:'POST',
        data: {fecha:fecha,consultar:situacion}
    })
    .done(function(respuesta){
        const result = JSON.stringify(respuesta);
        cadena = JSON.parse(result);
        for (let clave in cadena) {
            fecha = cadena[clave].fecha;
            salida = cadena[clave].salida;
            cantidad = cadena[clave].cantidad;
            condicion = situacion;
            if (condicion == 'historico'){
                tabla.column( 0 ).visible( false );
            }else  tabla.column( 0 ).visible( true );
                        
            tabla.row.add([fecha, salida, cantidad, condicion]).draw(true);        
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
});

$("#a_link_inicio").click(function(){
    $(location).attr('href', "index.php");
})

