<!doctype HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>Alterar Registros</title>
        <link rel="stylesheet" type="text/css" href="../css/pesq.css"/>
        <script language="JavaScript">
        function Saindo()
        {
            location.href="menu.html";
        }
        </script>
    </head>
    <body>
        <h1>Alterar Registros</h1>
        <hr/>
        <form method="post" action="alter.php">            
            Cpf do curriculo a ser alterado&nbsp;                
            <input type="text" name="txtcpf" id="txtcpf" /><br/>
            <br/>
            Nome&nbsp;                
            <input type="text" name="txtnome" id="txtnome" maxlenght="40" disabled/>&nbsp;&nbsp;
            <br/><br/>
            E-Mail&nbsp;                
            <input type="email" name="txtemai" id="txtemai" maxlenght="40" disabled/>&nbsp;&nbsp;
            <br/><br/>           
            Sexo&nbsp;                
                <input type="radio" value="f" name="txtsexo" id="txtsexoF"/>F
                <input type="radio" value="m" name="txtsexo" id="txtsexoM"/>M
            <br/><br/>
            habilidades/competencias&nbsp; 
            <input type="Text" class="mensagem" rows="6" name="txtexperiencia" id="txtexperiencia"
                placeholder="Conte um pouco da sua experiencia..." maxlenght="10" disabled/>
            <br/><br/>
            Formacão&nbsp; 
        <select id="txtformacao" name="txtformacao" disabled>
            <option>Ensino Medio incompleto</option>
            <option>Ensino Medio completo</option>
            <option>Ensino superior incompleto</option>
            <option>Ensino superior completo</option>
            <option>Graduação</option>
            <option>Pós-graduação</option>
        </select>
            <br/><br/>
            <input type="submit" name="bt" id="bt" value="Consultar"/>&nbsp;&nbsp;
            <input type="button" value="Menu" onClick="Saindo()"/>
        </form>
       
        <?php
            //estabelecendo a conexão com banco de dados
            include 'conexao.php';
            $listar=$cmd->query("select * from tbCurriculo");
            $total_registros =$listar->rowCount();
            if ($total_registros > 0)
            {
                echo "<table>";
                echo "<tr>
                        <th colspan=6>Curriculos Cadastrados</th>
                      </tr>";
                echo "<tr>
                        <th>Cpf</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Sexo</th>
                        <th>Habilidades/Competencias</th>
                        <th>Formação</th>
                     </tr>";
               
                while($linha=$listar->fetch(PDO::FETCH_ASSOC))
                {
                    $vcpf=$linha['cpf_t'];
                    $vnome=$linha['nome_t'];
                    $vemai=$linha['emai_t'];
                    $vsexo=$linha['sexo_t'];
                    $vformacao=$linha['formacao_t'];
                    $vexperiencia=$linha['experiencia_t'];
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
               
            }
            else
            {
                echo "<script language=javascript> alert('Não existem curriculos para serem alterados!!!'); history.back();</script>";
            }

            if(isset($_POST['bt'])) {
                $vcpf=$_POST['txtcpf'];
                $vbt=$_POST['bt'];

                if($vbt=='Consultar'){
                    $pesq=$cmd-> query("select * from tbCurriculo where cpf_t='$vcpf'");
                    $total_registros =$pesq->rowCount();
                    if($total_registros > 0) {
                        while($linha=$pesq->fetch(PDO::FETCH_ASSOC)) 
                        {
                            $vcpf=$linha['cpf_t'];
                            $vnome=$linha['nome_t'];
                            $vemai=$linha['emai_t'];
                            $vsexo=$linha['sexo_t'];
                            $vexperiencia=$linha['experiencia_t'];
                            $vformacao=$linha['formacao_t'];
                            echo "<script language=javascript>
                                    document.getElementById('txtcpf').value='$vcpf';
                                    document.getElementById('txtnome').value='$vnome';
                                    document.getElementById('txtnome').disabled = false;
                                    document.getElementById('txtemai').value='$vemai';
                                    document.getElementById('txtemai').disabled = false;
                                    if('$vsexo'== 'f')
                                        document.getElementById('txtsexoF').checked = true;
                                    else
                                        document.getElementById('txtsexoM').checked = true;
                                    document.getElementById('txtexperiencia').value='$vexperiencia';
                                    document.getElementById('txtexperiencia').disabled  = false;
                                    document.getElementById('txtformacao').value='$vformacao';
                                    document.getElementById('txtformacao').disabled = false;
                                    document.getElementById('bt').value = 'Alterar';                                    
                                 </script>";
                        }
                    }
                    else {
                        echo "<script language=javascript> alert('Cpf inexistente!!!');</script>";
                        echo "<meta http-equiv='refresh' content='0' />";
                    }
                }

                else if ($vbt=='Alterar')
                {
                    $vcpf=$_POST['txtcpf'];
                    $vnome=$_POST['txtnome'];
                    $vemai=$_POST['txtemai'];
                    $vsexo=$_POST['txtsexo'];
                    $vexperiencia=$_POST['txtexperiencia'];
                    $vformacao=$_POST['txtformacao'];
                

                    $alter=$cmd->query("update tbCurriculo set nome_t='$vnome',emai_t='$vemai',sexo_t='$vsexo',experiencia_t='$vexperiencia',formacao_t='$vformacao' where cpf_t = '$vcpf'");
                    echo "<script language=javascript>
                            alert('Curriculo alterado com sucesso!!');
                            document.getElementById('bt').value='Consultar';
                            document.getElementById('txtcpf').readOnly= false
                         </script>";
                    echo "<meta http-equiv='refresh' content='0'/>";
                }
            }
?>
</body>
</html>