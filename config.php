<?php

// Start Connect To DataBase

# Connection Variables

$host = 'localhost';

$user = 'root';

$pass = '';

$dbname = 'mydoctor';

# Connection Variable

@$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
  echo "Connection Faild => " . mysqli_connect_error();
}
