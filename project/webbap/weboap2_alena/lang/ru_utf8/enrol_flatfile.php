<?PHP // $Id$ 
      // enrol_flatfile.php - created with Moodle 1.4 development (2004080300)


$string['description'] = 'Данным методом проверяется и обрабатывается текстовый файл специального формата по указанному вами пути. Файл может выглядеть примерно так:
<pre>
add, student, 5, CF101
add, teacher, 6, CF101
add, teacheredit, 7, CF101
del, student, 8, CF101
del, student, 17, CF101
add, student, 21, CF101, 1091115000, 1091215000
</pre>';
$string['enrolname'] = 'Текстовый файл';
$string['filelockedmail'] = 'Текстовый файл, используемый вами для регистрации не удается удалить с помошью процесса cron. Обычно это означает неверную установку прав доступа. Пожалуйста исправьте права доступа к файлу, так чтобы Moodle мог уго удалить, иначе он может быть обработан более одного раза.';
$string['filelockedmailsubject'] = 'Важная ошибка: Файл регистрации';
$string['location'] = 'Путь к файлу';
$string['mailadmin'] = 'Сообщить администрратору по почте';
$string['mailusers'] = 'Сообщить пользователю по почте';

?>
