<?php include("telaCliente.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> CLIENTE </title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <br><br>
		<div style="text-align:center;">
			<p> Cadastrar Cliente </p>
			<form action="cadastrarCliente.php" method="POST">
				Nome: <input type="text" name="nome">
				<br><br>
				CPF: <input type="text" name="cpf">
				<br><br>
				Endereço: <input type="text" name="endereco">
				<br><br>
				CEP: <input type="text" name="cep">
				<br><br>
				Cidade: <input type="text" name="cidade">
				<br><br>
				Estado: <select name="estado">
							<option value="">Selecione...</option>
							<option value="AC"> AC </option> 
							<option value="AL"> AL </option>
							<option value="AP"> AP </option>
							<option value="AM"> AM </option>
							<option value="BA"> BA </option> 
							<option value="CE"> CE </option>
							<option value="ES"> ES </option>
							<option value="GO"> GO </option>
							<option value="MA"> MA </option> 
							<option value="MT"> MT </option>
							<option value="MS"> MS </option>
							<option value="MG"> MG </option>
							<option value="PA"> PA </option> 
							<option value="PB"> PB </option>
							<option value="PR"> PR </option>
							<option value="PE"> PE </option>
							<option value="PI"> PI </option> 
							<option value="RJ"> RJ </option>
							<option value="RN"> RN </option>
							<option value="RS"> RS </option>
							<option value="RO"> RO </option> 
							<option value="RR"> RR </option>
							<option value="SC"> SC </option>
							<option value="SP"> SP </option>
							<option value="SE"> SE </option>
							<option value="TO"> TO </option>
							<option value="DF"> DF </option>
						</select> <br><br>
				<br><br>
				<input type="submit" value="Cadastrar">
			</form>
		</div>
    </body>
</html>