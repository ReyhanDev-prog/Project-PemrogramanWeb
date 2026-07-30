<?php $page_title = 'Dashboard Dosen'; include 'header.php';
$user_id = $_SESSION['user_id'];
$dosen_id = $conn->query("SELECT id FROM dosen WHERE user_id=$user_id")->fetch_assoc()['id'];
$mk_count = $conn->query("SELECT COUNT(*) FROM mata_kuliah WHERE dosen_id=$dosen_id")->fetch_row()[0];
?>
<div class="container-fluid"><div class="row"><div class="col-lg-6"><div class="small-box bg-info"><div class="inner"><h3><?= $mk_count ?></h3><p>Mata Kuliah yang Diampu</p></div></div></div></div></div>
<?php include 'footer.php'; ?>