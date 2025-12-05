<!doctype HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Deletar Registros</title>
		<link rel="stylesheet" type="text/css" href="../css/pesq.css"/>
	</head>
    <body>

        <h1>Excluir Registros</h1>
        <hr/>
        <form method="post" action="delet.php">             
            <label for="txtcodi">Cpf do curriculo a ser admitido:</label>                 
            <input type="text" name="txtcpf" id="txtcpf" style="width:40%"/>
            <input type="submit" name="bt" value="Confirma"/> 
            <input type="button" value="Menu" onClick="location.href='menu.html'"/>
        </form>
        
        <?php 
        include 'conexao.php';
        $lista=$cmd->query("select * from tbCurriculo");
		$total_registros =$lista->rowCount();
        if ($total_registros == 0)
        {
            echo "<script language=javascript> 
                    alert('Não existem curriculos para serem adimitidos!!!'); 
                    location.href='menu.html';
                </script>";
        }
        else
        {
            //monta a lista geral para escolha do código
            echo "<table>";
            echo "<tr>
                    <th colspan=6>Curriculos Cadastrados</th>
                 </tr>";
            echo "<tr>
                    <th>Cpf</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th>Experiencia</th>
                    <th>formacao</th>
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
            //recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
            if (isset($_POST['bt'])) //se o botão confirma foi clicado 
         		{
                $vcodi=$_POST['txtcpf'];
    			if ($vcodi!='') //se não está vazio o código escolhido 
    			    {                    
                        //verifica se o código escolhido EXISTE na tabela                 
                        $pesq=$cmd->query("select * from tbCurriculo where cpf_t='$vcpf'");
                        $total_registros =$pesq->rowCount();
                        if ($total_registros > 0)
			                {
                                $excl=$cmd->query("delete from tbCurriculo where cpf_t='$vcpf'");
 			                    echo "<script language=javascript> 
                                        alert('Curriculo excluído com sucesso!!! '); 
                                     </script>";
                                echo "<meta http-equiv='refresh' content='0'/>";
                                //location.reload() é a mesma coisa que F5
                                // ou no HTML --> <meta http-equiv='refresh' content='0'/>
                            }
                        else
                            {
                                echo "<script language=javascript> 
                                        alert('Esse cpf não existe!');
                                        document.getElementById('txtcpf').value='';
                                        document.getElementById('txtcpf').focus();
                                    </script>";
                            }                      
	                }
                else
                    {
                        echo "<script language=javascript> 
                               alert('Escolha um curriculo para admitir!!!'); 
                               document.getElementById('txtcpf').focus();
                             </script>";
                    }		
                }
        }
    ?>
    </body>
</html>
