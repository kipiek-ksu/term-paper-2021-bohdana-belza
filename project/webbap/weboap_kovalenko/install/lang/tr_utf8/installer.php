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

$string['admindirerror'] = 'Belirtilen yönetici dizini hatalı';
$string['admindirname'] = 'Yönetici Dizini';
$string['admindirsettinghead'] = 'Yönetici dizini ayarlanıyor...';
$string['admindirsettingsub'] = 'Bazı web hostingler kontrol paneline ulaşmak için /admin olarak belirtilmiş bir URL kullanıyor. Maalesef, bu Moodle yönetici sayfalarıyla karışıklığa sebep olmaktadır. Yönetici dizininin ismini kurulum sırasında değiştirerek bu sorunu ortadan kaldırabilirsiniz. Örnek: <br /><br /><b>moodleadmin</b><br /> <br />Bu Moodle içinde yönetici linklerini düzeltecektir.';
$string['bypassed'] = 'Geçti';
$string['cannotcreatelangdir'] = 'Dil dizini oluşturulamıyor.';
$string['cannotcreatetempdir'] = 'Geçici dizin oluşturulamıyor.';
$string['cannotdownloadcomponents'] = 'Bileşenler indirilemedi.';
$string['cannotdownloadzipfile'] = 'ZIP dosyası indirilemedi.';
$string['cannotfindcomponent'] = 'Bileşen bulunamadı.';
$string['cannotsavemd5file'] = 'Md5 dosyadı kaydedilemedi.';
$string['cannotsavezipfile'] = 'ZIP dosyası kaydedilemedi.';
$string['cannotunzipfile'] = 'Dosya arşivi açılamadı.';
$string['caution'] = 'Dikkat';
$string['check'] = 'Kontrol et';
$string['chooselanguagehead'] = 'Bir dil seçin';
$string['chooselanguagesub'] = 'Lütfen, SADECE kurulum için bir dil seçin. Site ve kullanıcı dillerini sonraki ekranda seçebilirsiniz.';
$string['closewindow'] = 'Bu pencereyi kapat';
$string['compatibilitysettingshead'] = 'PHP ayarlarınız kontrol ediliyor...';
$string['compatibilitysettingssub'] = 'Moodle\'ın düzgün çalışması için sunucunuz bütün testleri geçti.';
$string['componentisuptodate'] = 'Bileşen günceldir.';
$string['configfilenotwritten'] = 'Kurulum programı, Moodle dizini yazılabilir olmadığından dolayı seçtiğiniz ayarları içeren bir config.php dosyası oluşturamıyor.  Aşağıdaki kodu kopyalayıp bu kodu config.php dosyası içine yapıştırıp Moodle kök dizinine oluşturduğunuz dosyayı yükleyebilirsiniz.';
$string['configfilewritten'] = 'config.php dosyası başarıyla oluşturuldu';
$string['configurationcompletehead'] = 'Yapılandırma tamamlandı';
$string['configurationcompletesub'] = 'Ana moodle dizine yapılandırma dosyasının kaydedilmesi için girişimde bulunuldu.';
$string['continue'] = 'Devam';
$string['curlrecommended'] = 'Moodle Ağının işlevsel bir şekilde çalışması için isteğe bağlı Curl kütüphanesinin kurulması şiddetle tavsiye edilir.';
$string['database'] = 'Veritabanı';
$string['databasecreationsettingshead'] = 'Şimdi, Moodle verilerinin saklanacağı veritabanını
oluşturmanız gerekiyor. Bu veritabanı kurulum programı tarafından aşağıdaki ayarlara göre otomatik olarak oluşturulacak.';
$string['databasecreationsettingssub'] = '<b>Tipi:</b> kurulum tarafından mysql olarak sabitlendi<br />
<b>Sunucu:</b> kurulum tarafından localhost olarak sabitlendi<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> kurulum tarafından root olarak sabitlendi<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için isteğe bağlı önek';
$string['databasesettingshead'] = 'Şimdi, Moodle verilerinin saklanacağı veritabanını
oluşturmanız gerekiyor. Bu veritabanı önceden oluşturulmalı
ve bu veritabanına erişmek için kullanıcı adı - şifre ayarlanmalı.';
$string['databasesettingssub'] = '<b>Tipi:</b> mysql veya postgres7<br />
<b>Sunucu:</b> ör: localhost veya db.iss.com<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için isteğe bağlı önek';
$string['databasesettingssub_mssql'] = '<b>Tipi:</b> SQL*Server (UTF-8 yok)<br />
<b>Sunucu:</b> ör: localhost veya db.iss.com<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (gerekli)';
$string['databasesettingssub_mssql_n'] = '<b>Tipi:</b> SQL*Server (UTF-8 etkin)<br />
<b>Sunucu:</b> ör: localhost veya db.iss.com<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (gerekli)';
$string['databasesettingssub_mysql'] = '<b>Tipi:</b> MySQL<br />
<b>Sunucu:</b> ör: localhost veya db.iss.com<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (isteğe bağlı)';
$string['databasesettingssub_oci8po'] = '<b>Tipi:</b> Oracle<br />
<b>Sunucu:</b> kullanılmaz, boş bırakılmalı<br />
<b>Adı:</b> tnsnames.ora bağlantısına verilen ad<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (gerekli, en fazla 2karakter)';
$string['databasesettingssub_odbc_mssql'] = '<b>Tipi:</b> SQL*Server (ODBC üzerinden) <b><font color=\"red\">Deneysel! (gerçek kullanım için değil)</font></b><br />
<b>Sunucu:</b> ODBC denetim öğesi DSN adı<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (gerekli)';
$string['databasesettingssub_postgres7'] = '<b>Tipi:</b> PostgreSQL<br />
<b>Sunucu:</b> ör: localhost veya db.iss.com<br />
<b>Adı:</b> veritabanı adı, ör: moodle<br />
<b>Kullanıcı:</b> veritabanı kullanıcısı<br />
<b>Şifre:</b> kullanıcı şifresi<br />
<b>Tablo öneki:</b> tüm tablo isimleri için ön ek (gerekli)';
$string['dataroot'] = 'Veri Dizini';
$string['datarooterror'] = 'Belirtilen \'Veri Dizini\' bulunamadı veya oluşturulamadı. Dizin yolunu düzenleyin veya bu dizini kendiniz oluşturun.';
$string['dbconnectionerror'] = 'Belirtiğiniz veritabanına bağlantı kuramadık. Lütfen veritabanı ayarlarını kontrol edin.';
$string['dbcreationerror'] = 'Veritabanı oluşturma hatası. Belirtilen ayarlardan sağlanan isimle bir veritabanı oluşturulamadı.';
$string['dbhost'] = 'Veritabanı Sunucusu';
$string['dbprefix'] = 'Tablo öneki';
$string['dbtype'] = 'Tipi';
$string['dbwrongencoding'] = 'Seçili veritabanı tavsiye edilmeyen dil kodlamasında ($a) çalışıyor. Bunun yerine bir Unicode (UTF-8) kodlamasını kullanmanız daha iyi. Yine de aşağıdaki \'Veritabanı Dil Kodlama Testini Atla\' kutucuğunu seçerek bu kısmı geçebilirsiniz, ancak ilerde sorunlar yaşabilirsiniz.';
$string['dbwronghostserver'] = 'Yukarıda tanımlandığı gibi \"Sunucu\" kurallarına uymalısınız.';
$string['dbwrongnlslang'] = 'Web sunucunuzdaki NLS_LANG ortam değişkeni AL32UTF8 karakter setini kullanmalı. OCI8\'i düzgün bir şekilde yapılandırmak için PHP belgelerine bakın.';
$string['dbwrongprefix'] = 'Yukarıda tanımlandığı gibi \"Tablo öneki\" kurallarına uymalısınız.';
$string['directorysettingshead'] = 'Lütfen, Bu Moodle kurulumu için yolları onaylayın';
$string['directorysettingssub'] = '<b>Web Adresi:</b>
Moodle\'a erişilecek olan tam web adresini belirtin. Web siteniz bir çok URL\'den erişilebiliyorsa, öğrencilerinizin
en sık kullanacağı bir tanesini seçin.
Sonuna / (slash) ekleMEyin.
<br />
<br />
<b>Moodle Dizini:</b>
Bu kurulama ait tam fiziksel klasör yolunu belirtin. BÜYÜK/küçük harflerin doğru olduğundan emin olun.
<br />
<br />
<b>Veri Dizini:</b>
Siteye yüklenen dosyaların nereye kaydedileceğini belirtin. Bu dizin sunucu kullanıcısı tarafından okunabilir ve YAZILABİLİR olmalı. (genellikle \'nobody\',\'apache\',\'www\' olur)
Ancak, bu dizine direkt olarak webden erişim olMAMAlı.';
$string['dirroot'] = 'Moodle Dizini';
$string['dirrooterror'] = '\'Moodle Dizini\' ayarları hatalı görünüyor - Burada bir Moodle kurulumu bulunamadı. Aşağıdaki değer yeniden ayarlandı.';
$string['download'] = 'İndir';
$string['downloadedfilecheckfailed'] = 'İndirilmiş dosya kontrol hatası';
$string['downloadlanguagebutton'] = 'Dil paketini $a indir';
$string['downloadlanguagehead'] = 'Dil paketi indir';
$string['downloadlanguagenotneeded'] = 'Varsayılan dil paketini \"$a\" kullanarak kurulum işlemine devam edebilirsiniz.';
$string['downloadlanguagesub'] = 'Şu anda bir dil paketi indirme ve bu dilde kuruluma devam etme seçeneğiniz var.<br /><br />Dil paketini indiremezseniz kurulum işlemi İngilizce ile devam edecektir. (Kurulum işlemi bittiğinde ek dil paketlerini indirme ve kurma fırsatınız vardır.)';
$string['environmenterrortodo'] = 'Bu Moodle sürümünü kurmaya başlamadan önce yukarıda bulunan bütün ortam sorunlarını (hatalarını) çözmeniz gerekiyor!';
$string['environmenthead'] = 'Ortam kontrol ediliyor...';
$string['environmentrecommendinstall'] = 'yüklenmesi/etkinleştirilmesi tavsiye edilir';
$string['environmentrecommendversion'] = 'sürüm $a->needed tavsiye edilir ve şu anda $a->current çalışıyor';
$string['environmentrequireinstall'] = 'yüklenmesi/etkinleştirilmesi gerekli';
$string['environmentrequireversion'] = 'sürüm $a->needed gerekli ve şu anda $a->current çalışıyor';
$string['environmentsub'] = 'Çeşitli bileşenlerin sisteminizle uyum içinde olup olmadığını kontrol ediyoruz';
$string['environmentxmlerror'] = 'Ortam verisini okurken hata ($a->error_code)';
$string['error'] = 'Hata';
$string['fail'] = 'Hata';
$string['fileuploads'] = 'Dosya Göndermeleri';
$string['fileuploadserror'] = 'Bu açık olmalı';
$string['gdversion'] = 'GD sürümü';
$string['gdversionerror'] = 'GD kütüphanesi resimleri oluşturma ve işleme özelliği sunmalı';
$string['gdversionhelp'] = '<p>Sunucunuzda GD kütüphanesi kurulu görülmüyor.</p>

<p>Moodle\'ın resimleri işlemesi ve yeni resim oluşturması için GD kütüphanesi PHP kurulumu sırasında gereklidir. Örneğin,
Moodle bu kütüphane sayesinde kullanıcı resimlerinin tırnak resimlerini çıkartır ve loglarla ilgili grafikler oluşturur.
Moodle GD olmadan da çalışır, ancak yukarıda bahsedilen özelliklerden yararlanamazsınız.</p>

<p>Unix altında PHP\'ye GD desteğini sağlamak için, PHP\'yi --with-gd parametresiyle derleyin.</p>

<p>Windows altında php.ini dosyasını düzenler ve php_gd2.dll\'yi referans eden satırdaki yorumları kaldırırsınız.</p>';
$string['globalsquotes'] = 'Güvensiz Global Değişkenler';
$string['globalsquoteserror'] = 'PHP ayarlarınızı düzeltin. register_globals\'ı kapalı ve/veya magic_quotes_gpc açık tutun.';
$string['help'] = 'Yardım';
$string['iconvrecommended'] = 'Sitenizde latin olmayan dilleri kullanıyorsanız isteğe bağlı ICONV kütüphanesinin kurulması site performansını arttırmak için şiddetle tavsiye edilir.';
$string['info'] = 'Bilgi';
$string['installation'] = 'Kurulum';
$string['invalidmd5'] = 'Geçersiz md5';
$string['langdownloaderror'] = 'Maalesef \"$a\" dil paketi kurulamadı. Kuruluma İngilizce olarak devam edilecek.';
$string['langdownloadok'] = 'Dil paketi \"$a\" başarıyla kuruldu. Kurulum bu dilde devam edecek.';
$string['language'] = 'Dil';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Bu kapalı olmalı';
$string['mbstringrecommended'] = 'Sitenizde latin olmayan dilleri kullanıyorsanız isteğe bağlı MBSTRING kütüphanesinin kurulması site performansını arttırmak için şiddetle tavsiye edilir.';
$string['memorylimit'] = 'Bellek Limiti';
$string['memorylimiterror'] = 'PHP bellek limiti ayarı çok düşük... Daha sonra bu ayardan dolayı bazı sorunlar oluşabilir.';
$string['memorylimithelp'] = '<p>Sunucunuz için PHP bellek limiti şu anda $a olarak ayarlanmış durumda.</p>

<p>Özellikle bir çok modülü etkinleştirilmiş ve/veya çok fazla kullanıcınız
varsa bu durum daha sonra bazı bellek sorunlarına sebep olabilir.</p>

<p>Mümkünse size PHP\'e daha yüksek limitli bir bellek ayarı yapmanızı,
örneğin, 40M, öneriyoruz. İşte bunu yapabilmeniz için size bir kaç yol:</p>

<ol>
<li>Bunu yapmaya yetkiliyseniz, PHP\'yi <i>--enable-memory-limit</i> ile yeniden derleyin.
Bu, Moodle\'nın kendi kendine bellek limitini ayarlasına izin verecek.</li>

<li>php.ini dosyasına erişim hakkınız varsa, <b>memory_limit</b> ayarını 40M gibi
bir ayarla değiştirin. Erişim hakkınız yoksa, bunu sistem yöneticinizden sizin
için yapmasını isteyin.</li>

<li>Bazı PHP sunucularında Moodle klasörü içinde şu ayarı içeren bir
.htaccess dosyası oluşturabilirsiniz:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Ancak, bazı sunucularda bu durum çalışan <b>bütün</b> PHP sayfalarını engelleyecektir.
(sayfanız altına baktığınızda bazı hatalar göreceksiniz)
Böyle bir durumda .htaccess dosyasını silmeniz gerekiyor.</p></li>
</ol>';
$string['missingrequiredfield'] = 'Bazı gerekli alanlar eksik';
$string['moodledocslink'] = 'Bu sayfa için Moodle Belgeleri';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server - UTF8 destekli (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP, SQL*Server ile iletişim kurabilmek için mssql uzantısı düzgün bir şekilde yapılandırılmamış. Lütfen php.ini dosyasını kontrol edin veya PHP\'yi tekrar derleyin.';
$string['mysql'] = 'MySQL (mysql)';
$string['mysql416bypassed'] = 'Siteniz SADECE iso-8859-1 (latin) dillerini kullanıyorsa şimdiki kurulu  MySQL 4.1.12 (veya yüksek) veritabanını kullanmaya devam edebilirsiniz.';
$string['mysql416required'] = 'Moodle 1.6 için ilerde tüm verilerin UTF-8\'e çevrilebilmesinin garantilenmesi için en az MySQL 4.1.16 kurulu olması gerekir.';
$string['mysqlextensionisnotpresentinphp'] = 'PHP, MySQL ile iletişim kurabilmek için mysql uzantısı düzgün bir şekilde yapılandırılmamış. Lütfen php.ini dosyasını kontrol edin veya PHP\'yi tekrar derleyin.';
$string['name'] = 'Ad';
$string['next'] = 'Sonraki';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP, Oracle ile iletişim kurabilmek için oci8 uzantısı düzgün bir şekilde yapılandırılmamış. Lütfen php.ini dosyasını kontrol edin veya PHP\'yi tekrar derleyin.';
$string['odbc_mssql'] = 'SQL*Server ODBC üzerinden (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'PHP, SQL*Server ile iletişim kurabilmek için odbc uzantısı düzgün bir şekilde yapılandırılmamış. Lütfen php.ini dosyasını kontrol edin veya PHP\'yi tekrar derleyin.';
$string['ok'] = 'Tamam';
$string['opensslrecommended'] = 'OpenSSL kütüphanesinin kurulması şiddetle tavsiye edilir. Bu, Moodle Ağının işlevsel çalışmasını mümkün kılar.';
$string['pass'] = 'Geçti';
$string['password'] = 'Şifre';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP, PostgreSQL ile iletişim kurabilmek için pgsql uzantısı düzgün bir şekilde yapılandırılmamış. Lütfen php.ini dosyasını kontrol edin veya PHP\'yi tekrar derleyin.';
$string['php50restricted'] = 'PHP 5.0.x sürümünde çok fazla hata var. Lütfen sürümü, 5.1.x\'e yükseltin ya da 4.3.x veya 4.4.x sürümüne düşürün.';
$string['phpversion'] = 'PHP sürümü';
$string['phpversionerror'] = 'PHP sürümü en az 4.3.0 veya 5.1.0 olmalı (5.0.x sürümünde çok fazla hata var)';
$string['phpversionhelp'] = '<p>Moodle, PHP sürümünün en az 4.3.0 veya 5.1.0 olmasını gerektirir (5.0.x sürümünde çok fazla hata var).</p>
<p>Şu anda çalışan sürüm: $a</p>
<p>PHP\'yi güncellemeli veya PHP\'nin yeni sürümünü kullananan bir hostinge taşınmalısınız!</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['previous'] = 'Önceki';
$string['remotedownloadnotallowed'] = 'Sunucunuza bileşen indirmeye izin verilmiyor. (allow_url_fopen pasif).<br /><br />Arşivlenmiş dosyayı <a href=\"$a->url\">$a->url</a> elle indirip buraya \"$a->dest\" açmalısınız.';
$string['report'] = 'Rapor';
$string['restricted'] = 'Sınırlandırıldı';
$string['safemode'] = 'Safe Mode';
$string['safemodeerror'] = 'Moodle, safe mode\'ın açık olması durumunda bazı sorunlar çıkartabilir';
$string['sessionautostart'] = 'Otomatik Oturum Başlama';
$string['sessionautostarterror'] = 'Bu kapalı olmalı';
$string['skipdbencodingtest'] = 'Veritabanı Dil Kodlama Testini Atla';
$string['status'] = 'Durum';
$string['thischarset'] = 'UTF-8';
$string['thislanguage'] = 'Türkçe';
$string['unicoderecommended'] = 'Bütün verilerinizi Unicode (UTF-8) olarak saklamanız tavsiye edilir. Yeni kurulumların veritabanlarına varsayılan olarak Unicode karakter setinde işlem yapması önerilir. Güncelleme yapıyorsanız, UTF-8 Çevirim işlemini yapmanız gerekiyor (Yönetici sayfasına bakınız).';
$string['unicoderequired'] = 'Bütün verilerinizi Unicode (UTF-8) olarak saklamanız gerekir. Yeni kurulumların veritabanlarına varsayılan olarak Unicode karakter setinde işlem yapması gerekir. Güncelleme yapıyorsanız, UTF-8 Çevirim işlemini yapmanız gerekiyor (Yönetici sayfasına bakınız).';
$string['user'] = 'Kullanıcı';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Bilgisayarınıza <strong>$a->packname $a->packversion</strong> paketini başarıyla kurdunuz. Tebrikler!';
$string['welcomep30'] = '<strong>$a->installername</strong>\'nin bu sürümü <strong>Moodle</strong>\'da bir ortam oluşturmak için uygulamaları içerir:';
$string['welcomep40'] = 'Bu paket <strong>Moodle $a->moodlerelease ($a->moodleversion)</strong> sürümünü de içerir.';
$string['welcomep50'] = 'Bu paketteki tüm uygulamaların kullanımı her biri kendine ait olan lisanslar tarafından yönetilir. <strong>$a->installername</strong> paketinin tamamı <a href=\"http://www.opensource.org/docs/definition_plain.html\">açık kaynak</a> kodludur ve <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a> lisansı altında dağıtılır.';
$string['welcomep60'] = 'Aşağıdaki sayfalar <strong>Moodle</strong>ın kurulumu ve yapılandırılması için size basitçe yol gösterecektir. Varsayılan ayarları kabul edebilir veya ihtiyaçlarınıza göre bunları değiştirebilirsiniz.';
$string['welcomep70'] = '<strong>Moodle</strong> kurulumu için aşağıdaki \"İleri\" tuşuna basın.';
$string['wrongdestpath'] = 'Hatalı hedef yolu';
$string['wrongsourcebase'] = 'Hatalı kaynak URL base.';
$string['wrongzipfilename'] = 'Hatalı ZIP dosya adı.';
$string['wwwroot'] = 'Web adresi';
$string['wwwrooterror'] = 'Web adresi doğru ayarlanmış görünmüyor. Moodle kurulumu belirtilen yerde görünmüyor.';
?>
