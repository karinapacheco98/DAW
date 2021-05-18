<?php 
    include("telaCliente.php"); 
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

        $nomeValido = 0;
        $cpfValido = 0;
        $enderecoValido = 0;
        $cepValido = 0;
        $cidadeValida = 0;
        $estadoValido = 0;

        $conn = new mysqli("localhost", "root", "", "dbav1");
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
        if($nome != ""){
            $nomeValido = 1;
        }
        if($cpf != "" and ctype_digit($cpf)){
            $cpfValido = 1;
        }
        if($endereco != ""){
            $enderecoValido = 1;
        }
        if($cep != "" and ctype_digit($cep)){
            $cepValido = 1;
        }
        if($cidade != ""){
            $cidadeValida = 1;
        }
        if($estado != "" and ctype_alpha($estado)){
            $estadoValido = 1;
        }

        if ($nomeValido == 1 && $cpfValido == 1 && $enderecoValido == 1 && $cepValido == 1 && $cidadeValida == 1 && $estadoValido ==1){
            $sql = "INSERT INTO `clientes`(`nome`, `cpf`, `endereco`, `cep`, `cidade`, `estado`) VALUES ('$nome','$cpf','$endereco', '$cep', '$cidade', '$estado')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Cliente $nome inserido com sucesso";
            
            } else {
                echo "Erro no insert";
            }
        }
        else{
            echo "Digite todos os campos, coerentemente.";
        }
    }

?>
