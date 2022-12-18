<?php
session_start();
if (!isset($_SESSION['login'])) {
  echo "
  <script>
  alert('Harus login!');
  document.location.href='http://localhost:8080/auth/login.php';
  </script>
  ";
}
include 'config/config.php';

echo mysqli_errno($connect) ? "Data tiak terhubung" : "Data terhubung";
