<?php include("telaCliente.php"); ?>

<!DOCTYPE html>
<html>
    <body>
        <br><br>
        <div style="text-align:center;">
            <p> Alterar Cliente </p>
            <form action="alterarCliente.php" method="POST">
                ID: <input type="text" name="id">
                <br><br>
                Alterar: <select name="alteracao">
                                <option value="">Selecione...</option>
                                <option value="nome"> Nome </option> 
                                <option value="cpf"> CPF </option>
                                <option value="endereco"> Endereço </option>
                                <option value="cep"> CEP </option>
                                <option value="cidade"> Cidade </option>
                                <option value="estado"> Estado </option>
                            </select>
                <br><br>
                Para: <input type="text" name="novo">
                <br><br>
                <input type="submit" value="alterar">
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $novo = $_POST["novo"];   
                    $alteracao = $_POST["alteracao"];
                    $id = $_POST["id"];

                    $novoValido = 0;
                    $idValido = 0;

                    $conn = new mysqli("localhost", "root", "", "dbav1");
                    if ($conn->connect_error) {
                        die("Conexao falhou: " . $conn->connect_error);
                    }
                    
                    if ($novo != "") {
                        $novoValido = 1;
                    }

                    if ($id != "") {
                        $idValido = 1;
                    }

                    if ($idValido == 1) {
                        if($novoValido == 1) {
                            if($alteracao == 'nome'){
                                $sql = "UPDATE clientes SET nome='$novo' where id='$id'";
                            } elseif($alteracao == 'cpf'){
                                $sql = "UPDATE clientes SET cpf='$novo' where id='$id'";
                            } elseif($alteracao == 'endereco'){
                                $sql = "UPDATE clientes SET endereco='$novo' where id='$id'";
                            } elseif($alteracao == 'cep'){
                                $sql = "UPDATE clientes SET cep='$novo' where id='$id'";
                            } elseif($alteracao == 'cidade'){
                                $sql = "UPDATE clientes SET cidade='$novo' where id='$id'";
                            } elseif($alteracao == 'estado'){
                                $sql = "UPDATE clientes SET estado='$novo' where id='$id'";
                            }
        
                            if ($conn->query($sql) == TRUE) {
                                echo "Cliente $alteracao atualizado com sucesso";
                            } else {
                                echo "Erro no update";
                            }
                        }
                        else{
                            echo "$alteracao inválido(a).";
                        }
                    }
                    else{
                        echo "ID inválido!";
                    }
                }
            ?>
        </div>
    </body>
</html>
