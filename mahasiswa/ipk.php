<?php $page_title = 'Hitung IPK'; include 'header.php';
$user_id = $_SESSION['user_id'];
$mhs_id = $conn->query("SELECT id FROM mahasiswa WHERE user_id=$user_id")->fetch_assoc()['id'];

function nilai_mutu($nilai) {
    $map = ['A'=>4.0, 'B+'=>3.5, 'B'=>3.0, 'C+'=>2.5, 'C'=>2.0, 'D'=>1.0, 'E'=>0.0];
    return $map[$nilai] ?? 0;
}
$result = $conn->query("SELECT mk.sks, krs.nilai FROM krs JOIN mata_kuliah mk ON krs.mata_kuliah_id = mk.id WHERE krs.mahasiswa_id = $mhs_id AND krs.nilai IS NOT NULL");
$total_sks = 0; $total_mutu = 0;
while($row = $result->fetch_assoc()) {
    $mutu = nilai_mutu($row['nilai']) * $row['sks'];
    $total_sks += $row['sks'];
    $total_mutu += $mutu;
}
$ipk = ($total_sks > 0) ? round($total_mutu / $total_sks, 2) : 0;
?>
<div class="container-fluid"><div class="card"><div class="card-header">IPK</div><div class="card-body">
<h3>Total SKS: <?= $total_sks ?></h3><h3>Total Mutu: <?= $total_mutu ?></h3>
<h1 class="text-primary">IPK: <?= $ipk ?></h1>
</div></div></div>
<?php include 'footer.php'; ?>