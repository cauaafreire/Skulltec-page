<?php
    echo "<link rel='stylesheet' type='text/css' href='../css/listar.css'/>";
   	include 'conexao.php';
	$nome=$_POST['txtnome'];
    $pesq=$cmd->query("select * from tbCurriculo where nome_t like '$nome%'");

    /*
    $nome% = inicia com o valor da variável $nome E TERMINA COM QUALQUER VALOR
    %$nome% = o valor da variável $nome pode estar em qualquer parte da referência
    %$nome = o valor da variável $nome vai estar no final da referência, ou seja, pode ter valores antes disso
    */
	
    $total_registros =$pesq->rowCount();
    
    if ($total_registros > 0)
    {
        echo "<table>";
        echo "<tr>
                <th colspan=6>
                    Curriculos Cadastrados
                </th>
              </tr>";
        echo "<tr>
                <th>Cpf</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Experiencia</th>
                <th>formacao</th>
              </tr>";
				
        while($linha=$pesq->fetch(PDO::FETCH_ASSOC))
        {
            $vcpf=$linha['cpf_t'];
            $vnome=$linha['nome_t'];
            $vemai=$linha['emai_t'];
			$vsexo=$linha['sexo_t'];
            $vexperiencia=$linha['experiencia_t'];
            $formacao=$linha['formacao_t'];
            echo "<tr>
                    <td>$vcpf</td>
                    <td>$vnome</td>
                    <td>$vemai</td>
                    <td>$vsexo</td>
   		            <td>$vexperiencia</td>
                    <td>$formacao</td>           
                  </tr>";
		}
	    echo "</table>";
        echo "<br/><br/>";
        echo "<center>";
        echo "<a href='pesq.html'>NOVA PESQUISA</a>";
        echo "</center>";
	}
    else
    {
        echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); location.href='pesq.html'; </script>";
    }
?>