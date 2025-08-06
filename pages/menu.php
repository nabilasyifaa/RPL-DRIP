<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $sql = "INSERT INTO menu (nama_menu, deskripsi, harga) VALUES ('$nama', '$deskripsi', $harga)";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "Menu berhasil ditambahkan.";
        header("Location: menu.php");
        exit();
    }
}

$menu = $conn->query("SELECT * FROM menu");

$success = "";
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DRIP - Menu</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>body { margin: 0; padding: 0; }</style>
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
    <h2 class="section-title">Daftar Menu</h2>

    <div class="menu-section">
      <?php if ($success): ?>
        <p style="color:green; font-weight:bold;"><?= $success ?></p>
      <?php endif; ?>

      <form method="POST" class="form-tambah-menu">
        <input type="text" name="nama" placeholder="Nama Menu" required><br><br>
        <input type="text" name="deskripsi" placeholder="Deskripsi" required><br><br>
        <input type="number" name="harga" placeholder="Harga" required><br><br>
        <button type="submit">Tambah Menu</button>
      </form>

      <table class="menu-table">
        <thead>
          <tr>
            <th>Nama Menu</th>
            <th>Deskripsi</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $menu->fetch_assoc()) : ?>
            <tr>
              <td><?= htmlspecialchars($row['nama_menu']) ?></td>
              <td><?= htmlspecialchars($row['deskripsi']) ?></td>
              <td><?= 'Rp' . number_format($row['harga'], 0, ',', '.') ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
