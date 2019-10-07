<?php
//error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

header("Content-type: text/html; charset= utf-8");
mb_internal_encoding("utf-8");

session_start();
  if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
    if (isset($_SERVER['HTTP_REFERER'])) {
      $_SESSION['referer']= htmlspecialchars(urldecode($_SERVER['HTTP_REFERER']));
    }
    else {
        $_SESSION['referer']= '-';
    }
  } else {
      ++$_SESSION['count'];
    }

$glavenurl= 'http://rekontra.net';
//$dekae='';
$kanonichen= $glavenurl;
$kanonichen_p='';
$aside='';
//файл, бр. подстр.
$uatStranici['glavna']= array ('glavna', 2);
$uatStranici['osnovni-pravila-kontra']= array ('osnovni-pravila-kontra', 1);
$uatStranici['rechnik-termini-i-zhargon']= array ('rechnik-termini-i-zhargon', 1);
$uatStranici['osnovni-strategii']= array ('osnovni-strategii', 1);
$uatStranici['nachalo-na-igrata']= array ('nachalo-na-igrata', 2);
$uatStranici['sredata-na-igrata']= array ('sredata-na-igrata', 2);
$uatStranici['smelo-ili-sigurno']= array ('smelo-ili-sigurno', 2);
$uatStranici['bekgejm-napadenie']= array ('bekgejm-napadenie', 2);
$uatStranici['poziciya-na-desetdnevkata']= array ('poziciya-na-desetdnevkata',1);
$uatStranici['ataka']= array ('ataka', 1);
$uatStranici['onlajn-tabla']= array ('onlajn-tabla', 1);
$uatStranici['programi-za-igra-na-tabla']= array ('programi-za-igra-na-tabla', 1);
$uatStranici['novini']= array ('novini', 1);
$uatStranici['za-sajta']= array ('za-sajta', 1);
//$uatStranici['']= array ('');
$novi_dumi='
<ul>
<li><a href="?s=rechnik-termini-i-zhargon#sudzhuk" >Суджук</a></li>
<li><a href="?s=rechnik-termini-i-zhargon#begoniya" >Бегония</a></li>
<li><a href="?s=rechnik-termini-i-zhargon#mars-pipazh" >Марс-пипаж</a></li>
</ul>
';
$novoto='
<ul>
  <li>Добавена е нова страница <a href="?s=smelo-ili-sigurno&amp;p=primeri-za-smela-igra">„Примери за смела игра в таблата“</a>.</li>
  <li>Добавена е нова страница <a href="?s=bekgejm-napadenie&amp;p=recirkulaciya-na-silnata-strana">„Рециркулация на силната страна в бекгейм“</a>.</li>
  <li>Добавена е нова страница <a href="?s=nachalo-na-igrata&amp;p=koga-se-pravyat-sudzhuci" >„Кога се правят суджуци?“</a>.</li>
</ul>
';
//$n= count($uatStranici); //=>2

$numGet= count($_GET); //&& ($numGet==1)
//$s='0';
if ( (isset($_GET['s'])) && ($numGet<=2) ) {
  $s= $_GET['s'];
}
elseif ($numGet==0) {
  $s= 'glavna';
  $numGet= 1;
}
if ( isset($uatStranici[$s]) ) {
  if ( ($numGet>=2) && ($uatStranici[$s][1]==1) ) {
    include 'greshka404.php';
    exit (666);
  }
  include 'datem/'.$uatStranici[$s][0].'.php';
  $kanonichen.= '?s='.$s.$kanonichen_p;
}  
else {
  include 'greshka404.php';
  //задължително, скрипта продължава и може да стане весело
  exit (666);
}
if (($numGet==1 && $s=='glavna') || ($numGet==2 && $s=='glavna' && $p=='glavna'))
  $kanonichen= $glavenurl;

