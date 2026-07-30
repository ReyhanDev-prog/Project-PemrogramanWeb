<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/config/database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin | SIAKAD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav"><li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li></ul>
        <ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li></ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link"><span class="brand-text font-weight-light">SIAKAD Admin</span></a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li class="nav-item"><a href="index.php" class="nav-link <?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="dosen.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'dosen')!==false?'active':'' ?>"><i class="nav-icon fas fa-chalkboard-teacher"></i><p>Dosen</p></a></li>
                    <li class="nav-item"><a href="mahasiswa.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'mahasiswa')!==false?'active':'' ?>"><i class="nav-icon fas fa-user-graduate"></i><p>Mahasiswa</p></a></li>
                    <li class="nav-item"><a href="matakuliah.php" class="nav-link <?= strpos($_SERVER['PHP_SELF'], 'matakuliah')!==false?'active':'' ?>"><i class="nav-icon fas fa-book"></i><p>Mata Kuliah</p></a></li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <div class="content-header"><div class="container-fluid"><div class="row mb-2"><div class="col-sm-6"><h1 class="m-0"><?= $page_title ?? 'Dashboard' ?></h1></div></div></div></div>
        <section class="content">