<?php

include "connect.php";


$homepage = file_get_contents('https://jsonplaceholder.typicode.com/posts');

$obj = json_decode($homepage,true);


$kol_vo_el= count($obj);


mysql_query("DELETE FROM posts;");

mysql_query("TRUNCATE TABLE posts;");

for ($i=0; $i<$kol_vo_el; $i++)

{
$userId=$obj[$i]['userId'];
$title= $obj[$i]['title'];
$body=$obj[$i]['body'];
$query_posts=mysql_query("insert into posts (userid, title, body) values ('$userId', '$title', '$body') ");
if ($query_posts)
{
//echo "строка $i успешно добавлена в базу<br>";
}


}




$homepage1 = file_get_contents('https://jsonplaceholder.typicode.com/comments');

$obj1 = json_decode($homepage1, true);

$kol_vo_el1= count($obj1);

mysql_query("DELETE FROM comments;");
mysql_query("TRUNCATE TABLE comments");

for ($i1=0; $i1<$kol_vo_el1; $i1++)

{

$postId=$obj1[$i1]['postId'];
$name= $obj1[$i1]['name'];
$email= $obj1[$i1]['email'];
$body1=$obj1[$i1]['body'];
$query_comments=mysql_query("insert into comments (postid, name,email, body) values ('$postId', '$name','$email', '$body1') ");
if ($query_comments)
{
//echo "строка $i1 успешно добавлена в базу<br>";
}

}

echo "<script>console.log('Загружено".$kol_vo_el." записей и ".$kol_vo_el1." комментариев');</script>";
?>
