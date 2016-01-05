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