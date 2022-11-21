# sql_anti_inject_php
* Защита от SQL инъекций в PHP
* Пример кода
[code] 
<?php
-include "class.protect.php";
-$inj=new por_inject();
-$_GET=$inj->portectf($_GET);
-$_POST=$inj->portectf($_POST);
-$_SESSION=$inj->portectf($_SESSION);
-$_COOKIE=$inj->portectf($_COOKIE);
?>
[/code] 
