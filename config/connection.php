<?php
$server = "remotemysql.com:3306";
$username = "hVQWBJTceN";
$password = "5beLVTmaTt";
$database = "hVQWBJTceN";
// $port = 3306;

try{
     // Create connection database
$conn =  mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
     // echo "Connected Failed";
//   die("<script>alert('Connection Faid!!!!')</script>");
}else{
     // echo "Connected successfully";
     // die("<script>alert('Yeah Connected successfully!')</script>");
}

}catch(Exception $e){
     echo "Server Internal is Error!!!!";
}
function del($table,$where){
	global $conn;
	mysqli_query($conn,"SET NAMES utf8");
	return mysqli_query($conn,"DELETE FROM $table  WHERE $where");
}

function qry($sql){
	global $conn;
	mysqli_query($conn,"SET NAMES utf8");
	return mysqli_query($conn,$sql);
}
function assoc($sql){
	global $conn;
	mysqli_query($conn,"SET NAMES utf8");
	$qry = mysqli_query($conn,$sql);
	return mysqli_fetch_assoc($qry);
}
function insert($table,$field,$value){
	global $conn;
	mysqli_query($conn,"SET NAMES utf8");
	return mysqli_query($conn,"INSERT INTO $table($field) VALUES($value)");
}
function update($table,$set,$where){
	global $conn;
	mysqli_query($conn,"SET NAMES utf8");
	return mysqli_query($conn,"UPDATE $table SET $set WHERE $where");

}
