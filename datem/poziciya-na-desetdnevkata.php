<?php
$zaglavie='Позиция на десетдневката. Задачи по табла';
$opisanie='Интересни и/или важни позиции от практикатикуването на табла под формата на задачи.';
$class_poziciya= 'class="tuke"';
$action= '?s='.$s;
$blanka='
<p>Коментирайте позициите! Предложете позиция!</p>
';
$glavnoto='
<h2>Позиция на десетдневката</h2>
<p>На всеки 10 дни се публикува интересна и/или важна позиция от практикуването на табла.</p>
<article id="poz2">
<h2>Задача 2: Взаимен холдинг</h2>
<p>Позиция 2 е от мач между Бил Робърти и Пол Магрил (зелени) в далечната 1986 година. Представлява взаимен <a href="?s=osnovni-strategii#holding">холдинг</a> – и двамата табладжии имат задържащи капии. Обикновено не е правилно да се напуска задържаща капия когато сте назад, но алтернативата е да се дадат един или два уязвими голи пула. При 22/13 пак са два, но поне са в <a href="?s=rechnik-termini-i-zhargon#kyshta">къщата</a> на Бил.</p>
<figure class="img-konti" >   
<img class="fit" src="tumbs/%D1%85%D0%BE%D0%BB%D0%B4%D0%B8%D0%BD%D0%B3-2-%D0%B3%D0%BE%D0%BB%D0%B8.png" alt="Взаимен холдинг" />
<figcaption>П2. Резултат: 3 на 3(до 21). Пипаж: 171(зелени), 163(червени); разлика: 8(4.9%).</figcaption>
</figure>
<button onclick="copyi2()">Копирай</button>
<label for="idg2">GNUbg ID (кликнете за избор, после копирайте и поставете в gnubg):
<input type="text" class="pozi" id="idg2" value="Position ID: cGfkgCHgc/AADQ Match ID: cImyAjAAGAAE" readonly/>
</label>
<script>
function copyi2() {
  var copyText = document.getElementById("idg2");
  copyText.select();
  document.execCommand("copy");
}
</script>
<p>Файлове: <a href="pozicii/10/%D0%B2%D0%B7%D0%B0%D0%B8%D0%BC%D0%B5%D0%BD-%D1%85%D0%BE%D0%BB%D0%B4%D0%B8%D0%BD%D0%B3-2-%D0%B3%D0%BE%D0%BB%D0%B8.sgf" title="Позицията в ГНУ Бекгемън формат" >sgf с анализ 4 ply</a>, <a href="pozicii/10/%D0%B2%D0%B7%D0%B0%D0%B8%D0%BC%D0%B5%D0%BD-%D1%85%D0%BE%D0%BB%D0%B4%D0%B8%D0%BD%D0%B3-2-%D0%B3%D0%BE%D0%BB%D0%B8.pos" title="Позицията в Джелифиш формат" >pos</a></p>
<h3 id="otg2" >Правилен ход на позиция 2: Взаимен холдинг</h3>
<p>Сигурното 22/13 е грешно, защото Пол ще бъде атакуван понеже:</p> 
<ol>
<li><a href="?s=rechnik-termini-i-zhargon#kyshta">къщата</a> на Бил е по-силна.</li>
<li>Има котва – капия в къщата на Пол.</li>
<li><a href="?s=rechnik-termini-i-zhargon#zatvornik">Затворниците</a> му са повече.</li>
</ol>
<p>Това са 3 много силни <a href="?s=smelo-ili-sigurno#vsichki">критерия за смела игра</a>. Все пак 22/13 е втория по сила ход, но <a href="?s=rechnik-termini-i-zhargon#rolaut">ролаута</a> (2 хода в дълбочина, 1296 изигравания) дава, че е 4-ти.</p>
<p>21/16 прави <a href="?s=rechnik-termini-i-zhargon#bilder">билдер</a> за правене на капия във външното поле на Пол. Ако не мести този <a href="?s=rechnik-termini-i-zhargon#zatvornik">затворник</a>, има опасност Бил да се стовари с капия върху него (има огън от три). Освен това ще бъде атакуван при всички случаи. 13/9 направо атакува за капия – <a href="?s=rechnik-termini-i-zhargon#slot">слот</a>. Освен това дублира 4-ката.</p>
<div class="rest">
<table class="poz" >
<caption>Най-добрите ходове за позиция 2</caption>
  <tr class="tek" >
    <th><abbr title="Вероятност за победа" >В. за поб.</abbr></th>
    <th><abbr title="Вероятност за победа с марс" >В. за марс</abbr></th>
    <th><abbr title="Вероятност за победа с бекгемън" >В. за бг.</abbr></th>
    <th><abbr title="Вероятност за загуба" >В. за заг.</abbr></th>
    <th><abbr title="Вероятност за загуба с марс" >Заг. с марс</abbr></th>
    <th><abbr title="Вероятност за загуба с бекгемън" >Заг. с бг.</abbr></th>
    <th><abbr title="Вероятност за Спечелване на Мача" >ВСМ</abbr></th>
    <th><abbr title="Разлика" >Разл.</abbr></th>
    <th>Ход</th>
  </tr>
  <tr>
    <td>38.5</td>
    <td>8.1</td>
    <td>0.2</td>
    <td>61.5</td>
    <td>18.6</td>
    <td>0.8</td>
    <td>48.06%</td>
    <td>0</td>
    <td>21/16 13/9</td>
  </tr>
  <tr class="tek" >
    <td>38.4</td>
    <td>7.5</td>
    <td>0.2</td>
    <td>61.6</td>
    <td>21.8</td>
    <td>0.8</td>
    <td>47.84%</td>
    <td>-0.22%</td>
    <td>22/13</td>
  </tr> 
  <tr>
    <td>37.2</td>
    <td>7.7</td>
    <td>0.2</td>
    <td>62.8</td>
    <td>19.7</td>
    <td>0.9</td>
    <td>47.79%</td>
    <td>-0.27%</td>
    <td>21/16 6/2</td>
  </tr> 
  <tr class="tek" >
    <td>37.4</td>
    <td>7.4</td>
    <td>0.2</td>
    <td>62.6</td>
    <td>19.9</td>
    <td>0.9</td>
    <td>47.79%</td>
    <td>-0.27%</td>
    <td>21/16 8/4</td>
  </tr> 
  <tr>
    <td>35.3</td>
    <td>7.9</td>
    <td>0.2</td>
    <td>64.7</td>
    <td>19.9</td>
    <td>0.9</td>
    <td>47.53%</td>
    <td>-0.54%</td>
    <td>13/9 13/8</td>
  </tr> 
