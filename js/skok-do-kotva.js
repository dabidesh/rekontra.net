var top;
var k= window.location.hash.substr(1);
var windowY;
var intervalID = window.setInterval(scroli, 1000);
function scroli() {
  windowY= daiWinInnerW();
  if ((document.getElementById(k))&&(windowY>800)){
    top = document.getElementById(k).offsetTop;
    window.scrollTo(0, top);
    window.clearInterval(intervalID);
  }
}
//ширина на джама
//@return W
function daiWinInnerW() {
  var myWidth = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Добър уеб четец
    myWidth = window.innerWidth;
    } else if( document.documentElement && ( document.documentElement.clientWidth ) ) {
    //Експлодър 6+ в режим 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    } else if( document.body && ( document.body.clientWidth ) ) {
    //Експлодър 4
    myWidth = document.body.clientWidth;
  }
  return myWidth;
}


