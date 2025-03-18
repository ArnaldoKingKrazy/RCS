function logueo_agronomo(){
var url="AGRONOMO/inicio_agronomo.php";
var url2="AGRONOMO/menu_agronomo.php";
var url3="AGRONOMO/top_barra_agronomo.php";

$.post(url,function(response){
    $('#axios-container').html(response);

});
$.post(url2,function(response2){
    $('#axios-menu').html(response2);
});
$.post(url3,function(response3){
    $('#axios-barra').html(response3);
});


}

function siembras_agronomo(){
var url="AGRONOMO/siembras_agronomo.php";
$.post(url,function(response){
    $('#axios-container').html(response);
});
} 

function crear_orden_de_trabajo(id){
var url= "AGRONOMO/orden_de_trabajo.php";
$.post(url,{id:id},function(response){
    $('#axios-container').html(response);
});
}


