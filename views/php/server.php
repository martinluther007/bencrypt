<?php

$host_name = "localhost";
$user_name = "luther";
$password = "RE0I(D0CPK[-xmNF";
$db_name = "bencrypt";

$conn = mysqli_connect($host_name, $user_name, $password, $db_name);
if ($conn->connect_error)
    return die("something went wrong" . $conn->connect_error);
