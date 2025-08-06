<?php
include '../includes/header.php';
include '../includes/db.php';

$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $status = $_POST["status"];
    $total = $_POST["total"];
    $tanggal = date('Y-m-d');
    $sql = "INSERT INTO pembayaran (tanggal, nama, status, total) VALUES ('$tanggal', '$nama', '$status', $total)";
    if ($conn->query($sql)) {
        $success = "Pembayaran berhasil disimpan.";
    }
}
?>

<div class="container">
  <div class="sidebar">
    <div class="logo">DRIP</div>
    <button class="nav-btn" onclick="window.location.href='dashboard.php'">Dashboard</button>
    <button class="nav-btn" onclick="window.location.href='menu.php'">Menu</button>
    <button class="nav-btn active">Pembayaran</button>
    <button class="nav-btn" onclick="window.location.href='riwayat.php'">Riwayat</button>
    <form method="POST" action="../logout.php">
      <button class="logout">Logout</button>
    </form>
  </div>

  <div class="main-content">
    <h2 class="section-title">Form Pembayaran</h2>

    <div class="menu-section">
      <?php if ($success): ?>
        <p style="color: green; font-weight: bold;"><?= $success ?></p>
      <?php endif; ?>
      <form method="POST">
        <input type="text" name="nama" placeholder="Nama Pembayar" required><br><br>
        <input type="number" name="total" placeholder="Total Pembayaran" required><br><br>
        <select name="status" required>
          <option value="">-- Status Bayar --</option>
          <option value="berhasil">Berhasil</option>
          <option value="pending">Pending</option>
          <option value="gagal">Gagal</option>
        </select><br><br>
        <button type="submit">Simpan</button>
      </form>
    </div>
  </div>
</div>
