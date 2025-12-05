<?php
  include 'conexao.php';
  $vcpf=$_POST['txtcpf'];
  $vnome=$_POST['txtnome'];
  $vemai=$_POST['txtemai'];
  $vsexo=$_POST['txtsexo'];
  $vformacao=$_POST['txtformacao'];
  $vexperiencia=$_POST['txtexperiencia'];
  $cadastrar = $cmd->query("insert into tbCurriculo(cpf_t,nome_t,emai_t,sexo_t,experiencia_t,formacao_t) values ('$vcpf','$vnome','$vemai','$vsexo','$vformacao','$vexperiencia')");
  echo "<script language='JavaScript'>
    alert('Curriculo cadastrado com sucesso!!!');
    location.href='cadastro.html';
    </script>"
    
?>