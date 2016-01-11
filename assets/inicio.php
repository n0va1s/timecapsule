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
    <div class="form-group form-group-lg col-sm-12">
      <label for="to" class="col-sm-1 control-label">Para</label>
      <div class="col-sm-4">
        <input class="form-control" name="to" type="text" maxlength="50" placeholder="Quem vai receber a mensagem">
      </div>
      <label for="from" class="col-sm-1 control-label">De</label>
      <div class="col-sm-4">
        <input class="form-control" name="from" type="text" maxlength="50" placeholder="Quem pensou na surpresa">
      </div>
    </div>
    <div class="form-group form-group-lg col-sm-12">
        <label for="email" class="col-sm-1 control-label">Email</label>
        <div class="col-sm-4">
          <input class="form-control" name="email" type="text" maxlength="50" placeholder="Para enviarmos a mensagem">
        </div>
        <label for="date" class="col-sm-1 control-label">Data</label>
        <div class="col-sm-2">
          <input class="form-control" name="date" id="date" type="text" placeholder="Abrir a cápsula">
        </div>
        <label for="phone" class="col-sm-1 control-label">Celular</label>
        <div class="col-sm-2">
          <input class="form-control" name="phone" id="phone" type="text" placeholder="Email existe?">
        </div>
    </div>
    <div class="form-group form-group-lg col-sm-12">
        <label for="message" class="col-sm-1 control-label">Mensagem</label>
        <div class="col-sm-11">
            <textarea class="form-control" rows="4" name="message" placeholder="Inspire-se e escreva sua mensagem"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-9">
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
