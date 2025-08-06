<?php
include '../includes/header.php';
include '../includes/db.php';

$total_transaksi = $conn->query("SELECT COUNT(*) as total FROM transaksi")->fetch_assoc()['total'];
$total_pembayaran = $conn->query("SELECT COUNT(*) as total FROM pembayaran WHERE status='berhasil'")->fetch_assoc()['total'];
$total_menu = $conn->query("SELECT COUNT(*) as total FROM menu")->fetch_assoc()['total'];
?>

<div class="container">
  <div class="sidebar">
    <div class="logo">DRIP</div>
    <button class="nav-btn active" onclick="window.location.href='dashboard.php'">Dashboard</button>
    <button class="nav-btn" onclick="window.location.href='menu.php'">Menu</button>
    <button class="nav-btn" onclick="window.location.href='pembayaran.php'">Pembayaran</button>
    <button class="nav-btn" onclick="window.location.href='riwayat.php'">Riwayat</button>
    <button class="logout" onclick="window.location.href='../logout.php'">Logout</button>
  </div>

  <div class="main-content">
    <div class="top-bar">
      <div class="section-title">Dashboard</div>
      <button class="akun-btn"><?= $_SESSION["username"]; ?></button>
    </div>

    <div class="menu-section" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
      <div class="dashboard-card">Total Transaksi<br><?= $total_transaksi ?></div>
      <div class="dashboard-card">Pembayaran<br><?= $total_pembayaran ?></div>
      <div class="dashboard-card">Total Menu<br><?= $total_menu ?></div>
    </div>
  </div>
</div>

</body>
</html>
