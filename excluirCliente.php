<?php include("telaCliente.php");?>

<!DOCTYPE html>
    <html>
    <body>
        <br><br>
        <div style="text-align:center;">
            <p> Excluir Cliente </p>
            <form action="excluirCliente.php" method="POST">
                Nome: <input type="nome" name="nome">
                <br><br>
                <input type="submit" value="enviar">
            </form>
        
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nome = $_POST["nome"];
                
                    $nomeValido = 0;
                
                    $conn = new mysqli("localhost", "root", "", "dbav1");
                    if ($conn->connect_error) {
                        die("Conexao falhou: " . $conn->connect_error);
                    }
                    if ($nome != "") {
                        $nomeValido = 1;
                    }
                
                    if ($nomeValido == 1) {
                        echo "entrou aqui";
                        $sql = "DELETE FROM clientes WHERE nome like '$nome' ";
                
                        if ($conn->query($sql) == TRUE) {
                            echo "Cliente $nome excluido com sucesso";    
                        } else {
                            echo "Erro no delete";
                        }
                    }
                    else{
                        echo "Nome inválido!";
                    }
                }
            ?>
        </div>
</body>
</html>