window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementsByTagName('body')[0].classList.add('loaded');
});

// оти не работи ? 
var element, elKr;
//var flag=false;
window.onload=function() {
  element= getElementById0('nav');
  addEvent('click', element, pokKrij);
  
  element= getElementById0('olex');
  addEvent('click', element, pokKrij0);
}

function pokKrij() {
    elKr= getElementById0('nav-ul');
    //alert(elKr.style.display);
    if (elKr.style.display == "block") {
      elKr.style.display= 'none';
      document.getElementById("navid").style.height = "4em";
    }
    else {
      elKr.style.display= 'block';
      document.getElementById("navid").style.height = "auto";
    }
}
function pokKrij0() {
    elKr= getElementById0('oshte-div');
    if (elKr.style.display == "block") {
      elKr.style.display= 'none';
      document.getElementById("asideid").style.height = "4em";
    }
    else {
      elKr.style.display= 'block';
      document.getElementById("asideid").style.height = "auto";
    }
}

function copyid(id) {
  var copyText = id;
  copyText.select();
  document.execCommand("copy");
}


function getElementById0(name) {
var o= document.getElementById
? document.getElementById(name) : document.all
? document.all[name] : document.layers[name];
return o;
}
function addEvent(event, elem, func) {
   if (elem.addEventListener)  // W3C DOM
      elem.addEventListener(event,func,false);
   else if (elem.attachEvent) { // Експлодър DOM
      elem.attachEvent("on"+event, func);
   }
   else {
      elem[event] = func;
   }
}
