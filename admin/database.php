<?php
# @Author: kelompok 4
# @Date:   20 Desember 2024
# @Copyright: (c) Sambat Rakyat Banyumas 2024
?>
<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kp";

try {
    //create PDO connection
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}

// ambil data dari user yang login
function logged_admin () {
    global $db, $admin_login, $divisi, $id_admin;
    $sql = "SELECT * FROM admin, divisi WHERE admin.username = :username AND admin.divisi = divisi.id_divisi";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $admin_login);
    $stmt->execute();
    foreach ($stmt as $col) {
        $divisi = $col['nama_divisi'];
        $id_admin = $col['id_admin'];
    }
}