</table>
</div>
</article>
<article id="poz1">
<h2>Задача 1: Време ли е за камикадзе?</h2>
  <p>Мача е 1 на 1 до 3 точки. Контриращото кубче е установено на 2 още в началото на партията, което е нормално за този резултат — играта е единична. Зелените са притиснати силно в <a href="?s=osnovni-strategii#bekgejm" >бекгейм</a> със силна блокада на червените и имат лош <a href="?s=rechnik-termini-i-zhargon#tajming" >тайминг</a>.</p>    
<figure>   
<table class="dska" >
<tr><td colspan="15"><img src="html-images/b-hitop.png" class="block" alt="+-24-23-22-21-20-19-+---+-18-17-16-15-14-13-+" /></td></tr>
<tr><td rowspan="2"><img src="html-images/b-roff-x0.png" class="block" alt="|" /></td><td rowspan="2"><img src="html-images/b-gd.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-rd-o2.png" class="block" alt="2O" /></td><td rowspan="2"><img src="html-images/b-gd-o2.png" class="block" alt="2O" /></td><td rowspan="2"><img src="html-images/b-rd-x2.png" class="block" alt="2X" /></td><td rowspan="2"><img src="html-images/b-gd-x3.png" class="block" alt="3X" /></td><td rowspan="2"><img src="html-images/b-rd-x2.png" class="block" alt="2X" /></td><td><img src="html-images/b-ct.png" class="block" alt="|&nbsp;&nbsp;&nbsp;|" /></td><td rowspan="2"><img src="html-images/b-gd-x3.png" class="block" alt="3X" /></td><td rowspan="2"><img src="html-images/b-rd-x2.png" class="block" alt="2X" /></td><td rowspan="2"><img src="html-images/b-gd.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-rd.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-gd.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-rd.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-roff-x0.png" class="block" alt="|" /></td></tr>
<tr><td><img src="html-images/b-bar-o0.png" class="block" alt="|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|" /></td></tr>
<tr><td><img src="html-images/b-midlb.png" class="block" alt="|" /></td><td colspan="6"><img src="html-images/b-midl.png" class="block" alt="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></td><td><img src="html-images/b-midc.png" class="block" alt="|&nbsp;&nbsp;&nbsp;|" /></td><td colspan="6"><img src="html-images/b-midr-o25.png" class="block" alt="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" /></td><td><img src="html-images/b-midrb-o.png" class="block" alt="|" /></td></tr>
<tr><td rowspan="2"><img src="html-images/b-roff-o0.png" class="block" alt="|" /></td><td rowspan="2"><img src="html-images/b-ru-o2.png" class="block" alt="2O" /></td><td rowspan="2"><img src="html-images/b-gu-o1.png" class="block" alt="1O" /></td><td rowspan="2"><img src="html-images/b-ru-x1.png" class="block" alt="1X" /></td><td rowspan="2"><img src="html-images/b-gu-o2.png" class="block" alt="2O" /></td><td rowspan="2"><img src="html-images/b-ru-o1.png" class="block" alt="1O" /></td><td rowspan="2"><img src="html-images/b-gu-o2.png" class="block" alt="2O" /></td><td><img src="html-images/b-bar-x0.png" class="block" alt="| 2&nbsp;|" /></td><td rowspan="2"><img src="html-images/b-ru.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-gu-o2.png" class="block" alt="2O" /></td><td rowspan="2"><img src="html-images/b-ru-o1.png" class="block" alt="1O" /></td><td rowspan="2"><img src="html-images/b-gu.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-ru.png" class="block" alt="&nbsp;" /></td><td rowspan="2"><img src="html-images/b-gu-x2.png" class="block" alt="2X" /></td><td rowspan="2"><img src="html-images/b-roff-o0.png" class="block" alt="|" /></td></tr>
<tr><td><img src="html-images/b-cb-2.png" class="block" alt="2 у зелените" /></td></tr>
<tr><td colspan="15"><img src="html-images/b-lobot.png" class="block" alt="+--1--2--3--4--5--6-+---+--7--8--9-10-11-12-+" /></td></tr></table>

