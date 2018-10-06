<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "127.0.0.1:53846";
$database_condb = "db_book";
$username_condb = "root";
$password_condb = "12345678";
$condb = new mysqli($hostname_condb, $username_condb, $password_condb, $database_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>