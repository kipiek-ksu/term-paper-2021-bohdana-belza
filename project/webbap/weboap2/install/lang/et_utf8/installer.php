<?php
/// Please, do not edit this file manually! It's auto generated from
/// contents stored in your standard lang pack files:
/// (langconfig.php, install.php, moodle.php, admin.php and error.php)
///
/// If you find some missing string in Moodle installation, please,
/// keep us informed using http://moodle.org/bugs Thanks!
///
/// File generated by cvs://contrib/lang2installer/installer_builder
/// using strings defined in installer_strings (same dir)

$string['admindirerror'] = 'Valitud administreerimiskataloog on vale';
$string['admindirname'] = 'Administreerimiskataloog';
$string['caution'] = 'Hoiatus';
$string['closewindow'] = 'Sulge aken';
$string['configfilenotwritten'] = 'Installeerimisskript ei suutnud automaatselt tekitada config.php faili, mis sisaldaks sinu valitud seadistusi. Põhjus võib olla selles, et sinu Moodle kataloog ei ole kirjutatav. Sa võid käsitsi kopeerida järgneva koodi config.php nimelisse faili, mis asub Moodle juurkataloogis.';
$string['configfilewritten'] = 'config.php on edukalt loodud';
$string['continue'] = 'Jätka';
$string['database'] = 'Andmebaas';
$string['dataroot'] = 'Andmete kataloog';
$string['datarooterror'] = 'Sinu määratud andmete kataloogi ei suudetud leida ega luua. Paranda tee või loo ise käsitsi see kataloog.';
$string['dbconnectionerror'] = 'Me ei suutnud sinu määratud andmebaasi ühendada. Palun kontrolli oma andmebaasi seadistust.';
$string['dbcreationerror'] = 'Andmebaasi loomise viga. Ei suudetud luua andmebaasi nime olemasolevate seadistustega.  ';
$string['dbhost'] = 'Hosti server';
$string['dbprefix'] = 'Tabeli eesliide';
$string['dbtype'] = 'Tüüp';
$string['dirroot'] = 'Moodle kataloog';
$string['dirrooterror'] = 'Moodle kataloogi seadistus näib olevat vigane -  me ei suuda sealt leida Moodle installatsiooni. Allpool olev väärtus on nullitud.';
$string['download'] = 'Lae alla';
$string['error'] = 'Viga';
$string['fail'] = 'Fail';
$string['fileuploads'] = 'Failide üleslaadimine';
$string['fileuploadserror'] = 'See peaks olema sisse lülitatud';
$string['gdversion'] = 'GD versioon';
$string['gdversionerror'] = 'GD teek peaks olema võimeline töötlema ja looma pilte. ';
$string['gdversionhelp'] = '<p>Sinu serveril ei paista GD installeeritud olevat.</p>

<p>GD on andmeteek, mis on vajalik PHP jaoks, et Moodle\'il oleks võimalik pilte (kasutajate ikoonid, logide graafikud) töödelda ja luua. Moodle töötab ikka ka GD puudumisel, aga need võimalused ei ole siis sinu jaoks kättesaadavad.</p>

<p>GD lisamiseks PHP\'le Unixi operatsioonisüsteemis tuleb kompileerida PHP-d, kasutates --with-gd parameetrit.</p>

<p>Windowsis saad sa tavaliselt muuta php.ini faili ja kommenteerida sisse libdg.dll\'le vastava rea.</p>';
$string['help'] = 'Abi';
$string['info'] = 'Infromatsioon';
$string['installation'] = 'Installeerimine';
$string['language'] = 'Keel';
$string['magicquotesruntime'] = 'Magic Quotes talitlusaeg';
$string['magicquotesruntimeerror'] = 'See peaks olema välja lülitatud';
$string['memorylimit'] = 'Mälu limiit';
$string['memorylimiterror'] = 'PHP mälu limiit on seatud päris madalale...sul võib hiljem sellega seoses probleeme tekkida.';
$string['memorylimithelp'] = '<p>PHP mälu limiit sinu serveri jaoks on hetkel $a.</p>

<p>See võib hiljem tekitada Moodle\'il mäluprobleeme, eriti kui sul on palju mooduleid ja/või kasutajaid.
</p>

<p>Me soovitame, et sa konfigureeriksid PHP kõrgema limiidi peale, näiteks 16M. Selle tostamiseks on mitu viisi:</p>
<ol>
<li>Kui võimalik, siis kompileeri PHP uuesti parameetriga <i>--enable-memory-limit</i>.
See lubab Moodle\'il ise mälu limiiti määrata.</li>
<li>Kui sul on juurdepääs oma php.ini failile, siis saad muuta seal <b>memory_limit</b> väärtuseks midagi 16M lähedast. Kui sul ei ole juurdepääsu, siis võiksid paluda administraatoril seda teha.</li>
<li>Mõnedes PHP serverites saad luua Moodle kataloogi .htaccess faili, mis sisaldab seda rida:<p><blockquote>php_value memory_limit 16M</blockquote></p>
<p>Kuigi mõnedes serverites tõkestab see <b>kõigi</b> PHP lehekülgede tööd (sa näed veateateid, kui vaatad lehti), nii et pead eemaldama .htaccess faili.</p></li>
</ol>';
$string['mysqlextensionisnotpresentinphp'] = 'PHP ei ole MySQL laiendiga õigesti konfigureeritud, seega ei saa ta MySQL\'ga suhelda. Palun kontrolli oma php.ini faili või kompileeri PHP uuesti.';
$string['name'] = 'Nimi';
$string['next'] = 'Järgmine';
$string['ok'] = 'OK';
$string['pass'] = 'Korras';
$string['password'] = 'Salasõna';
$string['phpversion'] = 'PHP versioon';
$string['phpversionerror'] = 'PHP versioon peab olema vähemalt 4.1.0';
$string['phpversionhelp'] = '<p>Moodle vajab vähemalt PHP versiooni 4.1.0</p>
<p>Sinu jooksev versioon on $a</p>
<p>Sa pead oma PHP-d uuendama või kolima hosti, kus on uuem PHP versioon!</p>';
$string['previous'] = 'Eelmine';
$string['safemode'] = 'Ohutu reiim';
$string['safemodeerror'] = 'Moodle\'il võib ohutus reiimis komplikatsioone tekkida';
$string['sessionautostart'] = 'Sessioonide automaatne algatamine';
$string['sessionautostarterror'] = 'See peaks olema välja lülitatud';
$string['status'] = 'Staatus';
$string['thischarset'] = 'UTF-8';
$string['thislanguage'] = 'Eesti';
$string['user'] = 'Kasutaja';
$string['wwwroot'] = 'Veebiaadress';
$string['wwwrooterror'] = 'Veebiaadress näib vigane - Moodle installatsiooni ei paista seal olevat.';
?>
