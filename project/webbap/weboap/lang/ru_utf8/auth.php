<?PHP // $Id$ 
      // auth.php - created with Moodle 1.9.6 (Build: 20091021) (2007101560)


$string['auth_cas_baseuri'] = 'URI сервера (пусто, если его нет)<br />Например, если CAS сервер находится по адресу host.domaine.fr/CAS/ тогда <br />cas_baseuri = CAS/';
$string['auth_cas_baseuri_key'] = 'Базовый URI';
$string['auth_cas_broken_password'] = 'Вы не можете продолжать, не сменив пароль, однако страница для его смены не доступна. Пожалуйста, свяжитесь с администратором.';
$string['auth_cas_cantconnect'] = 'LDAP часть CAS-модуля не может подключиться к серверу: $a';
$string['auth_cas_casversion'] = 'Версия';
$string['auth_cas_changepasswordurl'] = 'URL смены пароля';
$string['auth_cas_create_user'] = 'Включите эту опцию, если Вы хотите добавить аутентифицированных через CAS пользователей в БД системы. Если этого не сделать - входить в систему смогут только уже существующие в базе данных системы пользователи';
$string['auth_cas_create_user_key'] = 'Создать пользователя';
$string['auth_cas_enabled'] = 'Включите, если хотите использовать CAS аутентификацию.';
$string['auth_cas_hostname'] = 'Имя хоста CAS сервера <br />Например: host.domain.ru';
$string['auth_cas_hostname_key'] = 'Имя хоста';
$string['auth_cas_invalidcaslogin'] = 'В авторизации отказано';
$string['auth_cas_language'] = 'Выбранный язык';
$string['auth_cas_language_key'] = 'Язык';
$string['auth_cas_logincas'] = 'Доступ к безопасному соединению';
$string['auth_cas_logoutcas'] = 'Переключите в \"Да\", если вы хотите выходить из CAS при отключении от системы';
$string['auth_cas_logoutcas_key'] = 'Выйти из CAS';
$string['auth_cas_multiauth'] = 'Переключите в \"Да\", если Вы хотите иметь множественную аутентификацию (CAS+другие методы)';
$string['auth_cas_multiauth_key'] = 'Множественная аутнентификация';
$string['auth_cas_port'] = 'Порт CAS сервера';
$string['auth_cas_port_key'] = 'Порт';
$string['auth_cas_proxycas'] = 'Переключите в \"Да\" если Вы используете прокси модуль CAS';
$string['auth_cas_proxycas_key'] = 'Режим прокси';
$string['auth_cas_server_settings'] = 'Конфигурация CAS сервера';
$string['auth_cas_text'] = 'Безопасное соединение';
$string['auth_cas_use_cas'] = 'Использовать CAS';
$string['auth_cas_version'] = 'Версия CAS';
$string['auth_changepasswordurl'] = 'URL страницы смены пароля';
$string['auth_changepasswordurl_expl'] = 'Укажите станицу, на которую должны отправляться пользователи, утерявшие свой $a пароль. Установите параметр <strong>Использовать стандартную страницу смены пароля</strong> в значение <strong>Нет</strong>';
$string['auth_common_settings'] = 'Основные установки';
$string['auth_data_mapping'] = 'Перенаправление данных';
$string['auth_dbcantconnect'] = 'Невозможно подключиться к указанной базе данных аутентификации';
$string['auth_dbchangepasswordurl_key'] = 'URL смены пароля';
$string['auth_dbdebugauthdb'] = 'Отладка ADOdb';
$string['auth_dbdeleteuser'] = 'Удалённый пользователь $a[0] c идентификатором $a[1]';
$string['auth_dbdeleteusererror'] = 'Ошибка удаления пользователя $a';
$string['auth_dbdescription'] = 'Этот метод использует внешнюю базу данных для проверки пары логин/пароль. При создании новой учетной записи информация из полей может быть скопирована в систему.';
$string['auth_dbextencoding'] = 'Кодировка внешней БД';
$string['auth_dbextencodinghelp'] = 'Используемая во внешней базе данных кодировка';
$string['auth_dbextrafields'] = '<p>Эти поля дополнительные. Вы можете выбрать предварительное заполнение некоторых полей пользовательских данных из полей внешней базы данных, указанной здесь. </p><p>Не заполняйте поле, для использования настроек по умолчанию.</p>
<p>В любом случае, пользователь сможет редактировать все поля после того, как он зайдет в систему.</p>';
$string['auth_dbfieldpass'] = 'Название поля, содержащего пароль';
$string['auth_dbfieldpass_key'] = 'Поле ввода пароля';
$string['auth_dbfielduser'] = 'Название поля, содержащего логин';
$string['auth_dbfielduser_key'] = 'Поле логина';
$string['auth_dbhost'] = 'Компьютер, на котором запущен сервер базы данных';
$string['auth_dbname'] = 'Название базы данных';
$string['auth_dbpass'] = 'Пароль, соответствующий указанному логину';
$string['auth_dbpasstype'] = 'Определяет формат используемых паролей.  MD5-кодирование, наиболее подходящее при соединении с другими web-приложениями, например PostNuke';
$string['auth_dbtable'] = 'Название таблицы в базе данных';
$string['auth_dbtable_key'] = 'Таблица';
$string['auth_dbtitle'] = 'Использовать внешнюю базу данных';
$string['auth_dbtype'] = 'Тип базы данных (См. <a href=\"../lib/adodb/readme.htm#drivers\">Документацию по ADO db</a> для деталей)';
$string['auth_dbuser'] = 'Логин пользователя с правами только на чтение для базы данных';
$string['auth_emaildescription'] = 'Подтверждение с помощью электронной почты - используемый по умолчанию метод аутентификации. При регистрации пользователя на указанный адрес электронной почты отправляется письмо с просьбой о подтверждении регистрации. Письмо содержит случайно созданную (безопасную) ссылку на страницу, где пользователь может подтвердить учетную запись. В дальнейшем при входе в систему сверяются имя пользователя и пароль с их значениями в базе данных.';
$string['auth_emailtitle'] = 'E-mail - аутентификация';
$string['auth_emailupdatemessage'] = 'Уважаемый $a->fullname,

