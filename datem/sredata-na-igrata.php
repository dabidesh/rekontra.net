<?php
$kat= 'sredata-na-igrata';
$podstr['glavna']= array ('sredata-na-igrata-glavna', false);
$podstr['koga-se-ubivat-pulove']= array ('koga-se-ubivat-pulove', false);
$podstr['koga-ne-se-ubivat-pulove']= array ('koga-ne-se-ubivat-pulove', false);

if ($numGet==1) {
	include $kat.'/'.$podstr['glavna'][0].'.php';
	$podstr['glavna'][1]= true;
}
if ($numGet==2) {
 if ( !isset($_GET['p']) ) { 
  include 'greshka404.php';
  exit (666); 
 }
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
$koga_se= ($podstr['koga-se-ubivat-pulove'][1]==true) ? 'class= "tuke0"' : '';
$koga_ne_se= ($podstr['koga-ne-se-ubivat-pulove'][1]==true) ? 'class= "tuke0"' : '';
$aside='
<ul>
<li><a '.$glavna.' href="?s=sredata-na-igrata" title="Урок 4: Средата на играта на табла" >Главна: средата на играта</a></li>
';
$aside0='
<li><a '.$koga_se.' href="?s=sredata-na-igrata&amp;p=koga-se-ubivat-pulove" >Кога се убиват пулове?</a></li>
<li><a '.$koga_ne_se.' href="?s=sredata-na-igrata&amp;p=koga-ne-se-ubivat-pulove" >Кога не се убиват пулове?</a></li>
</ul>
';


?>
