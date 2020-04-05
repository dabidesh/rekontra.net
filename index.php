<?php
header("Content-type: text/html; charset=utf-8");

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

$glavenurl= 'https://rekontra.net/';
//$dekae='';
$kanonichen= $glavenurl;
$kanonichen_p='';
$aside='';
$aside0='';
//файл, бр. подстр. (1 - една страница, 2 - n подстраници)
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
$uatStranici['pribirane-i-vzimane']= array ('pribirane-i-vzimane', 1);
$uatStranici['vryzka']= array ('vryzka', 1);
$uatStranici['razni-gnubg']= array ('razni-gnubg', 1);
$uatStranici['knigi-za-tabla']= array ('knigi-za-tabla', 1);
//$uatStranici['']= array ('', 1);
$novi_dumi='
<ul>
<li><a href="?s=rechnik-termini-i-zhargon#barabino" >Барабино</a></li>
<li><a href="?s=rechnik-termini-i-zhargon#sudzhuk" >Суджук</a></li>
<li><a href="?s=rechnik-termini-i-zhargon#begoniya" >Бегония</a></li>
</ul>
';
$novoto='
<ul>
<li><a href="?s=novini#petko" >Петко Костадинов e 2-ри на световното първенство по бекгемън!</a>
</li>
<li><a href="?s=novini#petko1" >Петко Костадинов има нужда от една победа в мач до 13 точки за да стане световен шампион по бекгемън!</a></li>
<li>Редактирана е страницата <a href="?s=knigi-za-tabla" >„Книги за табла“</a>.</li>
<li>Добавена е нова страница <a href="?s=razni-gnubg" >„Разни съвети (30), gnubg анализира“</a>.</li>
<li>Добавена е нова страница <a href="?s=pribirane-i-vzimane" >„Стратегии за прибиране и взимане без и с контакт“</a>.</li>
<li>Редактирана е страницата <a href="?s=nachalo-na-igrata&amp;p=koga-se-pravyat-sudzhuci" >„Кога се правят суджуци?“</a>.</li>
</ul>
';
//$n= count($uatStranici); //=>2

$numGet= count($_GET); //&& ($numGet==1)
//$s='0';
if (isset($_GET['fbclid'])) 
  $numGet--;