<figcaption>П1. Резултат: 1 на 1(до 3). Пипаж: 144(зелени), 120(червени); разлика: 24(20%).</figcaption>
</figure>
<button onclick="copyi1()">Копирай</button>
<label for="idg1">GNUbg ID (кликнете за избор, после копирайте и поставете в gnubg):
<input type="text" class="pozi" id="idg1" value="Position ID: 2O0GAwjLmgUAGw Match ID: UYlqABAACAAE" readonly/></label>
<script>
function copyi1() {
  var copyText = document.getElementById("idg1");
  copyText.select();
  document.execCommand("copy");
}
</script>
<p>Файлове: <a href="pozicii/10/p1.sgf" title="Позицията в ГНУ Бекгемън формат" >sgf с анализ 4 ply</a>, <a href="pozicii/10/p1.pos" title="Позицията в Джелифиш формат" >pos</a></p>

<h3 id="otg1" >Правилен ход на позиция 1: Време ли е за камикадзе?</h3>
<p>Камикадзе: 9/7 8/3*! е правилният ход. Само така зелените могат да оправят тайминга си. Червените не трябва да удрят, а тъй ще са форсирани да го направят освен ако не метнат геле.</p>
<p>„Нормалният“ ход 9/2 е чак на 4-то място. Но ако партията не беше единична, правилното щеше да е 9/2, тъй като камикадзето дава много марсове.</p>
<p>Първите 3 хода са камикадзета! Изборът наистина е труден. В по-тесен смисъл само 2-ия ход 8/3* 6/4 е камикадзе, тъй като разваля капия в къщата. Може да се каже, че другите са хара-кирита или самоубийствени ходове.</p>
<p>Aтаката 8/3* 5/3 също е грешка, защото червените имат силна блокада и вероятността зелените да убият пулове е много голяма.</p>

<div class="rest">
<table class="poz" >
<caption>Най-добрите ходове за позиция 1. Време ли е за камикадзе?</caption>
  <tr class="tek" >
    <th><abbr title="Вероятност за победа" >В. за поб.</abbr></th>
    <th><abbr title="Вероятност за победа с марс" >В. за марс</abbr></th>
    <th><abbr title="Вероятност за победа с бекгемън" >В. за бг.</abbr></th>
    <th><abbr title="Вероятност за загуба" >В. за заг.</abbr></th>
    <th><abbr title="Вероятност за загуба с марс" >Заг. с марс</abbr></th>
    <th><abbr title="Вероятност за загуба с бекгемън" >Заг. с бг.</abbr></th>
    <th><abbr title="Вероятност за Спечелване на Мача" >ВСМ</abbr></th>
    <th><abbr title="Разлика" >Разл.</abbr></th>
    <th>Ход</th>
  </tr>
  <tr>
    <td>15.2</td>
    <td>2.0</td>
    <td>0.0</td>
    <td>84.8</td>
    <td>42.2</td>
    <td>2.7</td>
    <td>15.19%</td>
    <td>0</td>
    <td>9/7 8/3*</td>
  </tr>
  <tr class="tek" >
    <td>15.0</td>
    <td>1.3</td>
    <td>0.0</td>
    <td>85.0</td>
    <td>45.3</td>
    <td>3.1</td>
    <td>14.95%</td>
    <td>-0.23%</td>
    <td>8/3* 6/4</td>
  </tr> 
  <tr>
    <td>14.8</td>
    <td>2.0</td>
    <td>0.0</td>
    <td>85.2</td>
    <td>40.0</td>
    <td>2.1</td>
    <td>14.78%</td>
    <td>-0.41%</td>
    <td>8/6 8/3*</td>
  </tr>
   <tr class="tek" >
    <td>14.5</td>
    <td>2.1</td>
    <td>0.0</td>
    <td>85.5</td>
    <td>29.8</td>
    <td>0.8</td>
    <td>14.49%</td>
    <td>-0.70%</td>
    <td>9/2</td>
  </tr>
</table>
</div>
</article>
';
?>
