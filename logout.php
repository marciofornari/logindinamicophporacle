<?php
//destruo as variaveis da session.
session_start(); 
session_destroy();
session_unset(); 
echo "<script>window.location='index.php';</script>";
?>