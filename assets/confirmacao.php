<!DOCTYPE html>
<html lang="en">
<?php include 'cabecalho.php' ?>
<body>
<?php include 'menu.php' ?>
<?php include 'apresentacao.php' ?>
<!-- Capsula -->
<div class="container-fluid bg-3 text-center">
  <h3>Confira sua cápsula do tempo</h3>
  <form class="form-horizontal" role="form" id="frmCapsula" action="./index.php" method="post">
    <div class="form-group form-group-lg">
        <label for="name" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-6">
            <input class="form-control" name="name" type="text" value="<?php echo $_POST["name"]?>" readonly="true">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6">
          <input class="form-control" name="email" type="text" value="<?php echo $_POST["email"]?>" readonly="true">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="date" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-2">
          <input class="form-control" name="date" type="text" value="<?php echo $_POST["date"]?>" readonly="true">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-2">
          <input class="form-control" name="phone" type="text" value="<?php echo $_POST["phone"]?>" readonly="true">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Mensagem</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="3" name="message" readonly="true"><?php echo $_POST["message"]?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-5">
            <button type="reset" id="btnVoltar" class="btn btn-default btn-lg">Voltar</button>
            <button type="submit" id="btnLacrar" class="btn btn-primary btn-lg">Lacrar</button>
            <input type="hidden" name="acao" value="lacrar">
        </div>
    </div>
</form>
</div>
<?php include 'autor.php' ?>
<?php include 'rodape.php' ?>
</body>
</html>
