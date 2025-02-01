<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "0704");
define("BASE", "cadastro");


if (!isset($conexao)) {
    $conexao = new MySQLi(HOST, USER, PASS, BASE);
    
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
}
?>
