/* window.addEventListener('DOMContentLoaded', (event) => {
  document.getElementsByTagName('body')[0].classList.add('loaded')
})  */

///window.onload = function () {
//  document.getElementsByTagName('body')[0].classList.add('loaded')
//}
/* window.onload = function () {
  var body = document.body;
  body.classList.add("loaded");
} */

window.onscroll = function () { scrollFunction() }

function scrollFunction() {
  mybutton = document.getElementById("myBtn")
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    mybutton.style.display = 'inline'
  } else {
    mybutton.style.display = 'none'
  }
}
function topFunction() {
  document.body.scrollTop = 0 // For Safari
  document.documentElement.scrollTop = 0 // For Chrome, Firefox, IE and Opera
}
// getComputedStyle, решено
var element, elKr
//var flag=false;
window.onload = function () {
  element = getElementById0('nav')
  addEvent('click', element, pokKrij)

  element = getElementById0('olex')
  addEvent('click', element, pokKrij0)

  //document.getElementsByTagName('body')[0].classList.add('loaded')

  document.body.classList.add("loaded")
}

function pokKrij() {
  elKr = getElementById0('nav-ul')
  style = window.getComputedStyle(elKr)
  display = style.getPropertyValue('display')
  //alert(display)
  if (display == "block") {
    elKr.style.display = 'none'
    document.getElementById("navid").style.height = "4em"
  }
  else {
    elKr.style.display = 'block';
    document.getElementById("navid").style.height = "auto"
  }
}
function pokKrij0() {
  elKr = getElementById0('oshte-div')
  style = window.getComputedStyle(elKr)
  display = style.getPropertyValue('display')
  if (display == "block") {
    elKr.style.display = 'none'
    document.getElementById("asideid").style.height = "4em"
  }
  else {
    elKr.style.display = 'block';
    document.getElementById("asideid").style.height = "auto"
  }
}

function copyid(id) {
  copyText = id
  copyText.select()
  document.execCommand("copy")
}
function smenipos(id1, id2) {
  style = window.getComputedStyle(id1)
  display = style.getPropertyValue('display')
  //alert(display)
  if (display == 'block') {
    id1.style.display = 'none'
    id2.style.display = 'block'
  }
  else {
    id1.style.display = 'block'
    id2.style.display = 'none'
  }
}
// TODO:
// стари, да се премахне поддръжката за Експлодъра
function getElementById0(name) {
  var o = document.getElementById
    ? document.getElementById(name) : document.all
      ? document.all[name] : document.layers[name]
  return o
}
function addEvent(event, elem, func) {
  if (elem.addEventListener)  // W3C DOM
    elem.addEventListener(event, func, false)
  else if (elem.attachEvent) { // Експлодър DOM
    elem.attachEvent("on" + event, func)
  }
  else {
    elem[event] = func
  }
}
