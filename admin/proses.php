<?php
session_start();
if ($_SESSION['role'] != 'admin') { header('Location: ../login.php'); exit; }
require_once '../config/database.php';

if (isset($_GET['hapus_dosen'])) {
    $id = $_GET['hapus_dosen'];
    $user = $conn->query("SELECT user_id FROM dosen WHERE id=$id")->fetch_assoc();
    $conn->query("DELETE FROM dosen WHERE id=$id");
    $conn->query("DELETE FROM users WHERE id=".$user['user_id']);
    header('Location: dosen.php'); exit;
}
if (isset($_GET['hapus_mahasiswa'])) {
    $id = $_GET['hapus_mahasiswa'];
    $user = $conn->query("SELECT user_id FROM mahasiswa WHERE id=$id")->fetch_assoc();
    $conn->query("DELETE FROM mahasiswa WHERE id=$id");
    $conn->query("DELETE FROM users WHERE id=".$user['user_id']);
    header('Location: mahasiswa.php'); exit;
}
if (isset($_GET['hapus_matakuliah'])) {
    $id = $_GET['hapus_matakuliah'];
    $conn->query("DELETE FROM mata_kuliah WHERE id=$id");
    header('Location: matakuliah.php'); exit;
}
header('Location: index.php');
exit;