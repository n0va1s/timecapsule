<!DOCTYPE html>
<html>
  <head>
    <title>Cápsula do Tempo (time capsule)</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
    
    <meta name="description" content="Envie uma mensagem para o seu EU do futuro">
    <meta name="keywords" content="mensagem, futuro, capsula do tempo, message,time capsule,lobinho, escoteiro, senior, pioneiro" />

    <meta property="og:keywords" content="mensagem, futuro, capsula do tempo, message,time capsule,lobinho, escoteiro, senior, pioneiro" />
    <meta property="og:description" content="Envie uma mensagem para o seu EU do futuro" />

    <meta name="author" content="Joao Paulo Novais e filhos">
    <meta name="author" content="http://tableless.com.br/formulario-responsivo-com-mailchimp/">

    <link rel="stylesheet" type="text/css" href="./assets/timecapsule.css" />
  </head>
  <body>
    <section>
      <h1>Cápsula do Tempo</h1>
      <h2>time capsule</h2>
      <form id="form-contact" action="./src/TimeCapsuleView.php" method="POST">
        <div class="input">
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" placeholder="Como quer ser chamado" required>
        </div>
        <div class="input curto">
          <label for="phone">Telefone</label>
          <input type="text" id="phone" name="phone" maxlength="13" placeholder="Se não existir e-mail">
        </div>
        <div class="input">
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email" placeholder="O e-mail para enviarmos a mensagem" required>
        </div>
        <div class="input curto">
          <label for="date">Data</label>
          <input type="text" id="date" name="date" placeholder="Data de envio" required>
        </div>
        <div class="input txt">
          <label for="message">Mensagem</label>
          <textarea id="message" name="message" cols="10" rows="5" placeholder="Escreva a melhor mensagem para o seu EU do futuro" required></textarea>
        </div>
        <div class="buttons">
          <span class="form-message"></span>
          <input type="submit" value="Enviar" />
          <input type="reset" value="Limpar" />
        </div>
      </form>
    </section>
  </body>
</html>
