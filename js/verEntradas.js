(function(){
    $.get("php/login.php",function(responde) {
        data=JSON.parse(responde);
        console.log(data['resp'] == true);

        if(data['resp'] == true){
            /*hay session*/
            $("a#a_link_inicio").css("display", "block");
            $("a#a_link_logout").css("display", "block");
            /*$("a#a_link_logout").attr('style','display:block;href:php/logout');*/
            $("a#a_link_login").css("display", "none");
            $("li.nav-item p#p_link_usuario").text('Usuario: '+ data['dni']);
        }
    })
  })();

var tabla = $('#tabla-html').DataTable({
    dom: 'frtipB',
    buttons: [
        {
            extend: 'csv',
            download: 'open'
        }
    ],
	"paging": false,
	"ordering": false,
	"info": false,
	"searching": false,
    columnDefs: [{ width: 200, targets: 1 }],
    ajax: {
        url: './php/serialize.php',
        dataType:'json',
        type:'POST',
        data: function (d) {
            d.fecha = $('#fecha').val();
            if( $('#check_todos').is(':checked') ){
                    d.consultar = 'todos';
                }else   if( $('#check_404').is(':checked') ){
                            d.consultar = 'no_existe';
                }else   if( $('#check_regularNO').is(':checked') ){
                            d.consultar = 'regularNO';
                } else d.consultar = 'regular';
            },
        dataSrc: '',
    },
    columns: [
        /*{ data: 'id' },*/
        { data: 'dni' },
        { data: 'apellidonombre' },
        { data: 'fecha' },
        { data: 'hora' },
        { data: 'resultado' }
    ]
});

$("form").submit(function(event){
    event.preventDefault();
    tabla.ajax.reload();
    //tabla.columns.adjust().draw();
});

$("#a_link_inicio").click(function(){
  $(location).attr('href', "index.php");
})

$('#check_404').change(function(){
    $('#check_regularNO').prop( "checked", false );
    $('#check_todos').prop( "checked", false );
})
  
$('#check_regularNO').change(function(){
    $('#check_404').prop( "checked", false );
    $('#check_todos').prop( "checked", false );
})
    
$('#check_todos').change(function(){
    $('#check_404').prop( "checked", false );
    $('#check_regularNO').prop( "checked", false );
})
