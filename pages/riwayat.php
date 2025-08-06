<?php
include '../includes/header.php';
include '../includes/db.php';

$transaksi = $conn->query("SELECT * FROM transaksi ORDER BY tanggal DESC");
?>

<div class="container">
  <div class="sidebar">
    <div class="logo">DRIP</div>
    <button class="nav-btn" onclick="window.location.href='dashboard.php'">Dashboard</button>
    <button class="nav-btn" onclick="window.location.href='menu.php'">Menu</button>
    <button class="nav-btn" onclick="window.location.href='pembayaran.php'">Pembayaran</button>
    <button class="nav-btn active">Riwayat</button>
    <form method="POST" action="../logout.php">
      <button class="logout">Logout</button>
    </form>
  </div>

  <div class="main-content">
    <h2 class="section-title">Riwayat Transaksi</h2>

    <div class="menu-section">
      <table class="menu-table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $transaksi->fetch_assoc()) : ?>
            <tr>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['tanggal']) ?></td>
              <td><?= htmlspecialchars($row['deskripsi']) ?></td>
              <td><?= htmlspecialchars($row['status']) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
