<!DOCTYPE html>
<html lang="en">
<?php include 'cabecalho.php' ?>
<body>
<?php include 'menu.php' ?>
<div class="jumbotron">
  <center><h2>Envie uma mensagem para o seu <abbr>EU</abbr> do futuro.</h2>
  <blockquote>&nbsp;&nbsp;&nbsp;&nbsp;Esta é uma ideia simples criada nas férias de 2015 para contar belas histórias, conectar pessoas e nos permitir pensar no futuro...<br /> imagine receber uma mensagem escrita por você ou por alguém muito querido há 20 anos atrás com as suas expectativas, medos e desejos;<br />
talvez enviar uma dia para um filho, um amigo ou um parente querido.<br />
Então, vejo você no futuro!
  </blockquote></center>
</div>
<div class="container">
<form class="form-horizontal" role="form" action="./index.php" method="get">
    <div class="form-group form-group-lg">
        <label for="name" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-7">
           <input class="form-control" name="name" type="text" value="<?php echo $_GET["name"]?>">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6">
           <input class="form-control" name="email" type="text" value="<?php echo $_GET["email"] ?>">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="date" class="col-sm-2 control-label">Data</label>
        <div class="col-sm-3">
           <input class="form-control" name="date" type="text" value="<?php echo $_GET["date"] ?>">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Telefone</label>
        <div class="col-sm-3">
           <input class="form-control" name="phone" type="text" value="<?php echo $_GET["phone"] ?>">
        </div>
    </div>
    <div class="form-group form-group-lg">
        <label for="phone" class="col-sm-2 control-label">Mensagem</label>
        <div class="col-sm-7">
            <input class="form-control" name="message" type="text" value="<?php echo $_GET["message"] ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-7 col-sm-5">
            <button type="reset" class="btn btn-default btn-lg">Voltar</button>
            <button type="submit" class="btn btn-primary btn-lg">Lacrar</button>
            <input type="hidden" name="acao" value="lacrar">
        </div>
    </div>
</form>
</div>
<?php include 'rodape.php' ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
