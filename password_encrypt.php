<?php
/**
*1.密码加盐加密
*2.密码验证
*/
 function encryptPassword($password) {
 	$salt = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
 	$password = md5($password.$salt);
 	return [
 		"password" => $password,
 		"salt" => $salt
 	];
 }

 function passwordEquals($needle, $password, $salt) {
 	$newPassword = md5($needle.$salt);
 	if (hash_equals($newPassword, $password)) {
 		return true;
 	} else {
 		return false;
 	}
 }

$password = "123456";
$data = encryptPassword($password);

var_dump($data);

$encryptedPassword = 'e6e8f8f93526824712f0e28153fa0047';
$salt = '$2y$10$6f7M8OaTpFYhr24x1FeHquup5qoFzlTqZJ1/aml95wSBT27LKSRa2';

$equalResult = passwordEquals($password, $data['password'], $data['salt']);

var_dump($equalResult);

echo "<br>";
echo "password加密的长度是：" . strlen($encryptedPassword);

echo "<br>";
echo "salt加密的长度是：" . strlen($salt);






