<?php $page_title = 'Data Dosen'; include 'header.php'; 
$result = $conn->query("SELECT d.*, u.username FROM dosen d JOIN users u ON d.user_id = u.id");
?>
<div class="card"><div class="card-header"><h3 class="card-title">Daftar Dosen</h3><a href="dosen_tambah.php" class="btn btn-primary float-right">Tambah Dosen</a></div>
<div class="card-body"><table class="table table-bordered"><thead><tr><th>NIDN</th><th>Nama</th><th>Username</th><th>Aksi</th></tr></thead><tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['nidn'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['username'] ?></td>
<td><a href="dosen_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="proses.php?hapus_dosen=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a></td></tr>
<?php endwhile; ?></tbody></table></div></div>
<?php include 'footer.php'; ?>