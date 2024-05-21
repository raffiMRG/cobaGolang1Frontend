<?php
require 'functions.php';

$nim = [
  "nim" => $_GET['nim']
];

$response = callAPI('DELETE', 'http://localhost:1211/api/ListMahasiswa/DeleteData', $nim);

var_dump($nim);
echo "<hr>";
var_dump($response);
// header('Location: index.php');
?>
