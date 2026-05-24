<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv -> load();

$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try{
    $pdo_conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ));
}
catch(PDOException $e){
    die("Koneksi Gagal: " . $e->getMessage());
}
?>