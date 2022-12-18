<?php
session_start();
include '../config/config.php';
if (isset($_POST['login'])) {
  $nim = htmlspecialchars($_POST['nim']);
  $password = htmlspecialchars($_POST['password']);

  $getDAta = mysqli_query($connect, "select * from mahasiswa where nim='$nim'");
  $cekData = mysqli_num_rows($getDAta);
  if ($cekData > 0) {
    $row = mysqli_fetch_assoc($getDAta);
    if (password_verify($password, $row['password'])) {
      $_SESSION['id'] = $row['id'];
      $_SESSION['login'] = true;
      echo "
      <script>
      alert('Berhasil masuk!');
      document.location.href='http://localhost:8080/index.php';
      </script>
      ";
    }
  } else {
    echo 'Data tidak ada';
  }
}
?>

<h3>Halaman Login</h3>
<form action="" method="POST">
  <label for="">NIM <input type="text" name="nim" autofocus></label><br>
  <label for="">Password <input type="password" name="password"></label><br>
  <input type="submit" name="login" value="Login">
</form>

<p>Belum punya akun, <a href="register.php">daftar</a></p>