<?php


    define('DBPORT', '3306');
    define('DBHOST', 'mysql5.die-webwerkstatt.de');
    define('DBUSER', 'db305635_6');
    define('DBPASS', 'n-tb5peAnqz2');
    define('DBNAME', 'db305635_6');


    $db = new PDO("mysql:host=" . DBHOST . ";port=" . DBPORT . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    session_start();

    abstract class AssistantTypes
    {
      const none=0;
      const blank=1;
      const pic=2;
      const chat=3;
      const search=4;
    }
?>
