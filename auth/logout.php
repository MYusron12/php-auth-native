<?php
// session_start();
$_SESSION = [];
session_destroy();
echo "
<script>
alert('Berhasil logout!');
document.location.href='http://localhost:8080/auth/login.php'
</script>
";
