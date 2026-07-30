<?php $page_title = 'Dashboard Mahasiswa'; include 'header.php';
$user_id = $_SESSION['user_id'];
$mhs = $conn->query("SELECT * FROM mahasiswa WHERE user_id=$user_id")->fetch_assoc();
$jumlah_krs = $conn->query("SELECT COUNT(*) FROM krs WHERE mahasiswa_id=".$mhs['id'])->fetch_row()[0];
?>
<div class="container-fluid"><div class="row"><div class="col-md-6"><div class="card"><div class="card-header">Profil</div><div class="card-body">
<p><strong>NIM:</strong> <?= $mhs['nim'] ?></p><p><strong>Nama:</strong> <?= $mhs['nama'] ?></p>
<p><strong>Program Studi:</strong> <?= $mhs['program_studi'] ?></p><p><strong>Jumlah KRS:</strong> <?= $jumlah_krs ?></p>
</div></div></div></div></div>
<?php include 'footer.php'; ?>