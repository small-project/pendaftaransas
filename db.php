<?php
$servername = "localhost";
$username = "root";
$password = "anggaadityas";
$dbname = "sinergiadhidatabase";

    try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connection ok!";
    } catch (PDOException $e) {
    echo "Err: " . $e->getMessage();
    }
?>