<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Cadastro de Aluno</title>
    </head>
    <body>
    <form action="alterar.php" method="POST">
        Alterar de: <input type="text" name="antigo"><br>
        Para: <input type="text" name="novo">

        <br><br>
        <input type="checkbox" name="nome" value="nome">NOME
        <br><br>
        <input type="checkbox" name="email" value="email">EMAIL
        <br><br>
        <input type="checkbox" name="matricula" value="matricula">MATRICULA
        <br><br>
        <input type="submit" value="enviar">
    </form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $antigo = $_POST["antigo"];
        $novo = $_POST["novo"];    

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];
    
        $novoValido = 0;
        $antigoValido = 0;
    
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $nomeBanco = "dawfaeterj";
    
        $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
        if ($conn->connect_error) {
            die("Conexao falhou: " . $conn->connect_error);
        }
        if ($novo != "") {
            $novoValido = 1;
        }
        if ($antigo != "") {
            $antigoValido = 1;
        }
 
    if ($antigoValido == 1 && $novoValido == 1) {

        if($nome == 'nome'){
            $sql = "UPDATE alunos SET nome='$novo' where nome like '$antigo'";
        } elseif($email == 'email'){
            $sql = "UPDATE alunos SET email='$novo' where email like '$antigo'";
        }
        elseif($matricula == 'matricula'){
            $sql = "UPDATE alunos SET matricula='$novo' where matricula like '$antigo'";
        }

        if ($conn->query($sql) == TRUE) {
            echo "aluno atualizado com sucesso";    
        } else {
            echo "Erro no update";
        }
    }
    else{
        echo "Pelo menos um campo inválido!";
    }
}
?>
</body>
</html>