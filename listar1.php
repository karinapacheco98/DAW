<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "dawfaeterj";

    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
    if ($conn->connect_error) {
        die("Conexao falhou: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM alunos";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
            echo "id: " . $linha["id"]
                . " Nome: " . $linha["nome"]
                . " Email: " . $linha["email"]
                . " Matricula: " . $linha["matricula"];
            echo "<br><br>";
        }
    }

?>