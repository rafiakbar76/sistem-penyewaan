<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "travel";

$koneksidb = mysqli_connect($host, $username, $password, $database);
if (!$koneksidb) {
  echo "Failed Connection !";
}
?>