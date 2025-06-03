<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            // Redireciona com sucesso
            header("Location: indexTelaInicialComLogin.html?login=sucesso");
            exit();
        } else {
            // Senha incorreta
            header("Location: index.html?login=erro");
            exit();
        }
    } else {
        // Usuário não encontrado
        header("Location: index.html?login=erro");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>


