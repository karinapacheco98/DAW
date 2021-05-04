<?php
    include("calculadora.html");

    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];
    $operacao = $_POST['operacao'];
	$v_n1 = 0;
	$v_n2 = 0;
	
	if ($n1!="" and ctype_digit($n1)) {
			$v_n1 = 1;
		}

	if ($n2!="" and ctype_digit($n2)) {
			$v_n2 = 1;
		}

    if(empty($operacao) || $v_n1 == 0 || $v_n2 == 0){
        echo "Algum dos campos está vazio!!!";
    }
    else{
        switch($operacao)
        {
            case "soma":
                $resultado = $n1 + $n2;
				echo "Resultado: $resultado";
            break;
			
            case "subtracao":
                $resultado = $n1 - $n2;
				echo "Resultado: $resultado";
            break;
			
			case "multiplicacao":
                $resultado = $n1 * $n2;
				echo "Resultado: $resultado";
            break;
			
            case "divisao":
				if($num2 != 0)
				{
					$resultado = $n1 / $n2;
					echo "Resultado: $resultado";
				}
				else{
					echo "ERRO: divisão por 0";
				}
            break;
        }
    }


?>