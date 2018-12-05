
var item =0;
var itemPaginacion = $(".paginacion li")

/*PAGINACION*/
// al tocar la el ul paginacion tomara el valor del items
$(".paginacion li").click(function(){
item = $(this).attr('item')-1;

movimientoSlide(item);

});

/*Funcion avanzar*/

function Avanzar() {
   if(item == 2){

		item = 0;

	}else{

		item++;
	}
	movimientoSlide(item);
}
/*
Tecla Avanzar
 */

$("#slide #avanzar").click(function() {
Avanzar();
})

/*
Tecla Retroceder
 */

$("#slide #retroceder").click(function() {
	if(item == 0){

		item = 3;

	}else{

		item--;
	}
	movimientoSlide(item);
})


/*
Movimiento del slide
 */
function movimientoSlide(items) {
$("#slide ul").animate({"left": items *-100 + "%"},300);
$(".paginacion li").css({"opacity":.5});
$(itemPaginacion[items]).css({"opacity": 1});
console.log(itemPaginacion);
}
 /*
 Intervalo de tiempo
  */
 
 setInterval(function(){
Avanzar();
 },3000);