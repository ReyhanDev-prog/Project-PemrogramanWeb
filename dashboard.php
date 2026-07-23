<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$role = $_SESSION['role'];

if ($role == 'admin') {
    header('Location: admin/index.php');
} elseif ($role == 'dosen') {
    header('Location: dosen/index.php');
} elseif ($role == 'mahasiswa') {
    header('Location: mahasiswa/index.php');
} else {
    header('Location: login.php');
}

exit;