<?PHP // $Id$ 
      // auth.php - created with Moodle 1.4 development (2004070800)


$string['auth_dbdescription'] = 'Цей метод використовує зовнішню базу даних для перевірки пари логін/пароль. При створенні нового облікового запису інформація з полів може бути скопійована в систему. ';
$string['auth_dbextrafields'] = '<p>Ці поля додаткові. Ви можете вибрати попереднє заповнення деяких полів даних користувача з полів зовнішньої бази даних, вказаної тут. </p><p>Не заповнюйте поле, для використання налащтуванб за замовчанням.</p>
<p> В будь-якому випадку, користувач зможе редагувати всі поля після того, як він зайде в систему.</p>';
$string['auth_dbfieldpass'] = ' Назва поля, що містить пароль ';
$string['auth_dbfielduser'] = ' Назва поля, що містить логін ';
$string['auth_dbhost'] = 'Комп’ютер, на якому запущений сервер бази даних';
$string['auth_dbname'] = 'Назва бази даних';
$string['auth_dbpass'] = 'Пароль, що відповідає вказаному логіну';
$string['auth_dbpasstype'] = ' Визначає формат використовуваних паролів.  MD5-кодування, найбільш відповідне при з\'єднанні з іншими web-додатками, наприклад PostNuke';
$string['auth_dbtable'] = 'Назва таблиці в базі даних';
$string['auth_dbtitle'] = 'Використовувати зовнішню базу даних';
$string['auth_dbtype'] = 'Тип бази даних (Див. <a href=\"../lib/adodb/readme.htm#drivers\">Документацію по ADO db</a> для деталей)';
$string['auth_dbuser'] = 'Логін користувача з правами тільки на читання для бази даних';
$string['auth_emaildescription'] = ' Підтвердження за допомогою електронної пошти - використовуваний за умовчанням метод аутентифікації. При реєстрації користувача на вказану адресу електронної пошти відправляється лист з проханням про підтвердження реєстрації. Лист містить випадково створене (безпечне) посилання на сторінку, де користувач може підтвердити обліковий запис. Надалі при вході в систему звіряються ім\'я користувача і пароль з їх значеннями в базі даних.';
$string['auth_emailtitle'] = 'E-mail - аутентифікація';
$string['auth_imapdescription'] = ' Цей метод використовує IMAP-сервер для перевірки відповідності пари логін/пароль.';
$string['auth_imaphost'] = ' Адреса  IMAP-сервера. Використовуйте IP-адресу, не DNS-ім\'я.';
$string['auth_imapport'] = 'Номер порту для IMAP-сервера. Зазвичай в діапазоні від 143 до 993.';
$string['auth_imaptitle'] = 'Використовувати IMAP-сервер';
$string['auth_imaptype'] = 'Тип сервера IMAP. Сервери IMAP можуть мати різні типи ідентифікації і переговорів.';
$string['auth_ldap_bind_dn'] = ' Якщо Ви хочете зв\'язаного користувача для пошуку користувачів, вкажіть це тут. Наприклад \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_pw'] = 'Пароль для скріплення користувача.';
$string['auth_ldap_contexts'] = 'Список контекстів, де розташовані користувачі . Відокремте різні контексти \';\'. Наприклад: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_create_context'] = 'Якщо Ви дозволили створення користувачів при підтвердженні поштою, визначте контекст, в який заноситимуться користувачі. Цей контекст повинен відрізнятися від інших, щоб запобігти проблемам безпеки. Немає необхідності додавати назву контексту до ldap_context-змінних, система шукатиме користувачів від цього контексту автоматично.';
$string['auth_ldap_creators'] = 'Список груп, членам яких дозволяється створювати нові курси. Список груп розділяйте за допомогою \';\'. Наприклад,\'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_host_url'] = 'Вкажіть LDAP-хост у вигляді URL\'а, наприклад \'ldap://ldap.myorg.com/\' або \'ldaps://ldap.myorg.com/\' ';
$string['auth_ldap_memberattribute'] = 'Визначте призначений для користувача атрибут, що визначає приналежність користувача до групи. Зазвичай \'участник\'';
$string['auth_ldap_search_sub'] = 'Вкажіть значення <> 0 якщо Вам подобається шукати користувачів по субконтекстах.';
$string['auth_ldap_update_userinfo'] = 'Оновлюйте призначену для користувача інформацію (Ім\'я, Прізвище, адресу ..) від LDAP до системи. Дивіться /auth/ldap/attr_mappings.php для того, щоб відобразити інформацію.';
$string['auth_ldap_user_attribute'] = 'Атрибут, використовуваний ім\'я/пошук. Звичайно \'cn\'.';
$string['auth_ldap_version'] = 'Версія LDAP протоколу, яку використовує Ваш сервер.';
$string['auth_ldapdescription'] = 'Цей метод забезпечує аутентифікацію за допомогою LDAP-сервера. Якщо даний логін і пароль мають силу, створюється новий призначений для користувача обліковий запис в базі даних системи. Цей модуль може читати поля від LDAP-сервера і заповнювати необхідні області (поля) в системі. Надалі перевіряються тільки логін і пароль';
$string['auth_ldapextrafields'] = 'Ці поля додаткові. Ви можете вибрати попереднє заповнення деяких полів призначених для користувача даних від полів LDAP, вказаного тут. <p>Не заповнюйте це поле, для того, щоб не переносити дані з LDAP.</p><p>В будь-якому випадку, користувач зможе редагувати всі поля після того, як він зайде в систему.</p>';
$string['auth_ldaptitle'] = 'Використовувати LDAP-сервер';
$string['auth_manualdescription'] = 'Цей метод видаляє будь-який шлях для користувачів, для створення власних облікових записів. Всі облікові записи повинні бути уручну створені користувачем адміністрації.';
$string['auth_manualtitle'] = 'Тільки заведені вручну облікові записи';
$string['auth_multiplehosts'] = 'У разі декількох хостів вони повинні бути вказані таким чином: host1.com;host2.com;host3.com
';
$string['auth_nntpdescription'] = 'Цей метод використовує NNTP-сервер для визначення відповідності логіна і пароля.';
$string['auth_nntphost'] = 'Адреса NNTP-сервера. Використовуйте IP-адресу, не DNS-ім\'я.';
$string['auth_nntpport'] = 'Номер порту сервера (звичайно, 119)';
$string['auth_nntptitle'] = 'Використовувати NNTP-сервер';
$string['auth_nonedescription'] = 'Користувачі можуть реєструватися і створювати облікові записи негайно, без ідентифікації із зовнішнього сервера і підтверджень через електронну пошту. Будьте уважним, використовуючи цю опцію - подумайте про захист і проблеми адміністрування, які можуть виникнути.';
$string['auth_nonetitle'] = 'Не використовувати аутентифікацію';
$string['auth_pop3description'] = 'Цей метод використовує POP3-сервер для визначення відповідності і правильності пари логін/пароль.';
$string['auth_pop3host'] = 'Адреса POP3-сервера. Використовуйте IP-адресу, не DNS-ім\'я.';
$string['auth_pop3port'] = 'Номер порту сервера (звичайно 110)';
$string['auth_pop3title'] = 'Використовувати POP3-сервер';
$string['auth_pop3type'] = 'Тип сервера. Якщо ваш сервер використовує захист, заснований на сертифікатах, використовуйте pop3cert.';
$string['auth_user_create'] = 'Вирішити створення користувачів';
$string['auth_user_creation'] = 'Нові (анонімні) користувачі можуть створювати облікові записи на зовнішньому джерелі аутентифікації і підтверджувати через електронну пошту. Якщо Ви вирішите це, не забудьте також конфігурувати визначені модулем опції для закладу користувача.';
$string['auth_usernameexists'] = 'Вибраний логін вже існує. Виберіть інший.';
$string['authenticationoptions'] = 'Налаштування аутентифікації';
$string['authinstructions'] = 'Тут Ви можете написати інструкції для ваших користувачів, для того, щоб вони знали, який логін і пароль вони повинні використовувати. Текст, який Ви вводите тут, з\'явиться на сторінці входу в систему. Якщо Ви залишите  поле порожнім, ніяких інструкцій відображено не буде.';
$string['changepassword'] = 'Змінити URL з паролем';
$string['changepasswordhelp'] = 'Тут Ви можете визначити спосіб, яким користувачі можуть повернути або змінити їх логін/пароль, якщо вони забули його. Користувачі побачать кнопку на сторінці входу в систему і їх призначеній для користувача сторінці. Якщо Ви не заповните поле, кнопка виводиться не буде.';
$string['chooseauthmethod'] = 'Виберіть метод аутентифікації: ';
$string['guestloginbutton'] = 'Кнопка гостьового входу';
$string['instructions'] = 'Інструкції';
$string['md5'] = 'MD5- шифрування';
$string['plaintext'] = 'Текст';
$string['showguestlogin'] = 'Ви можете вибрати: показувати чи ні кнопку гостьового доступу в систему.';

?>



