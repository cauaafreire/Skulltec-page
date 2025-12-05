<?php
session_start();
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $vemail = $_POST['email'];
    $vsenha = $_POST['senha'];

    // Consulta igual à lógica usada nas outras páginas
    $pesq = $cmd->query("select * from tbFuncionario where Email='$vemail' and Senha='$vsenha'");

    $total_registros = $pesq->rowCount();

    if ($total_registros > 0) {

        // pega os dados do usuário
        $usuario = $pesq->fetch(PDO::FETCH_ASSOC);

        $_SESSION['usuario'] = $usuario['Nome'];

        // Redireciona para o menu
        header("Location: menu.html");
        exit;

    } else {
        echo "<script>alert('Email ou senha incorretos!'); window.location='login.html';</script>";
        exit;
    }
}
?>
