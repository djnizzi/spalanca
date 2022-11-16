function spalanca(thepage) {
cont=document.getElementById("theif");
cont.src=thepage;
toggleVisibility(document.getElementById("thediv2"));
toggleVisibility(document.getElementById("thediv"));
toggleVisibility(document.getElementById("thediv3"));

}
function chiudi() {
noVisibility(document.getElementById("thediv"));
noVisibility(document.getElementById("thediv2"));
noVisibility(document.getElementById("thediv3"));
cont=document.getElementById("theif");
}
	function getWindowWidth() {
		var windowWidth = 0;
		if (typeof(window.innerWidth) == 'number') {
			windowWidth = window.innerWidth;
		}
		else {
			if (document.documentElement && document.documentElement.clientWidth) {
				windowWidth = document.documentElement.clientWidth;
			}
			else {
				if (document.body && document.body.clientWidth) {
					windowWidth = document.body.clientWidth;
				}
			}
		}
		return windowWidth;
	}
	function toggleVisibility(me){
if ((getWindowWidth()-770)>0) {xpos=Math.round((getWindowWidth()-770)/2);} else {xpos=0;}


		if (me.style.display=="none"){
			me.style.display="block";
if (me==document.getElementById("thediv")){
			me.style.left=xpos+10+"px";} else if (me==document.getElementById("thediv3")) {me.style.left=xpos+721+"px";} else {me.style.left=xpos+"px";}
			}
		}
function noVisibility(me)		 {
			me.style.display="none";
			}

String.prototype.trim = function() {
  return this.replace(/^\s*(\b.*\b|)\s*$/, "$1");
}



function expandit(curobj){
folder=eval ("document.all." + curobj + ".style");
if (folder.display=="none"){
folder.display="";
}
else{
folder.display="none";}
}


function dlrobba(theURL,features){
window.open(theURL,'dlwin',features);}
function dlcotd(theURL){
window.open('dlcotd06.php?cotdfn=' + theURL,'dlcotd','scrollbars=yes,width=600,height=400');}


function addstuff(list1,list2) { 
  var app=navigator.appName; 
  var newone = new Option(list2.options[list2.selectedIndex].text, list2.options[list2.selectedIndex].value); 
 list1.options.add(newone);
 for (i=0; i<list1.length; i++) {
 	list1.options[i].selected=true;
 	}
        list2.value=""
        list2.focus() 
} ;
function removestuff(list1,list2) { 
  for (var j=list1.length-1; j>=0; j--) { 
    if (list1.options[j].selected==true) { 
      list1.options[j]=null 
        list2.focus()
    };
  };
};

function disBut (theel)
{
theel.disabled=true;
}
function isEmail (thestringa)
{
  var filter=/^[A-Za-z][A-Za-z0-9_.-]*@[A-Za-z0-9_-]+\.[A-Za-z0-9_.-]+[A-za-z]$/;
  if (thestringa.length == 0 ) return false;
  if (filter.test(thestringa)) return false;
  else return true;
}

function verSignup (formo) {
        if (formo.newid.value=="") {alert ("username obbligatorio, dove vuoi andare senza?");return false;}
        if (formo.newid.value.length>16) {alert ("username troppo lungo, max 16");return false;
        
        }
        if (formo.pass.value=="") {alert ("password obbligatoria, dove vuoi andare senza?");return false;}
        if (formo.pass.value.length>16) {alert ("password troppo lunga, max 16");return false;}
        if (formo.pass.value!=formo.pas.value) {alert ("conferma bene la password!");return false;}
        if (isEmail(formo.email.value)) {alert ("quello non � un indirizzo e-mail, scrivi bene!");return false;}
        var yoid= new String (formo.newid.value);
        var yoid2=yoid.toLowerCase();
        var yoid3=yoid2.replace(/(<([^>]+)>)/ig,"");
                var yoid4=yoid3.replace(/&nbsp;/ig,"");
                var yoid5=yoid4.replace(/%/ig,"");
               formo.newid.value=yoid5.trim();
                       return true;
        }


