<?php
$page_title = 'Isi Nilai';
include 'header.php';

$user_id = $_SESSION['user_id'];
$dosen_id = $conn->query("SELECT id FROM dosen WHERE user_id=$user_id")->fetch_assoc()['id'];

// Proses simpan nilai – dengan pengecekan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_nilai'])) {
    if (isset($_POST['nilai']) && is_array($_POST['nilai'])) {
        foreach ($_POST['nilai'] as $krs_id => $nilai) {
            $nilai = strtoupper(trim($nilai));
            if ($nilai != '') {
                $conn->query("UPDATE krs SET nilai='$nilai' WHERE id=$krs_id");
            }
        }
        echo "<div class='alert alert-success'>Nilai berhasil disimpan!</div>";
    } else {
        echo "<div class='alert alert-warning'>Tidak ada data nilai yang dikirim.</div>";
    }
}

$mk_result = $conn->query("SELECT * FROM mata_kuliah WHERE dosen_id = $dosen_id");
?>
<div class="container-fluid">
<?php while ($mk = $mk_result->fetch_assoc()): ?>
<div class="card">
<div class="card-header"><h5><?= $mk['kode_mk'] ?> - <?= $mk['nama_mk'] ?></h5></div>
<div class="card-body">
<form method="POST">
<table class="table table-bordered">
<thead><tr><th>NIM</th><th>Nama Mahasiswa</th><th>Nilai</th></tr></thead>
<tbody>
<?php
$krs_result = $conn->query("
SELECT krs.id, m.nim, m.nama, krs.nilai
FROM krs
JOIN mahasiswa m ON krs.mahasiswa_id = m.id
WHERE krs.mata_kuliah_id = " . $mk['id']
);
if ($krs_result->num_rows == 0) {
    echo "<tr><td colspan='3' class='text-center'>Tidak ada mahasiswa.</td></tr>";
} else {
    while ($krs = $krs_result->fetch_assoc()):
        ?>
        <tr>
        <td><?= $krs['nim'] ?></td>
        <td><?= $krs['nama'] ?></td>
        <td>
        <select name="nilai[<?= $krs['id'] ?>]" class="form-control">
        <option value="">-- Pilih --</option>
        <?php
        $opsi = ['A','B+','B','C+','C','D','E'];
    foreach ($opsi as $opt) {
        $selected = ($krs['nilai'] == $opt) ? 'selected' : '';
        echo "<option value='$opt' $selected>$opt</option>";
    }
    ?>
    </select>
    </td>
    </tr>
    <?php
    endwhile;
}
?>
</tbody>
</table>
<button type="submit" name="update_nilai" class="btn btn-primary">Simpan Nilai</button>
</form>
</div>
</div>
<?php endwhile; ?>
</div>
<?php include 'footer.php'; ?>
