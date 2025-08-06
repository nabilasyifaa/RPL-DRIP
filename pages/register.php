<?php
session_start();
include '../includes/db.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm  = trim($_POST["confirm"]);

    // Validasi sederhana
    if ($password !== $confirm) {
        $error = "Password tidak cocok.";
    } else {
        // Cek username sudah ada atau belum
        $check = $conn->query("SELECT * FROM users WHERE username='$username'");
        if ($check->num_rows > 0) {
            $error = "Username sudah digunakan.";
        } else {
            // Simpan ke database
            $sql = "INSERT INTO users (username, password, created_at)
                    VALUES ('$username', '$password', NOW())";
            if ($conn->query($sql)) {
                $success = "Akun berhasil dibuat. Silakan login.";
            } else {
                $error = "Gagal mendaftar. Silakan coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - DRIP</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <div class="login-container">
    <h2>Buat Akun Baru</h2>
    <?php if ($success): ?>
      <p style="color:green;"><?= $success ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="password" name="confirm" placeholder="Konfirmasi Password" required><br>
      <button type="submit">Register</button>
      <button class="create-btn" type="button" onclick="window.location.href='login.php'">Kembali ke Login</button>
    </form>
  </div>
</body>
</html>
