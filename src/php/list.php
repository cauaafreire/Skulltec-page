<?php
    echo "<link rel='stylesheet' type='text/css' href='../css/listar.css'/>";
    include 'conexao.php';
	$lista=$cmd->query("select * from tbCurriculo");
	$total_registros=$lista->rowCount();
    if ($total_registros > 0)
    {
        echo "<body>";
        echo "<h1>Listar Curriculos</h1>";
        echo "<hr/>";
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
                <th>Formação</th>
                <th>Experiencia</th>
              </tr>";
				
        while($linha=$lista->fetch(PDO::FETCH_ASSOC))
        {
            $vcpf=$linha['cpf_t'];
            $vnome=$linha['nome_t'];
            $vemai=$linha['emai_t'];
            $vsexo=$linha['sexo_t'];
            $vexperiencia=$linha['experiencia_t'];
            $vformacao=$linha['formacao_t'];
            echo "<tr>
                    <td>$vcpf</td>
                    <td>$vnome</td>
                    <td>$vemai</td>
                    <td>$vsexo</td>
                    <td>$vexperiencia</td>
                    <td>$vformacao</td>          
                </tr>";
        }
	    echo "</table>";
        echo "<br/><br/>";
        echo "<center>";
        echo "<a href='menu.html'>MENU</a>"; /*ou window.history.back()*/
        echo "</center>";
        echo "</body>";
	}
    else
    {
        echo "<script language=javascript> window.alert('Não existem curriculos para exibir!!!'); location.href='menu.html'; </script>";
    }
?>