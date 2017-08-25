<?php
session_start();
require_once 'funcoes/usuario.php';
validaSessaoUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Moedas</title>
        <meta charset="utf-8">
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="header">
            <h1>Sistema de Moedas</h1>
        </div>