function verSignupEd (formo) {
        if (formo.pass.value.length>16) {alert ("password troppo lunga, max 16");return false;}
        if (formo.pass.value!=formo.pas.value) {alert ("conferma bene la password!");return false;}
        if (isEmail(formo.email.value)) {alert ("quello non � un indirizzo e-mail, scrivi bene!");return false;}
        return true;
        }
        
function verRobba (formo) {
        if (formo.title.value=="") {alert ("come un'opera senza un titolo?");return false;}
        if (formo.ptid.options[formo.ptid.selectedIndex].text=='scegline una') {alert ("scegli una categoria!");return false;}
        if (formo.pcontent.value=="") {alert ("scrivi un po' di presentazione, dai!");return false;}
        return true;
        }
        function verSonda (formo) {
  var i;
    for (i=0;i<formo.qs.length;i++){
       if (formo.qs[i].checked){
          return true;}} 
          alert ("scegli qualcosa... e poi vota!");
        return false;
        }
function verCont (formo) {
        if (formo.title.value=="") {alert ("come un'opera senza un titolo?");return false;}
        if (formo.pcontent.value=="") {alert ("scrivi un po' di presentazione, dai!");return false;}
        return true;
        }
        
function verComm (formo) {
        if (formo.content.value=="") {alert ("non puoi inviare un commento vuoto. non ti sembra?");return false;}
        return true;
        }
function verNews (formo) {
	        if (formo.ntitle.value=="") {alert ("dacci un titolo a questa news, no?");return false;}
        if (formo.ncontent.value=="") {alert ("non puoi inviare una news vuota. non ti sembra?");return false;}
        return true;
        }
        function verCotd (formo) {
	        if (formo.cotdalt.value=="") {alert ("dicci chi � questa figa");return false;}
        return true;
        }
        function verForum (formo) {
	        if (formo.thread.value=="") {alert ("vuoi aprire una discussione? ma su cosa?");return false;}
        if (formo.fcontent.value=="") {alert ("stai cominciando una discussione. non hai niente da dire?");return false;}
        return true;
        }
                function verForumEd (formo) {
       if (formo.fcontent.value=="") {alert ("ma non volevi partecipare in questa discussione?");return false;}
        return true;
        }
function cercaCosa (theel) {
        if (theel.value=="") {alert ("s�, ma cerca cosa?");return false;}
        return true;
        }




function redux(theel,theval){
for (i=0;i<theel.options.length;i++){
if (theel.options[i].value==theval) {
theel.options[i].selected=true;
}
}
}

function whattatit (stringa) {
	var spala=new String (document.title);
	document.title= spala + " - " + stringa;
	}

function lowAll(formo) {
var yoid= new String (formo.id.value);
var yoid2=new String (yoid.toLowerCase());
        var yoid3=yoid2.replace(/(<([^>]+)>)/ig,"");
                        var yoid4=yoid3.replace(/&nbsp;/ig,"");
                                        var yoid5=yoid4.replace(/%/ig,"");
               formo.id.value=yoid5.trim();
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_nbGroup(event, grpName) { //v3.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : args[i+1];
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    if ((nbArr = document[grpName]) != null)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = args[i+1];
      nbArr[nbArr.length] = img;
  } }
}
function smilie(thesmilie) {
	
	document.getElementById("line").value += thesmilie+" ";
	document.getElementById("line").focus();
}
function oldsmilie(thesmilie) {
	document.forms[0].sm_chat.value += thesmilie+" ";
	document.forms[0].sm_chat.focus();
}
function scheda(theurl) {
	if(parent.window.opener){parent.window.opener.location=theurl;self.focus()}else{
	window.open(theurl,'lascheda','scrollbars=yes,width=1000,height=600');}
	}
	function high(which2){
theobject=which2
highlighting=setInterval("highlightit(theobject)",50)
}
function low(which2){
clearInterval(highlighting)
if (which2.style.MozOpacity)
which2.style.MozOpacity=0.3
else if (which2.filters)
which2.filters.alpha.opacity=30
}

function highlightit(cur2){
if (cur2.style.MozOpacity<1)
cur2.style.MozOpacity=parseFloat(cur2.style.MozOpacity)+0.1
else if (cur2.filters&&cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=10
else if (window.highlighting)
clearInterval(highlighting)
}