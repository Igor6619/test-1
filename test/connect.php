<?php
if (!mysql_connect(localhost, test, 123456 ))
{
echo "ошибка соединения с базой данных";
exit;
}

mysql_select_db(test);


?>
