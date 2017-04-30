<?php
    $host = 'localhost';// Nama hostny
    $username = 'root'; // Username
    $password = ''; // Password (Isi jika menggunakan password)
    $database = 'crud_ajax'; // Nama databasenya

    // Koneksi ke MySQL dengan PDO
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>