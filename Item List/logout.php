<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// Session dihapus dan logout

header('location: indexlist.php');
    // kembali ke indexlist.php