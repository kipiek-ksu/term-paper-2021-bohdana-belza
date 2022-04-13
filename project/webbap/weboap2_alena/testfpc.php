<?php

require_once("config.php");
global $CFG;

$s = 0;
exec("$CFG->currentcompiler $CFG->compilersdataroot\\testfpc.pas",$output,$s);


if (!$s) {
	echo("<p class=\"text\"><b>Компіляція пройшла успішно</b></p>");
  $s_ = 0;
  exec("$CFG->compilersdataroot\\testfpc.exe",$output_,$s_);
  if (!$s_) {
    echo("<p class=\"text\"><b>Запуск пройшов успішно</b></p>");
    print_r($output_);
  } else {
    echo("<p class=\"text\"><b>Помилка запуску</b></p>");
  }
} else {
	echo("<p class=\"error\"><b>Помилка компіляції</b></p>");
  echo("<p class=\"text\"><b>"); echo($s);  echo("</b></p>");
  print_r($output);
}
  




?>