function verPlatos(mesa){
	
	ventana=window.open("utilidades/productos.php?mesa="+mesa);

	var mesas = document.getElementsByClassName('mesa');
	var button=document.getElementById(mesa);
	
}
function verMesas(){
	ventana=window.open("utilidades/mesas.php");
}
function verPro(){
	ventana=window.open("utilidades/productos.php");
}




function crearMesa(){
	ventana=window.open("utilidades/crearMesa.php");
}
function crearMesa2(){
	ventana=window.open("crearMesa.php");
}
function crearPlato(){
	ventana=window.open("utilidades/crearPlato.php");
}
function crearPlato2(){
	ventana=window.open("crearPlato.php");
}
function cer(){
	window.close();
}
function repro(){
	document.getElementById('player').play();
}
function addplato(idp,nombre,tiempo,mesa){
	
	var crono = window.opener.document.getElementById('crono'+mesa);	
	mesa=mesa-1;
	var mesas = window.opener.document.getElementsByClassName('mesao');
	var id=Math.floor(Math.random() * (10000 - 1)) + 1;
	var txt="<div id='temp"+id+"' class='temp'>"+nombre+" <b id='h"+id+"'></b>:<b id='m"+id+"'></b>:<b id='s"+id+"'></b><button id='go"+id+"' class='go' onclick='borrarGo("+tiempo+","+id+")'>Go!</button></div>";		
	crono.innerHTML=crono.innerHTML+txt;
	mesas[mesa].style.display="inline";		
}
function cerrar(mesa){
	var mesa =window.opener.document.getElementById(mesa);
	
	window.close();
}
function exit(id){
	var div = document.getElementsByClassName("mesao");	
	var hijos=div[id-1].childNodes.length;
	
	while(hijos>2){
		div[id-1].childNodes[hijos-1].innerHTML="";
		hijos--;
	}	
	div[id-1].style.display="none";		
}

function posicionar(){		
	// zona mesas
    var top=(document.body.clientHeight-180)+"px"; 
    document.getElementById("abajo").style.bottom=0;
    abajo.style.display='inline';
	// zona mesas activas

	// zona controles
	var bottom = document.getElementById('abajo').offsetHeight;
	document.getElementById("controles").style.bottom=bottom;
	//mostramos
	activas.style.display='inline';	
	controles.style.display='inline';
		 
}
function borrarGo(segundos,id){
	
	if(document.getElementById('go'+id)!=null){

		var go=document.getElementById('go'+id);
		go.parentNode.removeChild(go);
	}
	cuentaAtras(segundos,id);
}

function cuentaAtras(segundos,id){

	segundos=segundos-1;
	var minutos=Math.floor(segundos/60);
	var seg=segundos%60;
	var horas = Math.floor(minutos/60);
	minutos = minutos % 60;
	var fh=document.getElementById('h'+id);
	var fm=document.getElementById('m'+id);
	var fs=document.getElementById('s'+id);

	if(seg<0){
		seg=59;
		minutos=minutos-1;
	}
	fs.innerHTML=seg;
	if(minutos<0){
		minutos=59;
		horas=horas-1;
	}
	fm.innerHTML=minutos;
	fh.innerHTML=horas;
	if(horas<0){
		fm.innerHTML=0;
		fs.innerHTML=0;
		fh.innerHTML=0;
		repro();
		
		var div=document.getElementById('temp'+id);
		var textoPL=div.innerHTML;
		/*alert(textoPL);*/
		var match = textoPL.match(/[0-9]/gi);
		var pos = textoPL.indexOf(match[0]);
		var id=div.parentNode.getAttribute("id");
		var mesa=id.substr(1,1);;
		var mensaje="Ha finalizado "+textoPL+" de la mesa "+mesa;
		alert(mensaje);
		div.parentNode.removeChild(div);
		
	}else{
		setTimeout("cuentaAtras("+segundos+","+id+")",1000);
	}	
}
function inicio(){
	centrar();
	requestFullScreen()
	/*posicionar();*/
}
function requestFullScreen() {

  var el = document.body;

  // Supports most browsers and their versions.
  var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen 
  || el.mozRequestFullScreen || el.msRequestFullScreen;

  if (requestMethod) {

    // Native full screen.
    requestMethod.call(el);

  } else if (typeof window.ActiveXObject !== "undefined") {

    // Older IE.
    var wscript = new ActiveXObject("WScript.Shell");

    if (wscript !== null) {
      wscript.SendKeys("{F11}");
    }
  }
}
function launchFullScreen(element) {
	if(element.requestFullScreen) {
	element.requestFullScreen();
	} else if(element.mozRequestFullScreen) {
	element.mozRequestFullScreen();
	} else if(element.webkitRequestFullScreen) {
	element.webkitRequestFullScreen();
	}

}



function centrar(){
	 var div =document.getElementById('contenedor');
	 var height=div.offsetHeight;
	 var width=div.offsetwidth;

	 div.style.position="relative";
	 div.style.top="50%";
	 div.style.bottom="50%";

     document.body.style.marginTop=-(height/2);
     document.body.style.marginLeft=-(width/2);	 
}

function alertDGC(mensaje){
    var dgcTiempo=500
    var ventanaCS='<div class="dgcAlert"><div class="dgcVentana"><div class="dgcMensaje">'+mensaje+'<br><div class="dgcAceptar">Aceptar</div></div></div></div>';
    $('body').append(ventanaCS);
    var alVentana=$('.dgcVentana').height();
    var alNav=$(window).height();
    var supNav=$(window).scrollTop();
    $('.dgcAlert').css('height',$(document).height());
    $('.dgcVentana').css('top',((alNav-alVentana)/2+supNav-100)+'px');
    $('.dgcAlert').css('display','block');
    $('.dgcAlert').animate({opacity:1},dgcTiempo);
    $('.dgcCerrar,.dgcAceptar').click(function(e) {
       $('.dgcAlert').animate({opacity:0},dgcTiempo);
        setTimeout("$('.dgcAlert').remove()",dgcTiempo);
    });
}
window.alert = function (message) {
  alertDGC(message);
};

