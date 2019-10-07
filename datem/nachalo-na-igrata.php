<?php
$kat= 'nachalo-na-igrata';
$podstr['glavna']= array ('nachalo-na-igrata-glavna', false);
$podstr['koga-se-pravyat-sudzhuci']= array ('koga-se-pravyat-sudzhuci', false);

if ($numGet==1) {
	include $kat.'/'.$podstr['glavna'][0].'.php';
	$podstr['glavna'][1]= true;
}
if ($numGet==2) {
 if ( !isset($_GET['p']) ) { 
  include 'greshka404.php';
  exit (666); 
 }



//if ( ($numGet==2) && (!isset($p)) ) {
//  include 'greshka404.php';
//  exit (666); 
//} 
 //if ( isset($_GET['p']) ) { 
  //$p= $_GET['p'];       //filter_var($var, FILTER_SANITIZE_URL)                                     FILTER_SANITIZE_NUMBER_INT
  //$p= (strlen($p) > 30) ? substr($p,0,30): $p; 
  //$p= safeurl($p);
  //echo $p;
 //}
 //else {
 // include 'greshka404.php';
  //exit (666); 
 //}
 if ( isset($podstr[$p]) ) {
  include $kat.'/'.$podstr[$p][0].'.php';
  $podstr[$p][1]= true;
  if ($p!='glavna')
    $kanonichen_p='&amp;p='.$p;
 }
 else {
  include 'greshka404.php';
  exit (666); 
 }
}

$glavna= ($podstr['glavna'][1]==true) ? 'class= "tuke0"' : '';
$koga_se= ($podstr['koga-se-pravyat-sudzhuci'][1]==true) ? 'class= "tuke0"' : '';
  
$aside='
<ul>
<li><a '.$glavna.' href="?s=nachalo-na-igrata" title="Урок 3: Начало на играта на табла" >Главна: начало на играта</a></li>
<li><a '.$koga_se.' href="?s=nachalo-na-igrata&amp;p=koga-se-pravyat-sudzhuci" >Кога се правят суджуци?</a></li>
</ul>
';


?>