$greshkaText= '';
$returnText= '';
$greshkaFlag= false;
if(isset($_POST['hidi'])) {
  if ( isset($_POST['ime']) ) {
    $ime= $_POST['ime'];
    $ime= (strlen($ime) > 141) ? substr($ime,0,138).'...' : $ime;
  }
  else
    $ime= '-';
  
  $email= $_POST['email'];
  $zaglavie= $_POST['zaglavie'];
  $sajt= $_POST['sajt'];
  $gnubgid= $_POST['gnubgid'];
  if ( isset($_POST['ne']) ) { 
    $ne= $_POST['ne'];
    $ne= (strlen($ne) > 100) ? substr($ne,0,97).'...' : $ne; 
  }
  else
    $ne='да';
  $hidi= $_POST['hidi'];
  if ( isset($_POST['text']) ) {
    $text= $_POST['text'];
    $text= (strlen($text) > 30003) ? substr($text,0,30000).'...' : $text;
    if ( strlen($text)<4 ) {
      $greshkaText= 'Текстът е къс !';
      $greshkaFlag= true;
    }
    if (strlen($text)==0 ) {
      $text = '--';
      $greshkaText= 'Не е въведен текст !';
      $greshkaFlag= true;
    }
  }
  else {
    $text = '-';
    $greshkaText= 'Не е въведен текст !';
    $greshkaFlag= true;
  }
  
$agent= $_SERVER['HTTP_USER_AGENT'];
$ip1= $_SERVER['REMOTE_ADDR'];
$ref= $_SESSION['referer'];
$prez= $_SESSION['count'];

$do= 'bradata666@gmail.com';
$otnosno= 'Заявка или спам: '.$zaglavie;

$cont= "<html><body><pre>";
$cont.= 'Относно:'.$zaglavie."\n";
$cont.= 'Име:'.$ime."\n";
$cont.= 'От где е: '.$action."\n";
$cont.=  'Имейл:'.$email."\n";
$cont.= 'gnubgid:'.$gnubgid."\n";
$cont.= 'Да се публикува ли?: '.$ne."\n";
$cont.=  'Текст:'.$text."\n";

$cont.=  'От где е ? Презареждания:'.$ref.', през.:'.$prez."\n";
$cont.=  'Браузер, ОС:'.$agent."\n";
$cont.=  'IP:'.$ip1."\n";
$cont.= 'hidi='.$hidi."\n";
$cont.= "</pre></body></html>";
//$cont.= '';

$headers= 'From: tabla@kontra.net'; //.$email;
$headers= "MIME-Version: 1.0\n";
$headers.= 'Content-type: text/html; charset=utf-8';

if ($greshkaFlag) {
  $returnText= '<p class="greshka" >Грешка ! '.$greshkaText.'</p>';
}
else {
  if (mail($do, $otnosno, $cont, $headers)) {     //до, тема, текст     @
    $returnText= '<p class="ubavo" >Бланката е изпратена!</p>';
  }
  else {
    $returnText= '<p class="greshka" >Грешка при изпращането !</p>';
  }
}

}

?>

<!doctype html>

<html lang="bg">

<head>

 <meta charset="utf-8" >
 <title><?php echo $zaglavie; ?></title>
 <meta name="description" content="<?php echo $opisanie; ?>" >
 <link href="tabla.rss" type="application/rss+xml" rel="alternate" />
 <link rel="copyright" href="//creativecommons.org/licenses/by-sa/3.0/" />
 <link rel="stylesheet" type="text/css" title="tabla" media="screen" href="css/tabla.css" >
 <link href="<?php echo $kanonichen; ?>" rel="canonical" />
 <link rel="shortcut icon" href="favicon.png" type="image/png" />
 <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>

<!--  -->
<div id="konti" >

<header> 
    <h1><a href="http://rekontra.net" >Таблата като забавление или спорт — бекгемън</a></h1>
    <p>Стратегии, тактики, съвети и правила в състезателната табла под формата на безплатни уроци</p>
</header>

    <nav>
        <h1>Навигация</h1>
        <ul>
        <li><a <?php if(isset($class_glavna)) echo $class_glavna; ?> href="http://rekontra.net" title="Главна: най-новото и всичко най-интересно" >Главна</a></li>
            <li><a <?php if(isset($class_osnovni)) echo $class_osnovni; ?> href="?s=osnovni-pravila-kontra" title="Урок 0: Основни правила в състезателната табла. Контра" >Основни правила. Контра</a></li>
            <li><a <?php if(isset($class_rechnik)) echo $class_rechnik; ?> href="?s=rechnik-termini-i-zhargon" title="Урок 1: Речник на термините и жаргонните думи в бекгемъна" >Речник — термини</a></li>
            <li><a <?php if(isset($class_osnovni_strategii)) echo $class_osnovni_strategii; ?> href="?s=osnovni-strategii" title="Урок 2: Основни стратегии и типове игри в таблата" >Основни стратегии</a></li>
            <li><a <?php if(isset($class_nachalo)) echo $class_nachalo; ?> href="?s=nachalo-na-igrata" title="Урок 3: Начало на играта на табла" >Начало на играта</a></li>
            <li><a <?php if(isset($class_sredata)) echo $class_sredata; ?> href="?s=sredata-na-igrata" title="Урок 4: Стратегии в средата на играта на бекгемън" >Средата на играта</a></li>
            <li><a <?php if(isset($class_smelo)) echo $class_smelo; ?> href="?s=smelo-ili-sigurno" title="Урок 5: Стратегически и тактически критерии за смела или сигурна игра в таблата" >Смело или сигурно?</a></li>
            <li><a <?php if(isset($class_ataka)) echo $class_ataka; ?> href="?s=ataka" title="Урок 6: Игра на атака (блиц). Стратегия за изхвърляне" >Атака</a></li>
            <li><a <?php if(isset($class_bekgejm_napadenie)) echo $class_bekgejm_napadenie; ?> href="?s=bekgejm-napadenie" title="Урок 7: Бекгейм. Защитна игра (нападение)" >Бекгейм (нападение)</a></li>
        </ul>
        <ul>
            <li><a <?php if(isset($class_poziciya)) echo $class_poziciya; ?> href="?s=poziciya-na-desetdnevkata" title="Интересни и/или важни позиции от практиктикуването на табла" >Позиция на десетдневката</a></li>
            <li><a <?php if(isset($class_onlajn)) echo $class_onlajn; ?> href="?s=onlajn-tabla" title="Играйте табла в компютърна мрежа с реална противничка!" >Онлайн табла</a></li>
            <li><a <?php if(isset($class_programi)) echo $class_programi; ?> href="?s=programi-za-igra-na-tabla" title="Даунлоуд на програми за игра на табла" >Програми за игра на табла</a></li>
            <li><a <?php if(isset($class_novini)) echo $class_novini; ?> href="?s=novini" title="Новини от света на таблата и новото в rekontra.net" >Новини</a></li>
            <li><a <?php if(isset($class_za_sajta)) echo $class_za_sajta; ?> href="?s=za-sajta" title="Как да се ползва сайта?" >За сайта</a></li>
            <li><a href="tabla.rss" title="Можете да следите за новото в rekontra.net чрез Вашия rss-четец" >RSS: абонирайте се за новото в сайта</a></li>
        </ul>
        
    </nav>
    
    <article>
    <?php echo $glavnoto; ?>
    
    <section>
 <h1 id="forma" >Бланка за мнения, въпроси и обратна връзка</h1>
