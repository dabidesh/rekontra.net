<?php
$kat= 'smelo-ili-sigurno';
$podstr['glavna']= array ('smelo-ili-sigurno-glavna', false);
$podstr['primeri-za-smela-igra']= array ('primeri-za-smela-igra', false);

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
$primeri_za_smela= ($podstr['primeri-za-smela-igra'][1]==true) ? 'class= "tuke0"' : '';

$aside='
<ul>
<li><a '.$glavna.' href="?s=smelo-ili-sigurno" title="Урок 5: Смело или сигурно?" >Главна: смело или сигурно?</a></li>
<li><a '.$primeri_za_smela.' href="?s=smelo-ili-sigurno&amp;p=primeri-za-smela-igra" >Примери за смела игра</a></li>
</ul>
';


?>
