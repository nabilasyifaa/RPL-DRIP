
<?php
session_start();
include '../includes/db.php';

$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama_menu"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $sql = "INSERT INTO menu (nama_menu, deskripsi, harga) VALUES ('$nama', '$deskripsi', $harga)";
    if ($conn->query($sql)) {
        $success = "Menu berhasil ditambahkan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Menu - DRIP</title>
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>

<div class="container">
  <div class="sidebar">
    <div class="logo">DRIP</div>
    <button class="nav-btn" onclick="window.location.href='dashboard.php'">Dashboard</button>
    <button class="nav-btn active">Menu</button>
    <button class="nav-btn" onclick="window.location.href='pembayaran.php'">Pembayaran</button>
    <button class="nav-btn" onclick="window.location.href='riwayat.php'">Riwayat</button>
    <form method="POST" action="../logout.php">
      <button class="logout">Logout</button>
    </form>
  </div>

  <div class="main-content">
    <h2 class="section-title">Tambah Menu Baru</h2>
    <?php if ($success): ?>
      <p style="color: green; font-weight: bold;"><?= $success ?></p>
    <?php endif; ?>

    <form method="POST" class="form-menu">
      <input type="text" name="nama_menu" placeholder="Nama Menu" required>
      <input type="text" name="deskripsi" placeholder="Deskripsi" required>
      <input type="number" name="harga" placeholder="Harga (angka saja)" required>
      <button type="submit">Tambah Menu</button>
    </form>
  </div>
</div>

</body>
</html>
