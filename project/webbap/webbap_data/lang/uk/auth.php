<?PHP // $Id$ 
      // auth.php - created with Moodle 1.3.1 + (2004052501)


$string['auth_dbdescription'] = 'Цей метод використовує зовнішню базу даних для перевірки пари логін/пароль. При створенні нового облікового запису, інформація з полів може бути скопійована в систему.';
$string['auth_dbextrafields'] = '<p>Ці поля додаткові. Ви можете обрати попереднє заповнення деяких полів даних користувачів з полів зовнішньої бази даних, зазначеної тут.</p> <p>Не заповнюйте поле, для використання налаштувань за замовченням </p>
<p>У кожному разі, користувач зможе редагувати всі поля після того, як він зайде в систему.</p>';
$string['auth_dbfieldpass'] = 'Назва поля, що містить пароль';
$string['auth_dbfielduser'] = 'Назва поля, що містить логін';
$string['auth_dbhost'] = 'Комп\'ютер, на якому запущено сервер бази даних.';
$string['auth_dbname'] = 'Назва бази даних';
$string['auth_dbpass'] = 'Пароль, що відповідає зазначеному логіну';
$string['auth_dbpasstype'] = 'Визначає формат використовуваних паролів.  MD5-кодування найбільш підходить при з\'єднанні з іншими web-додатками, наприклад, PostNuke';
$string['auth_dbtable'] = 'Назва таблиці в базі даних';
$string['auth_dbtitle'] = 'Використати зовнішню базу даних';
$string['auth_dbtype'] = 'Тип бази даних (Див. <a href=\"../lib/adodb/readme.htm#drivers\">Документацію по ADO db</a> для деталей)';
$string['auth_dbuser'] = 'Логін користувача із правами тільки на читання для бази даних';
$string['auth_emaildescription'] = 'Підтвердження за допомогою електронної пошти - використовуваний за замовчуванням метод ідентифікації. При реєстрації користувача, на зазначену адресу електронної пошти відправляється лист із проханням про підтвердження реєстрації. Лист містить безпечне посилання на сторінку, де користувач може підтвердити обліковий запис. Надалі при вході в систему звіряються ім\'я користувача і пароль із їхніми значеннями в базі даних.';
$string['auth_emailtitle'] = 'E-mail - ідентифікація';
$string['auth_imapdescription'] = 'Цей метод використовує IMAP-сервер для перевірки відповідності пари логін/пароль.';
$string['auth_imaphost'] = 'Адреса  IMAP-сервера. Використайте IP-адресу, не DNS-ім\'я.';
$string['auth_imapport'] = 'Номер порту для IMAP-сервера. Звичайно в діапазоні від 143 до 993.';
$string['auth_imaptitle'] = 'Використати IMAP-сервер';
$string['auth_imaptype'] = 'Тип сервера IMAP. Сервери IMAP можуть мати різні типи ідентифікації і переговорів.';
$string['auth_ldap_bind_dn'] = 'Якщо Ви хочете за допомогою під\'єднаного користувача знайти інших користувачів, зазначте це тут. Наприклад, \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_pw'] = 'Пароль для під\'єднаного користувача.';
$string['auth_ldap_contexts'] = 'Список контекстів користувачів . Відокремте різні контексти \';\'. Наприклад: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_create_context'] = 'Якщо Ви дозволили реєстрування користувачів при підтвердженні поштою, визначте контекст, у який будуть вводитися користувачі. Цей контекст повинен відрізнятися від інших, щоб запобігти проблемам безпеки. Немає необхідності додавати, назва контексту до ldap_context-змінних, система буде шукати користувачів цього контексту автоматично.';
$string['auth_ldap_creators'] = 'Список груп, членам яких дозволяється створювати нові курси. Список груп розділяйте за допомогою \';\'. Наприклад,\'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_host_url'] = 'Зазначте LDAP-хост у вигляді URL\'а, наприклад \'ldap://ldap.myorg.com/\' або \'ldaps://ldap.myorg.com/\' ';
$string['auth_ldap_memberattribute'] = 'Визначте атрибут користувача, за яким він є приналежним до групи. Звичайно - \'учасник\'';
$string['auth_ldap_search_sub'] = 'Укажіть значення <> 0 якщо Вам зручно шукати користувачів по субконтекстам.';
$string['auth_ldap_update_userinfo'] = 'Оновлюйте інформацію про користувачів(Ім\'я, Прізвище, адресу ..) від LDAP до системи. Дивіться /auth/ldap/attr_mappings.php для того, щоб відобразити інформацію.';
$string['auth_ldap_user_attribute'] = 'Атрибут,що використовується для імені/пошуку користувачів. Звичайно, \'cn\'.';
$string['auth_ldap_version'] = 'Версія LDAP протоколу, який використовує Ваш сервер';
$string['auth_ldapdescription'] = 'Цей метод забезпечує ідентифікацію за допомогою LDAP-сервера. Якщо даний логін і пароль чинні, створюється новий обліковий запис користувача у базі дані системи. Цей модуль може читати поля від LDAP-сервера й заповнювати необхідні області (поля) у системі. Надалі перевіряються тільки логін і пароль';
$string['auth_ldapextrafields'] = 'Ці поля додаткові. Ви можете обрати попереднє заповнення деяких полів даних користувачів з полів LDAP, зазначених тут. <br />Не заповнюйте це поле, для того, щоб не переносити дані СLDAP.<br />У кожному разі, користувач зможе редагувати всі поля після того, як він зайде в систему.';
$string['auth_ldaptitle'] = 'Використати LDAP-сервер';
$string['auth_manualdescription'] = 'Цей метод скасовує будь-яку можливість створення власних облікових записів користувачами. Усі облікові записи повинні бути вручну створені користувачем адміністрації.';
$string['auth_manualtitle'] = 'Тільки вручну заведені  облікові записи.';
$string['auth_multiplehosts'] = 'Хости, що повторюються багато разів,можуть бути означені (наприклад, host1.com;host2.com;host3.com)';
$string['auth_nntpdescription'] = 'Цей метод використовує NNTP-сервер для визначення відповідності логіна й пароля.';
$string['auth_nntphost'] = 'Адреса NNTP-сервера. Використовуйте IP-адресу, не DNS-ім\'я.';
$string['auth_nntpport'] = 'Номер порту сервера (звичайно 119)';
$string['auth_nntptitle'] = 'Використовувати NNTP-сервер';
$string['auth_nonedescription'] = 'Користувачі можуть реєструватися й створювати облікові записи негайно, без ідентифікації на зовнішньому сервері й підтверджень через електронну пошту. Будьте уважним, використовуючи цю опцію - подумайте про захист і проблеми адміністрування, які можуть виникнути.';
$string['auth_nonetitle'] = 'Не використовувати ідентифікацію';
$string['auth_pop3description'] = 'Цей метод використовує POP3-сервер для визначення відповідності й правильності пари логін/пароль.';
$string['auth_pop3host'] = 'Адреса POP3-сервера. Використовуйте IP-адресу, не DNS-ім\'я.';
$string['auth_pop3port'] = 'Номер порту сервера (звичайно 110)';
$string['auth_pop3title'] = 'Використати POP3-сервер';
$string['auth_pop3type'] = 'Тип сервера. Якщо Ваш сервер використовує захист  на основі сертифікатів, використовуйте pop3cert.';
$string['auth_user_create'] = 'Дозволити реєстрування користувачів';
$string['auth_user_creation'] = 'Нові (анонімні) користувачі можуть створювати облікові записи на зовнішньому джерелі ідентифікації та підтверджувати їх через електронну пошту. Якщо Ви дозволите це, не забудьте також налагодити визначені модулем опції для створення користувача.';
$string['auth_usernameexists'] = 'Обраний логін уже існує. Оберіть інший.';
$string['authenticationoptions'] = 'Параметри ідентифікації';
$string['authinstructions'] = 'Тут Ви можете написати інструкції для Ваших користувачів, щоб вони знали, який логін і пароль потрібно використовувати. Текст, який Ви вводите, з\'явиться на сторінці входу в систему. Якщо Ви залишите  поле порожнім, ніяких інструкцій друкуватися не буде.';
$string['changepassword'] = 'Змінити пароль URL ';
$string['changepasswordhelp'] = 'Тут Ви можете визначити спосіб, яким користувачі можуть повернути або змінити свій логін/пароль, якщо вони забули його. Користувачі побачать кнопку на сторінці входу в систему і їхній сторінці. якщо Ви не заповните поле, кнопка виводиться не буде.';
$string['chooseauthmethod'] = 'Оберіть спосіб ідентифікації: ';
$string['guestloginbutton'] = 'Кнопка гостьового входу';
$string['instructions'] = 'Інструкції';
$string['md5'] = 'MD5-кодування';
$string['plaintext'] = 'Текст';
$string['showguestlogin'] = 'Ви можете обрати чи показувати кнопку гостьового доступу до системи.';

?>
