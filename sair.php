<?php
session_start();

$_SESSION["usuario_id"] = null;
$_SESSION["usuario"] = null;

header("HTTP 1/1 302 Redirect");
header("Location: index.php");

exit();