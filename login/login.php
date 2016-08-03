<?php
$hostname = "127.0.0.1";
$username = "root";
$password =	"";
$connection = mysql_connect($hostname, $username, $password) or die ("Could not open connection to database");
mysql_select_db("account", $connection) or die ("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];
$entityBody = json_decode(file_get_contents('php://input'));
switch ($method){
case 'POST':
$username=$entityBody->username;
$password=$entityBody->password;

$checkid=mysql_query("SELECT * from personal WHERE username='$username' and password='$password'") or die ("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

	if($records==1){
		//echo "1";
		$arr = array('message' => 'now redirecting you to main page', 'status' => 'success');
		 echo json_encode($arr);
			
			
		}else{
			
			
		$arr = array('message' => 'wrong username or password ', 'status' => 'fail');
		  echo json_encode($arr);
			//echo "0";
			
		return;
	}
}
		?>
		
