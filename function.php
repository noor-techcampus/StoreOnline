<?php
//mysqli_connect();'4 parameters=>host,user,pass,dbname' -'1 return=>connection staus'
$host='localhost';
$user_name='root';
$password='root1234';
$DB_name='storeonline';
$connection= mysqli_connect($host,$user_name,$password,$DB_name);

/*if($connection) echo "connected";
else die('database error: '.mysqli_connect_error());//'die'shaw error and stop here*/
function check($var){
  $var=trim($var);//remove all spase
  $var=strip_tags($var);//remove tags of html
  $var=stripcslashes($var);//remove slashes'\'
  return $var;
}
 ?>
