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

$string['admindirerror'] = 'Adresář pro správu (admin) není zadán správně.';
$string['admindirname'] = 'Adresář pro správu (admin)';
$string['admindirsettinghead'] = 'Nastavování adresáře \'admin\'...';
$string['admindirsettingsub'] = 'Na některých serverech je URL adresa /admin vyhrazena pro speciální účely (např. pro ovládací panel). Na takových serverech může dojít ke kolizi se standardním umístěním stránek pro správu Moodlu. Máte-li tento problém, přejmenujte adresář \'admin\' ve vaší instalaci Moodlu a do tohoto pole zadejte jeho nový název. Příklad: <br /> <br /><b>moodleadmin</b><br /> <br />
Všechny generované odkazy na stránky správy Moodlu budou používat tento nový název.';
$string['bypassed'] = 'Přeskočeno';
$string['cannotcreatelangdir'] = 'Nelze vytvořit adresář pro jazykové soubory.';
$string['cannotcreatetempdir'] = 'Nelze vytvořit dočasný adresář.';
$string['cannotdownloadcomponents'] = 'Nelze stáhnout komponenty.';
$string['cannotdownloadzipfile'] = 'Nelze stáhnout soubor ZIP.';
$string['cannotfindcomponent'] = 'Komponenta nenalezena.';
$string['cannotsavemd5file'] = 'Nelze uložit soubor MD5.';
$string['cannotsavezipfile'] = 'Nelze uložit soubor ZIP.';
$string['cannotunzipfile'] = 'Nelze dekomprimovat soubor.';
$string['caution'] = 'Varování';
$string['check'] = 'Prověřit';
$string['chooselanguagehead'] = 'Vyberte jazyk';
$string['chooselanguagesub'] = 'Zvolte si jazyk PRO INSTALOVÁNÍ. Jazyk pro stránky Moodlu a pro uživatele budete moci vybrat později.';
$string['closewindow'] = 'Zavřít toto okno';
$string['compatibilitysettingshead'] = 'Kontrola nastavení PHP...';
$string['compatibilitysettingssub'] = 'Pro správný běh Moodlu by váš server měl vyhovět ve všech následujících testech.';
$string['componentisuptodate'] = 'Komponenta je aktuální.';
$string['configfilenotwritten'] = 'Instalačnímu skriptu se nepodařilo automaticky vytvořit soubor config.php s vaší konfigurací -- proces webového serveru zřejmě nemá právo zapisovat do adresáře s instalací Moodlu. Můžete ručně zkopírovat následující kód do souboru s názvem config.php a uložit jej do kořenového adresáře vaší instalace Moodlu.';
$string['configfilewritten'] = 'Soubor config.php byl úspěšně vytvořen.';
$string['configurationcompletehead'] = 'Konfigurace dokončena';
$string['configurationcompletesub'] = 'Moodle se pokusil uložit soubor s konfigurací do kořenového adresáře instalace Moodlu.';
$string['continue'] = 'Pokračovat';
$string['curlrecommended'] = 'Pro běh síťových funkcionalit (\"Moodle Networking\") je potřeba nainstalovat volitelnou knihovnu Curl.';
$string['database'] = 'Databáze';
$string['databasecreationsettingshead'] = 'Nyní musíte nastavit připojení k databázi, kam si bude Moodle ukládat většinu svých dat. Tato databáze může být vytvořena instalátorem automaticky podle následujícího nastavení.';
$string['databasecreationsettingssub'] = '<b>Typ:</b> instalátor nastaví na \"mysql\"<br />
<b>Hostitel:</b> instalátor nastaví na \"localhost\"<br />
<b>Název:</b> název databáze, např. moodle<br />
<b>Uživatel:</b> instalátor nastaví na \"root\"<br />
<b>Heslo:</b> heslo k tomuto účtu<br />
<b>Předpona tabulek:</b> volitelná předpona, která se vloží před názvy všech tabulek (umožňuje používat jednu databázi pro více instalací Moodlu)';
$string['databasesettingshead'] = 'Nyní musíte nastavit připojení k databázi, kam si bude Moodle ukládat většinu svých dat. Tato databáze již musí být vytvořena, stejně jako musí být nastaveno uživatelské jméno a heslo pro přístup k ní.';
$string['databasesettingssub'] = '<b>Typ:</b> mysql nebo postgres7<br />
<b>Hostitel:</b> např. localhost nebo db.naseskola.cz<br />
<b>Název:</b> název databáze, např. moodle<br />
<b>Uživatel:</b> uživatelské jméno účtu pro přístup k databázi<br />
<b>Heslo:</b> heslo k tomuto účtu<br />
<b>Předpona tabulek:</b> volitelná předpona, která se vloží před názvy všech tabulek (umožňuje používat jednu databázi pro více instalací Moodlu)';
$string['databasesettingssub_mssql'] = '<b>Typ:</b> SQL*Server (bez UTF-8) <b><font color=\"red\">Jen pro experimentování! (není určeno pro produkční servery)</font></b><br />
<b>Hostitel (Host):</b> např. localhost nebo db.naseskola.cz<br />
<b>Název (Name):</b> název databáze, např. moodle<br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek, např. mdl_ (povinné)';
$string['databasesettingssub_mssql_n'] = '<b>Typ:</b> SQL*Server (s UTF-8) <br />
<b>Hostitel (Host):</b> např. localhost nebo db.naseskola.cz<br />
<b>Název (Name):</b> název databáze, např. moodle<br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek, např. mdl_ (povinné)';
$string['databasesettingssub_mysql'] = '<b>Typ:</b> MySQL<br />
<b>Hostitel (Host):</b> např. localhost nebo db.naseskola.cz<br />
<b>Název (Name):</b> název databáze, např. moodle<br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek, např. mdl_ (volitelné)';
$string['databasesettingssub_oci8po'] = '<b>Typ:</b> Oracle<br />
<b>Hostitel (Host):</b> nepoužito, musí být prázdné<br />
<b>Název (Name):</b> daný název připojení tnsnames.ora<br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek (povinné, max 2 znaky)';
$string['databasesettingssub_odbc_mssql'] = '<b>Typ:</b> SQL*Server (přes ODBC) <b><font color=\"red\">Jen pro experimentování! (není určeno pro produkční servery)</font></b><br />
<b>Hostitel (Host):</b> název DSN podle řídicího panelu ODBC<br />
<b>Název (Name):</b>název databáze, např. moodle <br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek (povinné)';
$string['databasesettingssub_postgres7'] = '<b>Typ:</b> PostgreSQL<br />
<b>Hostitel (Host):</b> např. localhost nebo db.naseskola.cz<br />
<b>Název (Name):</b> název databáze, např. moodle<br />
<b>Uživatel (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek, např. mdl_ (povinné)';
$string['dataroot'] = 'Datový adresář';
$string['datarooterror'] = 'Zadaný datový adresář se nepodařilo nalézt nebo vytvořit. Buď opravte zadanou cestu, nebo vytvořte adresář ručně.';
$string['dbconnectionerror'] = 'Nepodařilo se připojit k databázi, kterou jste zadali. Zkontrolujte prosím nastavení databáze.';
$string['dbcreationerror'] = 'Chyba při vytváření databáze. Nelze vytvořit databázi zadaného jména a nastavení.';
$string['dbhost'] = 'Hostitelský server';
$string['dbprefix'] = 'Předpona tabulek';
$string['dbtype'] = 'Typ';
$string['dbwrongencoding'] = 'Vybraná databáze používá nedoporučené kódování $a. Vhodnější by bylo používat databázi s kódováním Unicode (UTF-8). Tuto kontrolu můžete přeskočit zaškrtnutím pole \"Přeskočit test kódování DB\", můžete však v budoucnu narazit na problémy.';
$string['dbwronghostserver'] = 'Chyba v názvu hostitele.';
$string['dbwrongnlslang'] = 'Proměnná prostředí Vašeho serveru NLS_LANG musí používat znakovou sadu AL32UTF8. Viz dokumentaci PHP o konfiguraci vlastnosti OCI8.';
$string['dbwrongprefix'] = 'Chyba v předponě názvů tabulek.';
$string['directorysettingshead'] = 'Potvrďte prosím adresy této instalace Moodlu.';
$string['directorysettingssub'] = '<b>Webová adresa</b>:
zadejte úplnou webovou adresu, na níž bude Moodle dostupný. Jsou-li vaše stránky dostupné na více URL, vyberte z nich tu, kterou budou vaši studenti používat nejčastěji. Na konci adresy neuvádějte lomítko.
<br />
<br />
<b>Adresář Moodlu</b>:
zadejte úplnou cestu k adresáři s touto instalací. Ujistěte se, že jsou v ní správně uvedena malá/VELKÁ písmena.
<br />
<br />
<b>Datový adresář</b>:
potřebujete diskový prostor, kam bude Moodle ukládat nahrané (uploadované) soubory. K tomuto adresáři musí mít proces webového serveru právo ke čtení I ZÁPISU (webový server bývá spouštěn pod uživatelem \'nobody\' nebo \'apache\' nebo podobně). Tento adresář by ale zároveň neměl být dostupný přímo přes webové rozhraní (může obsahovat neveřejná data).';
$string['dirroot'] = 'Adresář Moodlu';
$string['dirrooterror'] = 'Parametr \'Adresář Moodlu\' je zřejmě nastaven nesprávně -- v zadaném umístění se nepodařilo najít instalaci Moodlu. Ve formuláři níže byla automaticky nastavena výchozí hodnota.';
$string['download'] = 'Stáhnout';
$string['downloadedfilecheckfailed'] = 'Kontrola staženého souboru dopadla negativně';
$string['downloadlanguagebutton'] = 'Stáhnout jazykový balíček \"$a\"';
$string['downloadlanguagehead'] = 'Stáhnout jazykový balíček';
$string['downloadlanguagenotneeded'] = 'V instalaci lze nyní pokračovat v jazyce \"$a\".';
$string['downloadlanguagesub'] = 'Nyní máte možnost stáhnout si některý z jazykových balíčků Moodlu a pokračovat v tomto jazyce.<br /><br />Pokud si momentálně nemůžete nebo nechcete stáhnout jazykový balíček, bude instalační proces pokračovat v angličtině. Jazykové balíčky si budete moci stáhnout i později po ukončení instalace.';
$string['environmenterrortodo'] = 'Pro pokračování v instalaci této verze Moodlu je nutné nejdříve vyřešit problémy v programovém prostředí (chyby) serveru uvedené výše!';
$string['environmenthead'] = 'Kontrola programového prostředí...';
$string['environmentrecommendinstall'] = 'doporučená komponenta';
$string['environmentrecommendversion'] = 'doporučena je verze $a->needed, nyní používáte verzi $a->current';
$string['environmentrequireinstall'] = 'vyžadovaná komponenta';
$string['environmentrequireversion'] = 'vyžadována je verze $a->needed, nyní používáte verzi $a->current';
$string['environmentsub'] = 'Nyní se prověřuje, zda vybrané komponenty vašeho systému splňují požadavky instalace.';
$string['environmentxmlerror'] = 'Chyba při zjišťování údajů o programovém prostředí ($a->error_code)';
$string['error'] = 'Chyba';
$string['fail'] = 'Selhalo';
$string['fileuploads'] = 'Nahrávání souborů (FIle Uploads)';
$string['fileuploadserror'] = 'Mělo by být zapnuto';
$string['gdversion'] = 'Verze GD';
$string['gdversionerror'] = 'Knihovna GD se používá pro zpracovávání a tvorbu obrázků (např. fotografií, grafů apod.).';
$string['gdversionhelp'] = '<p>Na vašem serveru zřejmě není nainstalována knihovna GD.</p>

<p>GD je knihovna, kterou vyžaduje PHP k tomu, aby mohl Moodle zpracovávat obrázky (např. ikony uživatelů) a vytvářet nové obrázky (např. grafy přístupů na vaše stránky). Moodle bude fungovat i bez GD, ale tyto funkce nebudou dostupné.</p>

<p>V Unixu můžete přidat GD do PHP tak, že zkompilujte PHP s parametrem --with-gd.</p>

<p>Ve Windows stačí většinou upravit php.ini a odkomentovat řádek odkazující na php_gd2.dll.</p>';
$string['globalsquotes'] = 'Nezabezpečené zacházení s globálními proměnnými';
$string['globalsquoteserror'] = 'Upravte nastavení PHP: zakažte register_globals a/nebo povolte magic_quotes_gpc';
$string['help'] = 'Nápověda';
$string['iconvrecommended'] = 'Instalace volitelné knihovny ICONV je silně doporučena, neboť zvyšuje výkon stránek, zejména pokud používáte jazyky nezaložené na latince.';
$string['info'] = 'Informace';
$string['installation'] = 'Instalace';
$string['invalidmd5'] = 'Neplatný MD5 hash';
$string['langdownloaderror'] = 'Bohužel, jazyk \"$a\" se nepodařilo nainstalovat. Instalace bude pokračovat v angličtine.';
$string['langdownloadok'] = 'Podařilo se úspěšně nainstalovat jazykový balíček \"$a\". Instalace bude pokračovat v tomto jazyce.';
$string['language'] = 'Jazyk';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Mělo by být vypnuto';
$string['mbstringrecommended'] = 'Instalace volitelné knihovny MBSTRING je silně doporučena, neboť zvyšuje výkon stránek, zejména pokud používáte jazyky nezaložené na latince.';
$string['memorylimit'] = 'Limit paměti';
$string['memorylimiterror'] = 'Limit paměti pro PHP skripty je nastaven relativně nízko ... v budoucnu byste mohli narazit na problémy.';
$string['memorylimithelp'] = '<p>Limit paměti pro PHP skripty je na vašem serveru momentálně nastaven na hodnotu $a.</p>

<p>To může později způsobovat Moodlu problémy, zvláště při větším množství modulů a/nebo uživatelů.</p>

<p>Je-li to možné, doporučujeme vám nastavit v PHP vyšší limit, např. 40M. Můžete to provést několika způsoby:
<ol>
<li>Můžete-li, překompilujte PHP s volbou <i>--enable-memory-limit</i>.
Moodle si tak bude sám moci nastavit potřebný limit.</li>
<li>Máte-li přístup k souboru php.ini, změňte nastavení <b>memory_limit</b>
na hodnotu blízkou 40M. Nemáte-li taková práva, požádejte správce vašeho webového serveru, aby toto nastavení provedl on.</li>
<li>Na některých serverech můžete v kořenovém adresáři Moodlu vytvořit soubor .htaccess s následujícím řádkem:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Bohužel, v některých případech tím vyřadíte z provozu <b>všechny</b> PHP stránky (při jejich prohlížení uvidíte chybová hlášení), takže budete muset soubor .htaccess zase odstranit.</li>
</ol>';
$string['missingrequiredfield'] = 'Chybí některé z povinných polí';
$string['moodledocslink'] = 'Dokumentace k této stránce';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server s podporou UTF-8 (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP nebylo korektně nakonfigurováno pro komunikaci s SQL*Server přes rozšíření MSSQL. Zkontrolujte váš php.ini nebo překompilujte PHP.';
$string['mysql'] = 'MySQL (mysql)';
$string['mysql416bypassed'] = 'Pokud ovšem ve vaší instalaci Moodlu používáte POUZE jazyky založené na latince (iso-8859-1), můžete nadále používat momentálně nainstalovanou verzi MySQL 4.1.12 (nebo vyšší).';
$string['mysql416required'] = 'Minimální verzí požadovanou pro Moodle 1.6 -- a pro pozdější bezpečný převod všech dat do UTF-8 -- je MySQL 4.1.16.';
$string['mysqlextensionisnotpresentinphp'] = 'PHP nebylo korektně nakonfigurováno pro komunikaci s MySQL. Zkontrolujte váš php.ini nebo překompilujte PHP.';
$string['name'] = 'Název';
$string['next'] = 'Další';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP nebylo korektně nakonfigurováno pro komunikaci s Oracle přes rozšíření OCI8. Zkontrolujte váš php.ini nebo překompilujte PHP.';
$string['odbc_mssql'] = 'SQL*Server přes ODBC (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'PHP nebylo korektně nakonfigurováno pro komunikaci s SQL*Server přes rozšíření ODBC. Zkontrolujte váš php.ini nebo překompilujte PHP.';
$string['ok'] = 'OK';
$string['opensslrecommended'] = 'Pro běh síťových funkcionalit (\"Moodle Networking\") je potřeba nainstalovat volitelnou knihovnu OpenSSL.';
$string['parentlanguage'] = '<< Překladatelé: Pokud Váš jazyk má \"nadřazený\" jazyk\", který má Moodle používat v případech, kdy řetězce ve vašem jazykovém balíčku chybí, specifikujte jeho kód zde. Příklad: nl >>';
$string['pass'] = 'V pořádku';
$string['password'] = 'Heslo';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP nebylo korektně nakonfigurováno pro komunikaci s PostgreSQL přes rozšíření PGSQL. Zkontrolujte váš php.ini nebo překompilujte PHP.';
$string['php50restricted'] = 'V PHP 5.0.x bylo nalezeno množství chyb; přejděte buď na vyšší verzi 5.1.x, nebo na nižší verzi 4.3.x či 4.4.x.';
$string['phpversion'] = 'Verze PHP';
$string['phpversionerror'] = 'Verze PHP musí být alespoň 4.3.0 nebo 5.1.0 (PHP 5.0.x obsahuje množství chyb).';
$string['phpversionhelp'] = '<p>Moodle vyžaduje PHP alespoň verze 4.3.0 nebo 5.1.0 (PHP 5.0.x obsahuje množství chyb).</p>
<p>Nyní používáte PHP verze $a.</p>
<p>Musíte PHP upgradovat, nebo přejít k hostiteli s vyšší verzí!<br />
(U PHP 5.0.x můžete také přejít na nižší verzi 4.4.x či 4.3.x.)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['previous'] = 'Předchozí';
$string['remotedownloadnotallowed'] = 'Stahování komponent na server není povoleno (direktiva allow_url_fopen je ve stavu \'vypnuto\').<br /><br />Musíte soubor stáhnout <a href=\"$a->url\">$a->url</a> ručně, zkopírovat jej na serveru do umístění \"$a->dest\" a tam jej dekomprimovat.';
$string['report'] = 'Sestava';
$string['restricted'] = 'Nedostupné';
$string['safemode'] = 'Bezpečný režim (Safe Mode)';
$string['safemodeerror'] = 'Se zapnutým bezpečným režimem (Safe Mode) může mít Moodle problémy.';
$string['sessionautostart'] = 'Session Auto Start';
$string['sessionautostarterror'] = 'Mělo by být vypnuto';
$string['skipdbencodingtest'] = 'Přeskočit test kódování DB';
$string['status'] = 'Stav';
$string['thischarset'] = 'UTF-8';
$string['thislanguage'] = 'Čeština';
$string['unicoderecommended'] = 'Doporučujeme ukládání dat v kódování Unicode (UTF-8). Nové instalace by měly být založeny nad databází s výchozím kódováním Unicode. Pokud přecházíte z nižších verzí, měli byste podstoupit proces migrace na UTF-8 (viz stránku Správa).';
$string['unicoderequired'] = 'Je nezbytné ukládání dat v kódování Unicode (UTF-8). Nové instalace musí být založeny nad databází s výchozím kódováním Unicode. Pokud přecházíte z nižších verzí, měli byste podstoupit proces migrace na UTF-8 (viz stránku Správa).';
$string['user'] = 'Uživatel';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Podařilo se vám úspěšně nainstalovat a spustit balíček <strong>$a->packname $a->packversion</strong>. Gratulujeme!';
$string['welcomep30'] = '<strong>$a->installername</strong> obsahuje aplikace k vytvoření prostředí, ve kterém bude provozován váš <strong>Moodle</strong>. Jmenovitě se jedná o:';
$string['welcomep40'] = 'Balíček rovněž obsahuje <strong>Moodle ve verzi $a->moodlerelease ($a->moodleversion)</strong>.';
$string['welcomep50'] = 'Použití všech aplikací v tomto balíčku je vázáno jejich příslušnými licencemi. Kompletní balíček <strong>$a->installername</strong> je software s <a href=\"http://www.opensource.org/docs/definition_plain.html\"> otevřeným kódem (open source)</a> a je šířen pod licencí <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>.';
$string['welcomep60'] = 'Následující stránky vás v několik jednoduchých krocích nastavením <strong>Moodlu</strong> na vašem počítači. Můžete přijmout výchozí nastavení, nebo si je upravit podle svých potřeb.';
$string['welcomep70'] = 'Stisknutím níže uvedeného tlačítka \"Další\" pokračujte v nastavení vaší instalace Moodlu.';
$string['wrongdestpath'] = 'Chybné cílové umístění';
$string['wrongsourcebase'] = 'Chybné URL zdrojového serveru';
$string['wrongzipfilename'] = 'Chybné jméno souboru ZIP';
$string['wwwroot'] = 'Webová adresa';
$string['wwwrooterror'] = 'Parametr \'Webová adresa\' je zřejmě nastaven nesprávně -- v zadaném umístění se nepodařilo najít instalaci Moodlu. Ve formuláři níže byla automaticky nastavena výchozí hodnota.';
?>
