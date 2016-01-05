<!DOCTYPE html>
<html lang="en">
<?php include 'cabecalho.php' ?>
<body>
<?php include 'menu.php' ?>
<div class="container">
<form class="form-inline" role="form">
    <div class="form-group">
        <label class="sr-only" for="name">Nome:</label>
        <input type="text" class="form-control" id="name" placeholder="Como quer ser chamado" required>
    </div>
    <div class="form-group">
        <label class="sr-only" for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Informe o email" required>
    </div>
    <div class="form-group">
        <label class="sr-only" for="date">Data:</label>
        <input type="text" class="form-control" id="date" placeholder="Data do envio" required>
    </div>
    <div class="form-group">
        <label class="sr-only" for="phone">Telefone:</label>
        <input type="text" class="form-control" id="phone" placeholder="Se não houver mais email">
    </div>
    <div class="form-group">
        <label for="message">Mensagem:</label>
        <textarea class="form-control" rows="5" id="message" placeholder="Inspire-se e escreva sua mensagem"></textarea>
    </div>
    <button type="reset" class="btn btn-default">Limpar</button>
    <button type="submit" class="btn btn-default">Enviar</button>
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
