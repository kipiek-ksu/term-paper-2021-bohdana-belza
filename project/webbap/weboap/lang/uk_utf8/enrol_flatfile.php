<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 1.4 development (2004080300)


$string['description'] = 'Даним методом перевіряється і обробляється текстовий файл спеціального формату по вказаному вами шляху. Файл може виглядати приблизно так:
<pre>
add, student, 5 CF101
add, teacher, 6 CF101
add, teacheredit, 7 CF101
del, student, 8 CF101
del, student, 17 CF101
add, student, 21 CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'Текстовий файл';
$string['filelockedmail'] = 'Текстовий файл, використовуваний вами для реєстрації не вдається видалити за допомогою процесу cron. Звичайне це означає невірне налаштування прав доступу. Будь ласка виправіть права доступу до файлу, так щоб Moodle міг його видалити, інакше він може бути оброблений більше одного разу.';
$string['filelockedmailsubject'] = 'Важлива помилка: Файл реєстрації';
$string['location'] = 'Шлях до файлу';
$string['mailadmin'] = 'Повідомити адміністратору поштою';
$string['mailusers'] = 'Повідомити користувача поштою';

?>
