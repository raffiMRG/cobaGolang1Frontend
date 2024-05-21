<?php 
require 'functions.php';
// chek apakah ada nim
if(!isset($_GET['nim'])){
  header("Location: index.php");
}

$nim = [
  "nim" => $_GET['nim']
];
$users = callAPI('GET', 'http://localhost:1211/api/ListMahasiswa/GetData', $nim);
$users = json_decode($users, true);
// var_dump($users);

// chek apakah nim yang dimasukan benar
if($users['Data'] == null){
  header("Location: index.php");
}

$nim = $users['Data'][0]['nim'];
$nama = $users['Data'][0]['nama'];

// chek apakah tombol submit ditekan
if(isset($_POST['submit'])){
  $data = [
    "nim" => $nim,
    "nama" => $_POST['newName']
  ];
  $users = callAPI('PUT', 'http://localhost:1211/api/ListMahasiswa/UpdateData', $data);
  $users = json_decode($users, true);
  // $message = $users['Message'];
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <a href="http://localhost:8080/learn%20coding/GOLANG/modulCoba/ListMahasiswaFrontend/">Kembali</a>
  <hr>
  <form action="" method="post">
    <input name="newName" type="text" value="<?= $nama ?>">
    <button type="submit" name="submit">Submit</button>
  </form>
</body>
</html>