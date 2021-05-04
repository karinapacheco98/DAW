<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Excluir Aluno </title>
    </head>
    <body>
    <form action="excluir.php" method="POST">
        Nome: <input type="id" name="id">
        <br><br>
        <input type="submit" value="enviar">
    </form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
    
        $idValido = 0;
    
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "dawfaeterj";
    
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
        if ($id != "") {
            $idValido = 1;
        }
    
        if ($idValido == 1) {
            $sql = "DELETE FROM alunos WHERE id like '$id' ";
    
            if ($conn->query($sql) == TRUE) {
                echo "aluno excluido com sucesso";    
            } else {
                echo "Erro no delete";
            }
        }
        else{
            echo "ID inválido!";
        }
    }

   
?>
</body>
</html>