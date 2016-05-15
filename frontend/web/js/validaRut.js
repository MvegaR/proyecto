<!--
//BCI Fn


ie = (document.all)? true:false
n6 = (document.getElementById)? true:false

var keycode;
 		  
function enter_key_trap(e)
{
    var keyPressed;

    if (document.layers) {
        keyPressed = String.fromCharCode(e.which);
    } else if (document.all) {
        keyPressed = String.fromCharCode(window.event.keyCode);
    } else if (document.getElementById) {
        keyPressed = String.fromCharCode(e.keyCode);
    }

    if ((keyPressed == "\r" || keyPressed == "\n") && (submit_login())) {
        document.implogin.submit();
    }
}


function checkRutField()
{
	var rut = document.getElementById("docente-id_docente").value;
	var tmpstr = "";
	for ( i=0; i < rut.length ; i++ )
		if ( rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-' )
			tmpstr = tmpstr + rut.charAt(i);
	rut = tmpstr;
	largo = rut.length;
// [VARM+]
	tmpstr = "";
	for ( i=0; rut.charAt(i) == '0' ; i++ );
		for (; i < rut.length ; i++ )
			tmpstr = tmpstr + rut.charAt(i);
	rut = tmpstr;
	largo = rut.length;
// [VARM-]
	if ( largo < 2 )
	{
		alert("Debe ingresar el rut completo.");
		var asdf = document.getElementById("docente-id_docente");
		asdf.focus();
		asdf.select();
		asdf.value="";
		return false;
	}
	for (i=0; i < largo ; i++ )
	{
		if ( rut.charAt(i) != "0" && rut.charAt(i) != "1" && rut.charAt(i) !="2" && rut.charAt(i) != "3" && rut.charAt(i) != "4" && rut.charAt(i) !="5" && rut.charAt(i) != "6" && rut.charAt(i) != "7" && rut.charAt(i) !="8" && rut.charAt(i) != "9" && rut.charAt(i) !="k" && rut.charAt(i) != "K" )
		{
			alert("El valor ingresado no corresponde a un R.U.T valido.");
			var asdf = document.getElementById("docente-id_docente");
			asdf.focus();
			asdf.select();
			asdf.value="";
			return false;
		}
	}
	var invertido = "";
	for ( i=(largo-1),j=0; i>=0; i--,j++ )
		invertido = invertido + rut.charAt(i);
	var drut = "";
	drut = drut + invertido.charAt(0);
	drut = drut + '-';
	cnt = 0;
	for ( i=1,j=2; i<largo; i++,j++ )
	{
		if ( cnt == 3 )
		{
			drut = drut + '.';
			j++;
			drut = drut + invertido.charAt(i);
			cnt = 1;
		}
		else
		{
			drut = drut + invertido.charAt(i);
			cnt++;
		}
	}
	invertido = "";
	for ( i=(drut.length-1),j=0; i>=0; i--,j++ )
		invertido = invertido + drut.charAt(i);
			var asdf = document.getElementById("docente-id_docente");
			asdf.value = invertido;
	if ( checkDV(rut) )
		return true;
	return false;
}

function checkDV( crut )
{
	largo = crut.length;
	if ( largo < 2 )
	{
		alert("Debe ingresar el rut completo.");
		var asdf = document.getElementById("docente-id_docente");
		asdf.value="";
		asdf.focus();
		asdf.select();
		return false;
	}
	if ( largo > 2 )
		rut = crut.substring(0, largo - 1);
	else
		rut = crut.charAt(0);
	dv = crut.charAt(largo-1);
	checkCDV( dv );
	if ( rut == null || dv == null )
		return 0;
	var dvr = '0';
	suma = 0;
	mul = 2;
	for (i= rut.length -1 ; i >= 0; i--)
	{
		suma = suma + rut.charAt(i) * mul;
		if (mul == 7)
			mul = 2;
		else
			mul++;
	}
	res = suma % 11;
	if (res==1)
		dvr = 'k';
	else if (res==0)
		dvr = '0';
	else
	{
		dvi = 11-res;
		dvr = dvi + "";
	}
	if ( dvr != dv.toLowerCase() )
	{
		alert("EL rut es incorrecto.");
		var asdf = document.getElementById("docente-id_docente");
		asdf.focus();
		asdf.value="";
		return false;
	}
		
	return true;
}
function checkCDV( dvr )
{
	dv = dvr + "";
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')
	{
		alert("Debe ingresar un digito verificador valido.");
		var asdf = document.getElementById("docente-id_docente");
		asdf.focus();
		asdf.select();
		asdf.value="";
		return false;
	}
	return true;
}

function valida() {
	var asdf = document.getElementById("docente-id_docente");
	rut_val = asdf.value;
	if ( rut_val.length == 0 ) 
	{
		alert( "Ingrese su R.U.T.");
		asdf.focus();
		return;
	}
	if ( !checkRutField(asdf.value) )
	{	
		return;
	}
	var tmpstr = "";	
	for ( i=0; i < rut_val.length ; i++ )
		if ( rut_val.charAt(i) != ' ' && rut_val.charAt(i) != '.' && rut_val.charAt(i) != '-' )
			tmpstr = tmpstr + rut_val.charAt(i);
	rut_val = tmpstr;
	rut_valor = rut_val.substring(0,rut.length);

	document.w0.rut.value = rut_val.substring(0,rut.length);	
	document.w0.dv.value = rut_val.substring(rut.length,rut.length+1);
	//document.w0.Docente[ID_DOCENTE].value = "";
	if(CheckFields(document.w0.clave.value))
	{document.w0.submit();}
	else
	{return;}
}

//end BCI Fn


function CheckFields(pw) {
  if ( pw == "" ) {
    alert("Por favor ingrese Clave");
    window.document.w0.clave.focus();
    return false;
    }
  return true;
}

function CheckRutDigito(rut, digito) {
  var dvr = '0'
  suma = 0
  mult = 2

  for ( i = rut.length - 1 ; i >= 0 ; i -- ) {
    suma = suma + rut.charAt(i) * mult
    if ( mult == 7 )
      mult = 2
    else
      mult ++
  }
  res = suma % 11
  if ( res == 1 )
    dvr = 'k'
  else {
    if ( res == 0 )
      dvr = '0'
    else {
      dvi = 11 - res
      dvr = dvi + ""
    }
  }
  if ( dvr != digito.toLowerCase() )
    return false;
  return true;
}


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}



function keyDown(e) {
	
	if(ie){
	keycode = event.keyCode
	if(keycode == "13"){
	valida();
		//document.forms.fmr1.but_hidden.value = document.forms.fmr1.buscar.value
		//document.forms.fmr1.submit();
		}
	}else if(n6){
		keycode = e.which;
		if(keycode == "13"){
		valida();
		//document.forms.fmr1.but_hidden.value = document.forms.fmr1.buscar.value
		//document.forms.fmr1.submit();
		}
	
	}
		
}

document.onkeydown = keyDown;



//-->
