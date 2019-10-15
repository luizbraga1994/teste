<?php include_once("config.php");?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <style type="text/css">
      body{margin-left: 35%;}
      .form-control{border-radius: 0px;}
      .btn-primary{border-radius: 0px;}
    </style>

    <title>Empresa</title>
  </head>
  <body>

    <div id="content">
      <h4>Digite sua busca</h4>

      <form method="POST" class="form-inline">
        <input type="text" name="busca" class="form-control col-sm-5"/>
        <input type="submit" class="btn btn-primary" value="Buscar" />
        <input type="hidden" name="env" value="envBusca">
      </form>

      <?php
        if($_POST['env'] === "envBusca"){
          if($_POST['busca']){
            $busca = htmlspecialchars("%{$_POST['busca']}%");
            $sql = $con->prepare("SELECT * FROM empresa WHERE (titulo LIKE ?) OR (endereco LIKE ?) OR (cep LIKE ?)");
            $sql->bind_param("sss", $busca, $busca, $busca);
            $sql->execute(); 
            $resultado = $sql->get_result();
            $conta = $resultado->num_rows;

            if($conta > 0){
              while($dados = $resultado->fetch_array()){

          ?>
          
          <hr>
	<table  border="1">
    <tr>
      <td ><div align="center"><strong>Título</strong></div></td>
      <td><div align="center"><strong>Telefone</strong></div></td>
      <td><div align="center"><strong>Endereço</strong></div></td>
      <td ><div align="center"><strong>Cep</strong></div></td>
      <td><div align="center"><strong>Cidade</strong></div></td>
      <td><div align="center"><strong>Estado</strong></div></td>
      <td><div align="center"><strong>Descrição</strong></div></td>
      
    </tr>
	<tr>
      <td><?php echo $dados['titulo'];?></td>
      <td><?php echo $dados['telefone'];?></td>
      <td><?php echo $dados['endereco'];?></td>
      <td><?php echo $dados['cep'];?></td>
      <td><?php echo $dados['cidade'];?></td>
      <td><?php echo $dados['estado'];?></td>
      <td><?php echo $dados['descricao'];?></td>
      
    </tr>
	</table>
        <?php }}}} ?>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
  </body>
</html>