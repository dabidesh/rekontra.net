<?php
$kat= 'bekgejm-napadenie';
$podstr['glavna']= array ('bekgejm-napadenie-glavna', false);
$podstr['recirkulaciya-na-silnata-strana']= array ('recirkulaciya-na-silnata-strana', false);

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
$koga_se= ($podstr['recirkulaciya-na-silnata-strana'][1]==true) ? 'class= "tuke0"' : '';
$aside='
<ul>
<li><a '.$glavna.' href="?s=bekgejm-napadenie" title="Урок 4: Бекгейм. Защитна игра (нападение)" >Главна: бекгейм (нападение)</a></li>
<li><a '.$koga_se.' href="?s=bekgejm-napadenie&amp;p=recirkulaciya-na-silnata-strana" >Рециркулация на силната страна</a></li>
</ul>
';


?>
