<?php
$page_title = 'Isi KRS';
include 'header.php';

$user_id = $_SESSION['user_id'];
$mhs = $conn->query("SELECT id FROM mahasiswa WHERE user_id=$user_id")->fetch_assoc();
$mhs_id = $mhs['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_krs'])) {
    $mk_ids = $_POST['mk_ids'] ?? [];
    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    foreach ($mk_ids as $mk_id) {
        $check = $conn->query("SELECT * FROM krs WHERE mahasiswa_id=$mhs_id AND mata_kuliah_id=$mk_id AND semester='$semester' AND tahun_akademik='$tahun'");
        if ($check->num_rows == 0) {
            $conn->query("INSERT INTO krs (mahasiswa_id, mata_kuliah_id, semester, tahun_akademik) VALUES ($mhs_id, $mk_id, '$semester', '$tahun')");
        }
    }
    echo "<div class='alert alert-success'>KRS berhasil disimpan!</div>";
}

$mk_tersedia = $conn->query("SELECT * FROM mata_kuliah WHERE id NOT IN (SELECT mata_kuliah_id FROM krs WHERE mahasiswa_id=$mhs_id)");
$krs_list = $conn->query("SELECT mk.kode_mk, mk.nama_mk, mk.sks, krs.semester, krs.tahun_akademik, krs.nilai FROM krs JOIN mata_kuliah mk ON krs.mata_kuliah_id = mk.id WHERE krs.mahasiswa_id = $mhs_id");
?>
<div class="container-fluid">
<div class="card">
<div class="card-header">Isi KRS</div>
<div class="card-body">
<form method="POST">
<div class="form-row">
<div class="col-md-4"><label>Semester</label><input type="text" name="semester" class="form-control" value="Ganjil" required></div>
<div class="col-md-4"><label>Tahun Akademik</label><input type="text" name="tahun" class="form-control" value="2025/2026" required></div>
</div>
<h5 class="mt-3">Pilih Mata Kuliah</h5>
<?php if ($mk_tersedia->num_rows == 0) echo "<p class='text-muted'>Tidak ada mata kuliah tersedia.</p>";
else {
    while($mk = $mk_tersedia->fetch_assoc()) {
        echo "<div class='form-check'><input class='form-check-input' type='checkbox' name='mk_ids[]' value='{$mk['id']}'><label class='form-check-label'>{$mk['kode_mk']} - {$mk['nama_mk']} ({$mk['sks']} SKS)</label></div>";
    }
    echo "<button type='submit' name='tambah_krs' class='btn btn-primary mt-3'>Simpan KRS</button>";
} ?>
</form>
</div>
</div>
<div class="card">
<div class="card-header">KRS Saat Ini</div>
<div class="card-body">
<table class="table table-bordered">
<thead><tr><th>Kode</th><th>Mata Kuliah</th><th>SKS</th><th>Semester</th><th>Tahun</th><th>Nilai</th></tr></thead>
<tbody>
<?php if ($krs_list->num_rows == 0) echo "<tr><td colspan='6' class='text-center'>Belum mengambil mata kuliah.</td></tr>";
else while($krs = $krs_list->fetch_assoc()) echo "<tr><td>{$krs['kode_mk']}</td><td>{$krs['nama_mk']}</td><td>{$krs['sks']}</td><td>{$krs['semester']}</td><td>{$krs['tahun_akademik']}</td><td>".($krs['nilai']?:'-')."</td></tr>"; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
