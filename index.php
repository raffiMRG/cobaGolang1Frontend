<?php
require 'functions.php';

$users = callAPI('GET', 'http://localhost:1211/api/ListMahasiswa/GetData', false);
$users = json_decode($users, true);
// var_dump($users["Data"]);
// die;

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
</head>
<body>
    <h1>Users</h1>
    <a href="create.php">Create New User</a>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users['Data'] as $user): ?>
        <tr>
            <td><?php echo $user['nim']; ?></td>
            <td><?php echo $user['nama']; ?></td>
            <td>
                <a href="update.php?nim=<?php echo $user['nim']; ?>">Edit</a>
                <a href="delete.php?nim=<?php echo $user['nim']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
