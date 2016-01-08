<!DOCTYPE html>
<html lang="en">
<?php include 'cabecalho.php' ?>
<body>
<?php include 'menu.php' ?>
<?php include 'apresentacao.php' ?>
<!-- Capsula -->
<div class="container-fluid bg-3 text-center">
  <h3>Preencha sua cápsula do tempo</h3>
  <form class="form-horizontal" role="form" id="frmCapsula" action="./index.php" method="post">
    <div class="form-group form-group-lg">
        <label for="name" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-6">
            <input class="form-control" name="name" type="text" maxlength="150" placeholder="Como quer ser chamado">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6">
          <input class="form-control" name="email" type="text" maxlength="150" placeholder="Para enviarmos a mensagem">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="date" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-2">
          <input class="form-control" name="date" id="date" type="text" placeholder="Para abrir a cápsula">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-2">
          <input class="form-control" name="phone" id="phone" type="text" placeholder="Se email não existir">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Mensagem</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="3" name="message" placeholder="Inspire-se e escreva sua mensagem"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-5">
            <button type="reset" id="btnLimpar" class="btn btn-default btn-lg">Limpar</button>
            <button type="submit" id="bntEnviar" class="btn btn-primary btn-lg">Enviar</button>
            <input type="hidden" name="acao" value="confirmar">
        </div>
    </div>
</form>
</div>
<?php include 'autor.php' ?>
<?php include 'rodape.php' ?>
</body>
</html>
