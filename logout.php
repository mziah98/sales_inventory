<?php
session_start();
session_destroy();
header("Location:home.php")
// echo "<script>alert('Successfully logout');";
?>
