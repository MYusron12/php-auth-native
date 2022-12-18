<?php
session_start();
include '../config/config.php';

echo mysqli_errno($connect) ? "Data tidak terhubung" : "Data terhubung";

if (isset($_POST['register'])) {
  $nim =  htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  // var_dump($password);
  // die;

  // cek data duplikat
  $getDataId = mysqli_query($connect, "select * from mahasiswa where nim='$nim'");
  $cekId = mysqli_num_rows($getDataId);

  if (empty($nim)) {
    echo "Terdapat data yang kosong";
  } elseif ($cekId > 0) {
    echo "Terdapat nim yang sama";
  } else {
    mysqli_query($connect, "insert into mahasiswa(nim, nama, alamat, password) values('$nim', '$nama', '$alamat', '$password')");
    echo "
    <script>
    alert('Data berhasil tersimpan!');
    document.location.href='login.php';
    </script>
    ";
  }
}

?>

<h3>Halaman Register</h3>
<form action="" method="POST">
  <label for="">Nim <input type="number" name="nim" required autofocus></label><br>
  <label for="">Nama <input type="text" name="nama" required></label><br>
  <label for="">Alamat <input type="text" name="alamat" required></label><br>
  <label for="">Password <input type="password" name="password" required></label><br>
  <input type="submit" name="register" value="Register">
</form>

<p>Sudah punya akun, <a href="login.php">login</a></p>