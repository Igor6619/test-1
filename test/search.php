<?php
include "connect.php";
$str_search = $_POST['ss'];
$str_com="select * from comments where body like \"%$str_search%\"";
$rsc=mysql_query($str_com);
$kol_vo=mysql_num_rows($rsc);

for ($i=0; $i<$kol_vo; $i++)
{
$f=mysql_fetch_array($rsc);
$title_post="select * from posts where id=\"$f[postid]\"";
$rtp=mysql_query($title_post);
$ftp=mysql_fetch_array($rtp);
echo "<b>$ftp[title]</b><br>";
echo "$f[body] <br><br>";
}

echo "<br><br> <b>всего найдено: $kol_vo комментариев содержащих подстроку $str_search</b><br><br>";
?>
