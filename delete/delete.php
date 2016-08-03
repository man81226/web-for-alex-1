<?php
$hostname = "127.0.0.1";
$username = "root";
$password =	"";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("account", $connection) or die ("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

switch ($method){

    case 'DELETE':

    parse_str(file_get_contents("php://input"),$post_vars);

 

      $username=$post_vars['username'];
      $password=$post_vars['password'];

 
$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password'") or die("Could not issue MySQL query");
$records = mysql_num_rows($checkid);

if($records>0){
	$sqlstring="delete from personal where username='$username'";
	
	mysql_query($sqlstring);
	echo "Here is Delete";
}else{
	
	echo "Fail to login";
	return;
}
   
 

    break;
}

	?>