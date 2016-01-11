<!DOCTYPE html>
<html lang="en">
<?php include 'cabecalho.php' ?>
<body>
<?php include 'menu.php' ?>
<?php include 'apresentacao.php' ?>
<!-- Capsula -->
<div class="container-fluid bg-3 text-center">
  <h3>Tudo certo?</h3>
  <form class="form-horizontal" role="form" id="frmConfirmacao" action="./index.php" method="post">
    <div class="form-group form-group-lg col-sm-12">
      <label for="to" class="col-sm-1 control-label">Para</label>
      <div class="col-sm-4">
        <input class="form-control" id="to" name="to" type="text" readonly="true" value="<?php echo $_POST["to"] ?>">
      </div>
      <label for="from" class="col-sm-1 control-label">De</label>
      <div class="col-sm-4">
        <input class="form-control" id="from" name="from" type="text" readonly="true" value="<?php echo $_POST["from"] ?>">
      </div>
    </div>
    <div class="form-group form-group-lg col-sm-12">
        <label for="email" class="col-sm-1 control-label">Email</label>
        <div class="col-sm-4">
          <input class="form-control" id="email" name="email" type="text" readonly="true" value="<?php echo $_POST["email"] ?>">
        </div>
        <label for="date" class="col-sm-1 control-label">Data</label>
        <div class="col-sm-2">
          <input class="form-control" id="date" name="date" type="text" readonly="true" value="<?php echo $_POST["date"] ?>">
        </div>
        <label for="phone" class="col-sm-1 control-label">Celular</label>
        <div class="col-sm-2">
          <input class="form-control" id="phone" name="phone" type="text" readonly="true" value="<?php echo $_POST["phone"] ?>">
        </div>
    </div>
    <div class="form-group form-group-lg col-sm-12">
        <label for="message" class="col-sm-1 control-label">Mensagem</label>
        <div class="col-sm-11">
            <textarea class="form-control" rows="4" id="message" name="message" readonly="true"><?php echo $_POST["message"] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-9">
            <button type="reset" id="btnVoltar" class="btn btn-default btn-lg">Voltar</button>
            <button type="submit" id="bntLacrar" class="btn btn-primary btn-lg">Lacrar</button>
            <input type="hidden" name="acao" value="lacrar">
        </div>
    </div>
</form>
</div>
<?php include 'autor.php' ?>
<?php include 'rodape.php' ?>
</body>
</html>