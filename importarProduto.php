<?php include("telaProduto.php");?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
    <br><br>
        <div style="text-align:center;">
            
            <form action="importacaoProduto.php" method="post" enctype="multipart/form-data">
                <label> <input type="file" name="file"></label>
                <button type="submit"> enviar  </button>
            </form>
        </div>
    </body>
</html>

