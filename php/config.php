<?php
    $servername = "92.204.218.252";
    $DBusername = "evergreenusr";
	$DBpassword = "6JRPwUrjUP2MynU";
    $DBname = "evergreen";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBusername, $DBpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>