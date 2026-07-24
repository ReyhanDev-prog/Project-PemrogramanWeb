<?php $page_title = 'Dashboard Admin'; include 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6"><div class="small-box bg-info"><div class="inner"><h3><?= $conn->query("SELECT COUNT(*) FROM dosen")->fetch_row()[0] ?></h3><p>Dosen</p></div></div></div>
        <div class="col-lg-4 col-6"><div class="small-box bg-success"><div class="inner"><h3><?= $conn->query("SELECT COUNT(*) FROM mahasiswa")->fetch_row()[0] ?></h3><p>Mahasiswa</p></div></div></div>
        <div class="col-lg-4 col-6"><div class="small-box bg-warning"><div class="inner"><h3><?= $conn->query("SELECT COUNT(*) FROM mata_kuliah")->fetch_row()[0] ?></h3><p>Mata Kuliah</p></div></div></div>
    </div>
</div>
<?php include 'footer.php'; ?>