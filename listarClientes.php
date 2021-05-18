<!doctype html>
<html>
    <body>
        <div style="text-align:center;">
            <?php 
                include("telaCliente.php"); 

                $conn = new mysqli("localhost", "root", "", "dbav1");
                if ($conn->connect_error) {
                    die("Conexao falhou: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM clientes";

                $result = $conn->query($sql);
                echo "<br><br><p> Listar Clientes </p>";
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
                }

            ?>
        </div>
    </body>
</html>


