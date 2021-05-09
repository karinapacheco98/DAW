<?php
    $conn = new mysqli("localhost", "root", "", "dbarquivo");
    mysqli_set_charset($conn, "utf8");

    $arquivo = $_FILES["file"]["tmp_name"];
    $nome = $_FILES["file"]["name"];

    $ext = explode(".", $nome);
    $extensao = end($ext);

    if($extensao != "csv"){
        echo "Extensão inválida";
    } else{
        $objeto = fopen($arquivo, 'r');

        while(($dados = fgetcsv($objeto, 1000, ";")) != FALSE)
        {
            $nome = utf8_encode($dados[0]);
            $matricula = utf8_encode($dados[1]);
            $email = utf8_encode($dados[2]);

            $result = $conn->query("INSERT INTO Alunos (nome, matricula, email) VALUES ('$nome', '$matricula', '$email')");
        }

        if($result){
            echo "Dados inseridos com sucesso!";
        } else{
            echo "Erro: Dados não foram inseridos";
        }
    }
?>