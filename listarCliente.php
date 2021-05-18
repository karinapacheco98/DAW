<?php include("telaCliente.php"); ?>

<!DOCTYPE html>
    <html>
    <body>
        <br><br>
        <div style="text-align:center;">
            <p> Pesquisar Cliente </p>
            <form action="listarCliente.php" method="POST">
                Pesquisar por: <select name="coluna">
                                    <option value="">Selecione...</option>
                                    <option value="id"> ID </option> 
                                    <option value="nome"> Nome </option> 
                                    <option value="cpf"> CPF </option>
                                    <option value="endereco"> Endereço </option>
                                    <option value="cep"> CEP </option>
                                    <option value="cidade"> Cidade </option>
                                    <option value="estado"> Estado </option>
                                </select>
                &nbsp;&nbsp;<input type="text" name="valor">
                <input type="submit" value="pesquisar">
            </form>
        
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $coluna = $_POST["coluna"];
                    $valor = $_POST["valor"];

                    $colunaValida = 0;
                    $valorValido = 0;
                
                    $conn = new mysqli("localhost", "root", "", "dbav1");
                    if ($conn->connect_error) {
                        die("Conexao falhou: " . $conn->connect_error);
                    }
                    if ($coluna != "") {
                        $colunaValida = 1;
                    }
                
                    if($colunaValida == 1)
                    {
                        if($coluna == 'nome')
                        {
                            if($valor != "")
                            {
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE nome like '$valor' ";
                            }  else{
                                echo "Nome inválido.";
                            }        
                        } elseif($coluna == 'cpf'){
                            if($valor !="" and ctype_digit($valor)){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE cpf='$valor' ";
                            } else{
                                echo "CPF inválido.";
                            }
                        } elseif($coluna == 'endereco'){
                            if($valor != ""){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE endereco like '$valor' ";
                            } else{
                                echo "Endereco inválido.";
                            }
                        } elseif($coluna == 'CEP'){
                            if($valor != "" and ctype_digit($valor)){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE CEP like '$valor' ";
                            } else{
                                echo "CEP inválido.";
                            }
                        } elseif($coluna == 'cidade'){
                            if($valor != ""){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE cidade like '$valor' ";
                            }
                            else{
                                echo "Cidade inválida.";
                            }
                        } elseif($coluna == 'estado'){
                            if($valor != ""){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE estado like '$valor' ";
                            }
                            else{
                                echo "Estado inválido.";
                            }
                        } elseif($coluna == 'id'){
                            if($valor != "" and ctype_digit($valor)){
                                $valorValido = 1;
                                $sql = "SELECT * FROM clientes WHERE id like '$valor' ";
                            }
                        }
                    
                        if($valorValido == 1){
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($linha = $result->fetch_assoc()) {
                                    echo "<br>id: " . $linha["id"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; Nome: " . $linha["nome"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; CPF: " . $linha["cpf"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; Endereco: " . $linha["endereco"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; CEP: " . $linha["CEP"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; Cidade: " . $linha["cidade"]
                                        . "&nbsp;&nbsp;&nbsp;&nbsp; Estado: " . $linha["estado"];
                                    echo "<br><br>";
                                }
                            } else{
                                echo "<br><br>Cliente nao encontrado.";
                            }
                        } else{
                            echo "<br><br>Preencha o valor do campo.";
                        }
                        
                    } else{
                        echo "<br><br>Escolha um campo para filtrar.";
                    }
                    
                
                }

            ?>
        </div>
</body>
</html>