//echo $numGet;
if ( (isset($_GET['s'])) && ($numGet<=2) ) {
  $s= $_GET['s'];
  $s= (strlen($s) > 26) ? substr($s,0,26): $s; 
  $s= safeurl($s);
  //echo $s;
  if (isset($_GET['p'])) {
    $p= $_GET['p'];
    $p= (strlen($p) > 32) ? substr($p,0,32): $p; 
    $p= safeurl($p);
    //echo $p;
  }
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
$emailFlag= false;
if(isset($_POST['hidi'])) {
  if ( isset($_POST['ime']) ) {
    $ime= $_POST['ime'];
    $ime= (strlen($ime) > 141) ? substr($ime,0,138).'...' : $ime;
  }
  else
    $ime= '-';
  
  $email= $_POST['email'];
  if (filter_var($email, FILTER_VALIDATE_EMAIL))
    $emailFlag= true;
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
  
$text= safehtml($text);
$ime= safehtml($ime);
$email= safehtml($email);
$zaglavie= safehtml($zaglavie);
$sajt= safehtml($sajt);
$gnubgid= safehtml($gnubgid);
$ne= safehtml($ne);
$hidi= safehtml($hidi);

$agent= $_SERVER['HTTP_USER_AGENT'];
$ip1= $_SERVER['REMOTE_ADDR'];
$ref= $_SESSION['referer'];
$prez= $_SESSION['count'];

$do= 'bradata666@gmail.com';
$otnosno= 'М: '.$zaglavie;  //, bradata666@abv.bg

$cont= "<html><body><pre>";
$cont.= 'Относно:'.$zaglavie."\n";
$cont.= 'Име:'.$ime."\n";
$cont.= 'От где е: '.$action."\n";
if ($emailFlag)
  $cont.=  'Имейл:'.$email."\n";
else
  $cont.=  'Имейл (невалиден):'.$email."\n";
$cont.= 'Сайт: '.$sajt."\n";
$cont.= 'gnubgid:'.$gnubgid."\n";
$cont.= 'Да се публикува ли?: '.$ne."\n";
$cont.=  'Текст:'.$text."\n";

$cont.=  'От где е ? Презареждания:'.$ref.', през.:'.$prez."\n";
$cont.=  'Браузер, ОС:'.$agent."\n";
$cont.=  'IP:'.$ip1."\n";
$cont.= 'hidi='.$hidi."\n";
$cont.= "</pre></body></html>";

$headers= "MIME-Version: 1.0\n";
$headers.= 'Content-type: text/html; charset=utf-8'."\n";
if ($emailFlag) 
  $headers.= 'From: <'.$email.'>'."\n";
else
  $headers.= 'From: Реконтра'."\n";

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
function safehtml($s)
{
    $s=str_replace("&", "&amp;", $s);
    $s=str_replace("<", "&lt;", $s);
    $s=str_replace(">", "&gt;", $s);
    $s=str_replace("'", "&apos;", $s);
    $s=str_replace("\"", "&quot;", $s);
    return $s;
}
function safeurl($s)
{
    $s=str_replace("&", "П", $s);
    $s=str_replace("<", "П", $s);
    $s=str_replace(">", "П", $s);
    $s=str_replace("'", "П", $s);
    $s=str_replace("\"", "П", $s);
    $s=str_replace(".", "П", $s);
    $s=str_replace(" ", "П", $s);
    return $s;
}
?>

<!doctype html>

<html lang="bg">

<head>

 <meta charset="utf-8" />
 <title><?php echo $zaglavie; ?></title>
 <meta name="description" content="<?php echo $opisanie; ?>" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="tabla.rss" type="application/rss+xml" rel="alternate" />
 <link rel="copyright" href="https://creativecommons.org/licenses/by-sa/3.0/" />
 <link rel="stylesheet" href="css/tabla-all-0.1.9.css" media="all" />
 <link rel="stylesheet" href="css/media-site-0.1.7.css" />
 <link href="<?php echo $kanonichen; ?>" rel="canonical" />
 <link rel="shortcut icon" href="favicon.png" type="image/png" />
 <link rel="fluid-icon" href="fluidicon512.png" title="Rekontra" />
 <script src="js/res-kr-0.1.8.js"></script>
 <!--<meta https-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >-->
  <!--[if IE 6]>
  <link rel="stylesheet" href="css/ie6.css">
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <!--[if lte IE 7]>
  <script src="js/skok-do-kotva.js"></script>
  <![endif]-->
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45562256-1', 'rekontra.net');
  ga('send', 'pageview');

</script>
<div id="konti" >
<header>
    <h1><a href="https://rekontra.net/" >Таблата като забавление или спорт — бекгемън</a></h1>
    <p>Стратегии, тактики, съвети и правила в състезателната табла под формата на безплатни уроци</p>
</header>
    <nav>
        <h2 id="nav" >Навигация ▼</h2>
        <ul id="nav-ul" >
        <li class="kr" ><a href="#osn" title="Отива в началото на основното съдържание" >Към основното съдържание</a></li>
        <li class="kr" ><a href="#olex" title="Отива в началото на другите препратки" >Към другите препратки</a></li>
        <li><a <?php if(isset($class_glavna)) echo $class_glavna; ?> href="https://rekontra.net/" title="Главна: най-новото и всичко най-интересно" >Главна</a></li>
            <li><a <?php if(isset($class_osnovni)) echo $class_osnovni; ?> href="?s=osnovni-pravila-kontra" title="Урок 0: Основни правила в състезателната табла. Контра" >Основни правила. Контра</a></li>
            <li><a <?php if(isset($class_rechnik)) echo $class_rechnik; ?> href="?s=rechnik-termini-i-zhargon" title="Урок 1: Речник на термините и жаргонните думи в бекгемъна" >Речник — термини</a></li>
            <li><a <?php if(isset($class_osnovni_strategii)) echo $class_osnovni_strategii; ?> href="?s=osnovni-strategii" title="Урок 2: Основни стратегии и типове игри в таблата" >Основни стратегии</a></li>
            <li><a <?php if(isset($class_nachalo)) echo $class_nachalo; ?> href="?s=nachalo-na-igrata" title="Урок 3: Начало на играта на табла" >Начало на играта</a>
            <?php if (isset($class_nachalo)) echo '
            <input class="input0" type="checkbox" id="toggle-1" />
            <label class="label0" for="toggle-1" >+</label>
            <ul class="submenu">
            '.$aside0; ?>
            </li>
            <li><a <?php if(isset($class_sredata)) echo $class_sredata; ?> href="?s=sredata-na-igrata" title="Урок 4: Стратегии в средата на играта на бекгемън" >Средата на играта</a>
            <?php if (isset($class_sredata)) echo '
            <input class="input0" type="checkbox" id="toggle-1" />
            <label class="label0" for="toggle-1" >+</label>
            <ul class="submenu">
            '.$aside0; ?>
            </li>
            <li><a <?php if(isset($class_smelo)) echo $class_smelo; ?> href="?s=smelo-ili-sigurno" title="Урок 5: Стратегически и тактически критерии за смела или сигурна игра в таблата" >Смело или сигурно?</a>
            <?php if (isset($class_smelo)) echo '
            <input class="input0" type="checkbox" id="toggle-1" />
            <label class="label0" for="toggle-1" >+</label>
            <ul class="submenu">
            '.$aside0; ?>
            </li>
            <li><a <?php if(isset($class_ataka)) echo $class_ataka; ?> href="?s=ataka" title="Урок 6: Игра на атака (блиц). Стратегия за изхвърляне" >Атака</a></li>
            <li><a <?php if(isset($class_bekgejm_napadenie)) echo $class_bekgejm_napadenie; ?> href="?s=bekgejm-napadenie" title="Урок 7: Бекгейм. Защитна игра (нападение)" >Бекгейм (нападение)</a>
            <?php if (isset($class_bekgejm_napadenie)) echo '
            <input class="input0" type="checkbox" id="toggle-1" />
            <label class="label0" for="toggle-1" >+</label>
            <ul class="submenu">
            '.$aside0; ?>
            </li>
            <li><a <?php if(isset($class_pribirane)) echo $class_pribirane; ?> href="?s=pribirane-i-vzimane" title="Урок 8: Стратегии за прибиране и взимане без и с контакт" >Прибиране и взимане</a></li>
            <li><a <?php if(isset($class_razni)) echo $class_razni; ?> href="?s=razni-gnubg" title="Урок 9: Разни съвети (30), gnubg анализира" >Разни съвети (30), gnubg анализира</a></li>
            <li><a <?php if(isset($class_poziciya)) echo $class_poziciya; ?> href="?s=poziciya-na-desetdnevkata" title="Интересни и/или важни позиции от практиктикуването на табла" >Позиция на десетдневката</a></li>
            <li><a <?php if(isset($class_onlajn)) echo $class_onlajn; ?> href="?s=onlajn-tabla" title="Играйте табла в компютърна мрежа с реална противничка!" >Онлайн табла</a></li>
            <li><a <?php if(isset($class_programi)) echo $class_programi; ?> href="?s=programi-za-igra-na-tabla" title="Даунлоуд на програми за игра на табла" >Програми за игра на табла</a></li>
            <li><a <?php if(isset($class_knigi)) echo $class_knigi; ?> href="?s=knigi-za-tabla" title="Информация за книги за табла" >Книги за табла</a></li>
            <li><a <?php if(isset($class_novini)) echo $class_novini; ?> href="?s=novini" title="Новини от света на таблата и новото в rekontra.net" >Новини</a></li>
            <li><a <?php if(isset($class_za_sajta)) echo $class_za_sajta; ?> href="?s=za-sajta" title="Как да се ползва сайта?" >За сайта</a></li>
            <li><a <?php if(isset($class_vryzka)) echo $class_vryzka; ?> href="?s=vryzka" title="Връзка с rekontra.net: имейл, телефон, бланка за съобщения" >Връзка с rekontra.net</a></li>
        </ul>
        
    </nav>
    <article id="osn">
    <?php echo $glavnoto; ?>
    <p><a href="#konti" title="Отива в началото на страницата" >↑ Най-горе</a> | <a href="http://www.save-darina.org/" >Спаси дете!</a><span class="kr" > | <a href="#nav" title="Отива към основната навигация" >Към навигацията</a> | <a href="#olex" title="Отива в началото на другите препратки" >Към другите препратки</a> | <a href="#osn" title="Отива в началото на основното съдържание" >Към основното съдържание</a></span></p>
    <section>
 <h2 id="forma" >Бланка за мнения, въпроси и обратна връзка</h2>
<?php echo $returnText; ?> 
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
<?php if(isset($komentari)) echo $komentari; ?>
</section>
    </article>
    <aside>
        <h2 id="olex" >Още ▼</h2>
        <div id="oshte-div">
        <p><a href="http://www.save-darina.org/" >Спаси дете!</a></p>
         <ul class="kr" >
          <li><a href="#osn" title="Отива в началото на основното съдържание" >Към основното съдържание</a></li>
          <li><a href="#nav" title="Отива към основната навигация" >Към навигацията</a></li>
        </ul>  
        <?php echo $aside.$aside0; ?>
        <div class="img-konti" >
        <a href="?s=sredata-na-igrata&amp;p=koga-se-ubivat-pulove" ><img class="fit" src="tumbs/%D1%87%D0%B0%D0%BA%D0%B0%D0%BD%D0%BA%D0%B0-%D1%83%D0%B1%D0%B8%D0%B2%D0%B0-%D0%BF%D1%83%D0%BB-200.png" alt="Пример за убиване на пулове" /><br/>Пример за убиване на пул</a>
        </div>
        <div class="img-konti" >
        <a href="?s=nachalo-na-igrata&amp;p=koga-se-pravyat-sudzhuci" ><img class="fit" src="tumbs/sudzhuk.png" alt="Позиция, в която се правят суджуци" /><br/>Кога се правят суджуци?</a>
        </div>
        <h2><a href="?s=novini" title="Най-новото в и новини от света на таблата" >Най-новото</a></h2>
        <?php echo $novoto; ?>
        <h2><a href="?s=rechnik-termini-i-zhargon" title="Урок 1: Речник на термините и жаргонните думи в бекгемъна" >Речник</a></h2>
        <?php echo $novi_dumi; ?>
        <div class="img-konti" >
        <a href="?s=smelo-ili-sigurno&amp;p=primeri-za-smela-igra" ><img class="fit" src="tumbs/%D1%81%D0%BC%D0%B5%D0%BB%D0%BE-0.png" alt="Позиция, в която се играе смело" /><br/>Примери за смела игра</a>
        </div>
        <h2>Сайтове за табла</h2>
        <ul>
        <li><a href="http://www.bkgm.com/">Backgammon Galore</a></li>
        <li><a href="http://www.gammoned.com/">GAMMONED.COM</a></li>
        </ul>
    </div>
    </aside>
<footer>
<p><span class="copyleft">&copy;</span> 2013+ | Лиценз: <a href="https://creativecommons.org/licenses/by-sa/3.0/deed.bg" >Криейтив Комънс — Признание — Споделяне на споделеното 3.0</a> | Проверка: <a href="https://www.gnu.org/software/gnubg/" >gnubg</a> | Валиден код: <a href="https://validator.w3.org/check/referer" >html5</a>, <a href="https://jigsaw.w3.org/css-validator/check/referer/" >CSS3</a></p>
        <p>
            <a href="tabla.rss" title="Можете да следите за новото в rekontra.net чрез Вашия rss-четец, tabla.rss" >RSS: абонирайте се за новото в сайта (tabla.rss)</a> | 
            <a href="https://feeds.feedburner.com/rekontra" title="Можете да следите за новото в rekontra.net чрез Вашия rss-четец, feedburner" >RSS: с помощта на feedburner</a> | 
         <a href="https://www.facebook.com/rekontra.net"><img src="tumbs/fb-icon-32.png" alt="Фейсбук икона 32" class="peng" /> Фейсбук</a>
        </p>

<p><a href="https://life.rekontra.net/life0.html" >Играта „Живот“</a> | <a href="http://www.save-darina.org/" >Спаси дете!</a> | <a href="#konti" title="Отива в началото на страницата" >↑ Най-горе</a><span class="kr" > | <a href="#nav" title="Отива към основната навигация" >Към навигацията</a> | <a href="#olex" title="Отива в началото на другите препратки" >Към другите препратки</a> | <a href="#osn" title="Отива в началото на основното съдържание" >Към основното съдържание</a></span></p>
</footer>
</div>
</body>
</html>
