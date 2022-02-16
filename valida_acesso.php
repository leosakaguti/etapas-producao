<?php
session_start();

if(!isset($_SESSION["usuario"])) {
    $erros = ["Acesso não permitido. Favor efetuar o login!"];
    $_SESSION["erros"] = $erros;
    header("HTTP 1/1 302 Redirect");
    header("Location: index.php");
}