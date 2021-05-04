<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Cadastro de Aluno</title>
    </head>
    <body>
    <form action="incluir.php" method="POST">
        Nome: <input type="text" name="nome">
        <br><br>
        email: <input type="text" name="email">
        <br><br>
        Matricula: <input type="text" name="matricula">
        <br><br>
        <input type="submit" value="enviar">
    </form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];
    
    
        $nomeValido = 0;
        $matriculaValida = 0;
        $emailValido = 0;
    
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "dawfaeterj";
    
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
        if ($nome != "") {
            $nomeValido = 1;
        }
        if ($matricula != "") {
            $matriculaValida = 1;
        }
        if ($email != "") {
            $emailValido = 1;
        }
 
    if ($matriculaValida == 1 && $nomeValido == 1 && $emailValido == 1) {
        $sql = "INSERT INTO alunos(nome, email, matricula) VALUES ('$nome','$email','$matricula')";

        if ($conn->query($sql) == TRUE) {
            echo "aluno $nome inserido com sucesso";    
        } else {
            echo "Erro no insert";
        }
    }
    else{
        echo "Pelo menos um campo inválido!";
    }
}
?>
</body>
</html>