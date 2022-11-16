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
function addstuffgood(list1,list2) { 
   for (i=0; i<list2.length; i++) {
   if  (list2.options[i].selected) {
  var newone = new Option(list2.options[i].text, list2.options[i].value); 
list1.options.add(newone);
 list2.options[i]=null;

i--;
 }
 	}

        list2.value=""
        list2.focus() 
} ;
function addstuffbad(list1,list2) { 
   for (i=0; i<list2.length; i++) {
   if  (list2.options[i].selected) {   	
   	for (j=0; j<list1.length;j++) {   if  (list2.options[i].value==list1.options[j].value) {alert("no, " + list1.options[j].text+" l'hai già messo");return false;}
   	
   	}
var newone = new Option(list2.options[i].text, list2.options[i].value); 
list1.options.add(newone);
 }
 	}

        list2.value=""
        list2.focus() 
}

function removestuffbad(list1,list2) { 
   for (i=0; i<list2.length; i++) {
   if  (list2.options[i].selected) {list2.options[i]=null;}}}   	

function editstuff(list1,list2) { 
   for (j=0; j<list1.length; j++) {
   for (i=0; i<list2.length; i++) {
if  (list1.options[j].value==list2.options[i].value)  {
 list2.options[i]=null; 
 i--;	
 	}  	
   	}}

} 





function verScheda (formo) {
	if (formo.select2) {
	        if (formo.select2.length!=16) {alert ("16 squadre vanno agli ottavi, o no?");return false;} else {for (i=0; i<formo.select2.length; i++) {formo.select2.options[i].selected=true;}}}
	    	 if (formo.select3.length!=8) {alert ("8 squadre vanno ai quarti, o no?");return false;} else {for (j=0; j<formo.select3.length; j++) {formo.select3.options[j].selected=true;}}
	        	        	        if (formo.select4.length!=4) {alert ("4 squadre vanno alle semifinali, o no?");return false;} else {for (j=0; j<formo.select4.length; j++) {formo.select4.options[j].selected=true;}}
	        	        	        	        if (formo.select5.length!=2) {alert ("2 squadre vanno in finale, o no?");return false;} else {for (j=0; j<formo.select5.length; j++) {formo.select5.options[j].selected=true;}}
	        	        	        	        	        if (formo.select6.length!=1) {alert ("il campione è uno solo, o no?");return false;} else {for (j=0; j<formo.select6.length; j++) {formo.select6.options[j].selected=true;}}
	        	        	        	        	        	        if (formo.select7.length!=5) {alert ("puoi indicare solamente 5 goleador");return false;} else {for (j=0; j<formo.select7.length; j++) {formo.select7.options[j].selected=true;}}
	        	        	        	        	        	        	        if (formo.select8.length!=1) {alert ("puoi indicare un solo potenziale espulso");return false;} else {for (j=0; j<formo.select8.length; j++) {formo.select8.options[j].selected=true;}}
        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	          	        	        	        	        	        	        	      
	        	        	        	        	        	        	        return true;
	        }
	        
	        function verSchedaToo (formo) {
	        if (formo.select2.length!=8) {alert ("8 squadre vanno ai quarti, o no?");return false;} else {for (i=0; i<formo.select2.length; i++) {formo.select2.options[i].selected=true;}}
	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	        	          	        	        	        	        	        	        	      
	        	        	        	        	        	        	        return true;
	        }
