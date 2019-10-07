var kotva= window.location.hash.substr(1);
  if (document.getElementById(kotva)){
    alert(kotva);
    var top = document.getElementById(kotva).offsetTop; 
    window.scrollTo(0, top);
  }



