<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama']
    ];

    $response = callAPI('POST', 'http://localhost:1211/api/ListMahasiswa/InsertData', $data);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form method="POST" action="">
        <label>NIM  :</label><br>
        <input type="text" name="nim"><br>
        <label>Name :</label><br>
        <input type="text" name="nama"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