<p>Единственото задължително поле е „текст“ !</p>
<?php echo $blanka; ?>
<form action="#forma" method="post"
id="mnenieForma" >
<p>
<label for="ime">Име и/или прякор: 

<input type="text" name="ime" id="ime"
value="" size="30" maxlength="66"/></label>
</p>
<p>
<label
for="email">Имейл (няма да се публикува): <input type="text" name="email" id="email"
value="" size="30" maxlength="255"/></label>
</p>
<p>
<label for="sajt">Сайт (сървър за игра на табла, соц. мрежа, блог или друга препратка): 
<input type="text" name="sajt" id="sajt"
value="" size="30" /></label>
</p>
<p>
<label for="zaglavie">Заглавие (относно): 
<input type="text" name="zaglavie"
id="zaglavie" value="" size="50" /></label>
<input type="hidden" name="hidi" value="ну" />
</p>
<p>
<label for="gnubgid" >GNUbg ID (идентификатори на позицията и/или мача): 
<input type="text" name="gnubgid" id="gnubgid" value="" size="51" maxlength="51"/></label>
</p>
<p>
<label for="text" ><strong>Текст (българският език се изписва с кирилица):</strong>
<textarea name="text" id="text" cols="60" rows="10" ></textarea></label></p>
                      
<p>                     
 <label for="ne" id="ne0" ><input type="checkbox" id="ne" name="ne" value="не" /> Да не се публикува!</label>                     
</p>                  <?php echo $returnText; ?>
                      <p>
                        <input name="submit"
type="submit" id="submit" value="Изпрaти" title="Изпраща бланката" />
                        <input name="reset" type="reset"
id="reset" value="Изчисти" title="Изчиства полетата"/>
                      </p>
                    </form>
</section>

    
    </article>
        
    <aside>
        <h1>Още</h1>
        <?php echo $aside; ?>
        <a href="?s=osnovni-pravila-kontra" ><img src="tumbs/np1-200.png" alt="Начална позиция в таблата" /><br/>Основни правила. Контра</a>
        <a href="?s=nachalo-na-igrata&amp;p=koga-se-pravyat-sudzhuci" ><img src="tumbs/sudzhuk.png" alt="Позиция, в която се правят суджуци" /><br/>Кога се правят суджуци?</a>
        <h2><a href="?s=novini" title="Най-новото в и новини от света на таблата" >Най-новото</a></h2>
        <?php echo $novoto; ?>
        <h2><a href="?s=rechnik-termini-i-zhargon" title="Урок 1: Речник на термините и жаргонните думи в бекгемъна" >Речник</a></h2>
        <?php echo $novi_dumi; ?>
    </aside>
    
<footer>
<p>Лиценз: <a href="http://creativecommons.org/licenses/by-sa/3.0/deed.bg" >Криейтив Комънс — Признание — Споделяне на споделеното 3.0</a> | Проверка: <a href="http://www.gnubg.org/" >gnubg</a> | Валиден код: <a href="http://validator.w3.org/check/referer" >html5</a> | <a href="http://www.save-darina.org/" >Спаси дете</a></p>
<p><a href="#konti" title="Отива в началото на страницата" >↑ Горе</a></p>
</footer>

</div><!-- konti -->

</body>
</html>