Вы запросили операцию изменения адреса e-mail для Вашего аккаунта на $a->site. Пожалуйста, перейдите по этой ссылке для подтверждения операции.

$a->url';
$string['auth_imapdescription'] = 'Этот метод использует IMAP-сервер для проверки соответствия пары логин/пароль.';
$string['auth_imaphost'] = 'Адрес  IMAP-сервера. Используйте IP-адрес, не DNS-имя.';
$string['auth_imapport'] = 'Номер порта для IMAP-сервера. Обычно в диапазоне от 143 до 993.';
$string['auth_imaptitle'] = 'Использовать IMAP-сервер';
$string['auth_imaptype'] = 'Тип сервера IMAP. Серверы IMAP могут иметь различные типы идентификации и переговоров.';
$string['auth_ldap_bind_dn'] = 'Если Вы хотите связанного пользователя для поиска пользователей, укажите это здесь. Например, \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_pw'] = 'Пароль для связывания пользователя.';
$string['auth_ldap_contexts'] = 'Список контекстов, где расположены пользователи . Отделите различные контексты \';\'. Например: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_create_context'] = 'Если Вы разрешили создание пользователей при подтверждении по почте, определите контекст, в который будут заводиться пользователи. Этот контекст должен отличаться от других, чтобы предотвратить проблемы безопасности. Нет необходимости добавлять, название контекста к ldap_context-переменным, система будет искать пользователей от этого контекста автоматически.';
$string['auth_ldap_creators'] = 'Список групп, членам которых разрешается создавать новые курсы. Список групп разделяйте с помощью \';\'. Например,\'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_host_url'] = 'Укажите LDAP-хост в виде URL\'а, например \'ldap://ldap.myorg.com/\' или \'ldaps://ldap.myorg.com/\'';
$string['auth_ldap_memberattribute'] = 'Определите пользовательский атрибут, определяющий принадлежность пользователя к группе. Обычно \'участник\'';
$string['auth_ldap_search_sub'] = 'Укажите значения <> 0 если Вам нравится искать пользователей по субконтекстам.';
$string['auth_ldap_update_userinfo'] = 'Обновляйте пользовательскую информацию (Имя, Фамилию, адрес ..) от LDAP до системы. Смотрите /auth/ldap/attr_mappings.php для того, чтобы отобразить информацию.';
$string['auth_ldap_user_attribute'] = 'Атрибут, используемый для имя/поиск. Обычно, \'cn\'.';
$string['auth_ldap_version'] = 'Версия LDAP протокола, которую использует Ваш сервер.';
$string['auth_ldapdescription'] = 'Этот метод обеспечивает аутентификацию с помощью LDAP-сервера. Если данный логин и пароль имеют силу, создаётся новая пользовательская учётная запись в базе данных системы. Этот модуль может читать поля от LDAP-сервера и заполнять требуемые области (поля) в системе. В дальнейшем проверяются только логин и пароль';
$string['auth_ldapextrafields'] = 'Эти поля дополнительные. Вы можете выбрать предварительное заполнение некоторых полей пользовательских данных от полей LDAP, указанного здесь. <p>Не заполняйте это поле, для того чтобы не переносить данные с LDAP.</p><p>В любом случае, пользователь сможет редактировать все поля после того, как он зайдет в систему.</p>';
$string['auth_ldaptitle'] = 'Использовать LDAP-сервер';
$string['auth_manualdescription'] = 'Этот метод удаляет любой путь для пользователей, для создания собственных учетных записей. Все учетные записи должны быть вручную созданы пользователем администрации.';
$string['auth_manualtitle'] = 'Ручная регистрация';
$string['auth_multiplehosts'] = 'В случае нескольких хостов они должны быть указаны следующим образом: host1.com;host2.com;host3.com';
$string['auth_nntpdescription'] = 'Этот метод использует NNTP-сервер для определения соответствия логина и пароля.';
$string['auth_nntphost'] = 'Адрес NNTP-сервера. Используйте IP-адрес, не DNS-имя.';
$string['auth_nntpport'] = 'Номер порта сервера (обычно, 119)';
$string['auth_nntptitle'] = 'Использовать NNTP-сервер';
$string['auth_nonedescription'] = 'Пользователи могут регистрироваться и создавать учетные записи немедленно, без идентификации с внешнего сервера и подтверждений через электронную почту. Будьте внимательным, используя эту опцию - подумайте о защите и проблемах администрирования, которые могут возникнуть.';
$string['auth_nonetitle'] = 'Не использовать аутентификацию';
$string['auth_pop3description'] = 'Этот метод использует POP3-сервер для определения соответствия и правильности пары логин/пароль.';
$string['auth_pop3host'] = 'Адрес POP3-сервера. Используйте IP-адрес, не DNS-имя.';
$string['auth_pop3port'] = 'Номер порта сервера (обычно 110)';
$string['auth_pop3title'] = 'Использовать POP3-сервер';
$string['auth_pop3type'] = 'Тип сервера. Если ваш сервер использует защиту, основанную на сертификатах, используйте pop3cert.';
$string['auth_user_create'] = 'Разрешить создание пользователей';
$string['auth_user_creation'] = 'Новые (анонимные) пользователи могут создавать учетные записи на внешнем источнике аутентификации и подтверждать через электронную почту. Если Вы разрешите это, не забудьте также сконфигурировать определенные модулем опции для заведения пользователя.';
$string['auth_usernameexists'] = 'Выбранный логин уже существует. Выберите другой.';
$string['authenticationoptions'] = 'Настройка аутентификации';
$string['authinstructions'] = 'Здесь Вы можете написать инструкции для ваших пользователей, для того, чтобы они знали, какой логин и пароль они должны использовать. Текст, который Вы вводите здесь, появится на странице входа в систему. Если Вы оставите  поле пустым, никаких инструкций отображено не будет.';
$string['changepassword'] = 'Сменить URL с паролем';
$string['changepasswordhelp'] = 'Здесь Вы можете определить способ, которым пользователи могут возвратить или изменить их логин/пароль, если они забыли его. Пользователи увидят кнопку на странице входа в систему и их пользовательской странице. Если Вы не заполните поле, кнопка выводится не будет.';
$string['chooseauthmethod'] = 'Выберите метод аутентификации:';
$string['enterthenumbersyouhear'] = 'Напишите цифры, которые вы слышите';
$string['enterthewordsabove'] = 'Напишите слова, которые вы видите сверху';
$string['errorminpassworddigits'] = 'Пароль должен содержать не менее $a цифр(ы).';
$string['errorminpasswordlength'] = 'Пароль должен состоять не менее чем из $a символов.';
$string['errorminpasswordlower'] = 'Пароль должен содержать не менее $a строчных(ой) букв(ы).';
$string['errorminpasswordnonalphanum'] = 'Пароль должен содержать не менее $a не буквенно-цифровых(ого) символов(а).';
$string['errorminpasswordupper'] = 'Пароль должен содержать не менее $a прописных(ой) букв(ы).';
$string['errorpasswordupdate'] = 'Ошибка при обновлении пароля; пароль не сохранен';
$string['forcechangepassword'] = 'Принудительная смена пароля';
$string['getanaudiocaptcha'] = 'Получить звуковую CAPTCHA (тест для различения людей и компьютеров)';
$string['getanimagecaptcha'] = 'Получить картинку CAPTCHA (тест для различения людей и компьютеров)';
$string['getanothercaptcha'] = 'Получить другой CAPTCHA (тест для различения людей и компьютеров)';
$string['guestloginbutton'] = 'Кнопка гостевого входа';
$string['incorrectpleasetryagain'] = 'Неправильно. Пожалуйста, попробуйте еще раз.';
$string['instructions'] = 'Инструкции';
$string['md5'] = 'MD5-шифрование';
$string['nopasswordchange'] = 'Пароль изменить нельзя';
$string['nopasswordchangeforced'] = 'Вы не можете продолжать работу на сайте без смены пароля, даже если страница для изменения пароля не выведена. Пожалуйста, свяжитесь с администратором сайта.';
$string['plaintext'] = 'Текст';
$string['showguestlogin'] = 'Вы можете выбрать: показывать или нет кнопку гостевого доступа в систему.';
$string['stdchangepassword'] = 'Использовать стандартную страницу смены пароля';
$string['unlocked'] = 'Разблокирован';
$string['unlockedifempty'] = 'Разблокирован если пуст';
$string['update_never'] = 'Никогда';
$string['update_oncreate'] = 'При создании';
$string['update_onlogin'] = 'При каждом входе';
$string['update_onupdate'] = 'При обновлении';
$string['informminpassworddigits'] = 'как минимум $a цифр'; // ORPHANED
$string['informminpasswordlength'] = 'как минимум $a символов'; // ORPHANED
$string['informminpasswordlower'] = 'как минимум $a букв в нижнем регистре'; // ORPHANED
$string['informminpasswordnonalphanum'] = 'как минимум $a символов, не являющихся буквами и цифрами'; // ORPHANED
$string['informminpasswordupper'] = 'как минимум $a букв в верхнем регистре'; // ORPHANED
$string['informpasswordpolicy'] = 'Пароль должен содержать $a'; // ORPHANED
$string['actauthhdr'] = 'Активные плагины аутентификации'; // ORPHANED
$string['alternatelogin'] = 'Если вы введёте здесь URL веб-страницы, то она будет использоваться в качестве страницы входа на сайт. Эта страница должна содержать форму, которая ведёт на <strong>\'$a\'</strong> и возвращает поля <strong>username</strong> и <strong>password</strong>.<br />Будьте внимательны, так как если вы введёте здесь неправильный URL, то заблокируете себе доступ к сайту.<br />Для использования стандартной страницы входа в систему оставьте это поле пустым.'; // ORPHANED
$string['alternateloginurl'] = 'Альтернативная страница входа в систему'; // ORPHANED
$string['auth_dbpasstype_key'] = 'Формат паролей'; // ORPHANED
$string['auth_dbtype_key'] = 'База данных'; // ORPHANED
$string['auth_dbuser_key'] = 'Пользователь БД'; // ORPHANED
$string['auth_emailrecaptcha'] = 'Добавляет в форму самостоятельной регистрации по электронной почте элемент визуального/аудио подтверждения. Этот метод позволяет защититься от спамеров, использующих ботов для автоматической регистрации. Подробности на http://recaptcha.net/learnmore.html. <br /><em>Для работы необходим модуль PHP cURL.</em>'; // ORPHANED
$string['auth_emailrecaptcha_key'] = 'Включить элемент reCAPTCHA'; // ORPHANED
$string['auth_emailsettings'] = 'Установки'; // ORPHANED
$string['auth_fieldlock'] = 'Блокировка значения'; // ORPHANED
$string['auth_fieldlocks'] = 'Блокировка полей'; // ORPHANED
$string['auth_fieldlocks_help'] = '<p>Вы можете запретить пользователям редактировать некоторые поля о себе. Это полезно для сайтов, где данные пользователей редактируются администратором вручную или загружаются с  помощью команды \'Загрузить пользователей\'. 
Если вы блокируете поля, которые необходимы для работы Moodle, убедитесь, что вы загружаете всю необходимую информацию, когда создаёте учётные записи, иначе учётная запись не будет работать.</p><p>Чтобы избежать подобных проблем можно попробовать установить блокировку в режим \'Разблокировано, если не заполнено\'</p>'; // ORPHANED
$string['auth_nologindescription'] = 'Дополнительный плагин, который не даёт пользователям возможность входить в систему, а также блокирует все сообщения, отправляемые пользователю. Может использоваться для \"замораживания\" учётных записей.'; // ORPHANED
$string['auth_nologintitle'] = 'Вход запрещён'; // ORPHANED
$string['auth_pop3port_key'] = 'Порт'; // ORPHANED
$string['auth_updatelocal'] = 'Обновлять локальное значение'; // ORPHANED
$string['auth_updateremote'] = 'Обновлять внешнее значение'; // ORPHANED
$string['createpasswordifneeded'] = 'Создавать пароль при необходимости'; // ORPHANED
$string['forcechangepassword_help'] = 'Заставить пользователей сменить пароль при следующем входе в Moodle.'; // ORPHANED
$string['forcechangepasswordfirst_help'] = 'Заставить пользователей сменить пароль при первом входе в Moodle.'; // ORPHANED
$string['forgottenpassword'] = 'Если вы введёте здесь URL веб-страницы, она будет использоваться для восстановления забытого пароля от сайта. Эта настройка предназначена для сайтов, где управление паролями осуществляется вне Moodle. Для использования стандартной процедуры восстановления пароля оставьте это поле пустым.'; // ORPHANED
$string['forgottenpasswordurl'] = 'Страница восстановления пароля'; // ORPHANED
$string['internal'] = 'Внутренний'; // ORPHANED
$string['locked'] = 'Заблокировано'; // ORPHANED
$string['selfregistration'] = 'Самостоятельная регистрация'; // ORPHANED
$string['selfregistration_help'] = 'Если выбран такой плагин аутентификации, как самостоятельная регистрация через электронную почту, это даёт возможность потенциальным пользователям зарегистрироваться самостоятельно и создать учётную запись. Это может привести к тому, что спамеры создадут учётные записи и будут использовать форумы, блоги и т.п. для распространения спама. Чтобы уменьшить риск, нужно отключить самостоятельную регистрацию или ограничить её, заполнив поле <em>Разрешенные почтовые домены</em>'; // ORPHANED
$string['sha1'] = 'SHA-1-шифрование'; // ORPHANED

?>
