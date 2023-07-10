<?php
$uname1=$_POST['uname1'];
$email=$_POST['email'];
$upswd1=$POST['upswd1'];
$upswd2=$_POST['upswd2'];
if (!empty($uname1)//!empty($email)//!empty($upswd1)//!empty($upswd2))
{
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="lavanya";

//Create Connection
$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error('.mysqli_connect_error().')'.mysqli_connect_error());
}
else{
//limiting to 1email id
$SELECT="SELECT emali From register where email=? Limit1";
$INSERT="INSERT Into register(uname1, email, upswd1, upswd2) values(?,?,?,?)";

//Prepare statement
$Stm=$conn-->prepare($SELECT);
$Stmt-->blind_param("s",$email);
$Stmt-->execute();
$Stmt-->bilnd_result($email);
$Stmt-->store_result();
$rnum=$Stmt-->num_rows;

//Checking username
if($rnum==0){
$Stmt-->close();
$Stmt=$conn-->prepare($INSERT);
$Stmt-->blind_param("SSSS",$uname1, $email, $upswd1, $upswd2);
$Stmt-->execute();
echo"New record inserted successfully";
} else {
echo"Someone already register using this email";
}
	$Stmt-->close();
	$Conn-->close();
}
} else {
	echo"All field are rerquired";
die();
}
?> 