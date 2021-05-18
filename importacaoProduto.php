<?php
    include("importarProduto.php");
    $conn = new mysqli("localhost", "root", "", "dbav1");
    mysqli_set_charset($conn, "utf8");

    $arquivo = $_FILES["file"]["tmp_name"];
    $nome = $_FILES["file"]["name"];

    $ext = explode(".", $nome);
    $extensao = end($ext);

    if($extensao == ""){
        echo "<br><br>Nenhum arquivo selecionado.";
    }
    elseif($extensao != "csv"){
        echo "<br><br>Extensão inválida";
    } else{
        $objeto = fopen($arquivo, 'r');
        $dados = fgetcsv($objeto, 1000, ";");

        while(($dados = fgetcsv($objeto, 1000, ";")) != FALSE)
        {
            $nome = utf8_encode($dados[0]);
            $descricao = utf8_encode($dados[1]);
            $preco = utf8_encode($dados[2]);
            $quantidade = utf8_encode($dados[3]);
            $peso = utf8_encode($dados[4]);

            $result = $conn->query("INSERT INTO Produtos (nome, descricao, preco, quantidade, peso) VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$peso')");
        }

        if($result){
            echo "<br><br>Dados inseridos com sucesso!";
        } else{
            echo "<br><br>Erro: Dados não foram inseridos";
        }
    }
?>