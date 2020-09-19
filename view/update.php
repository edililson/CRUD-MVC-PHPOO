<?php
include('header.php');
include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manege = new Manager();

$id = $_POST['id'];

?>
<!doctype html>
<html lang="pt-BR">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo" style="width: 50px; margin-right: 5px;">CRUD</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php" style="font-size: 20px;">Inicio</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main>
  <form method="POST" action="../controller/updateMotorista.php">
    <div class="container formCentro">

      <?php foreach ($manege->getInfo("motorista", $id) as $motorista) : ?>

        <div class="form-grup row">
          <label class="col-md-2 col-fomr-label align-self-center" style="font-size: 20px;">Nome:</label>
          <div class="col-sm-5">
            <input type="text" value="<?= $motorista['nome'] ?>" name="nome" class="form-control" placeholder="Fulano de Talz da Silva" required autofocus>
          </div>
        </div>
        <div class="form-grup row">
          <label class="col-md-2 col-fomr-label align-self-center" style="font-size: 20px;">CPF:</label>
          <div class="col-sm-5">
            <input type="text" value="<?= $motorista['cpf'] ?>" name="cpf" id="cpf" class="form-control" placeholder="000.000.000-00">
          </div>
        </div>
        <div class="form-grup row">
          <label class="col-md-2 col-fomr-label align-self-center" style="font-size: 20px;">E-mail:</label>
          <div class="col-sm-5">
            <input type="email" name="email" value="<?=$motorista['email']?>" class="form-control" placeholder="Exemplo@email.com">
          </div>
        </div>
        <div class="form-grup row">
          <label class="col-md-2 col-fomr-label align-self-center" style="font-size: 20px;">Situação</label>
          <div class="col-sm-5">
            <select id="inputState" value="<?=$motorista['fk_situacao']?>" class="form-control" name="fk_situacao">
              <option value="1">Livre</option>
              <option value="2">Em Curso</option>
              <option value="3">Retornando</option>
            </select>
          </div>
        </div>
        <div class="form-grup row">
          <label class="col-md-2 col-fomr-label align-self-center" style="font-size: 20px;">Status:</label>
          <div class="col-sm-5">
            <select id="inputState"  class="form-control" name="fk_status">
              <option value="1">Ativo</option>
              <option value="2">Desligado</option>
            </select>
          </div>
        </div>
        <div class="form-grup row">
          <?php endforeach; ?>
          <input type="hidden" name="id" value="<?=$motorista['id']?>">
        <div class="col-sm-5">
          <a class="btn btn-primary" href="../index.php" role="button">Voltar</a>
          <button class="btn btn-warning">Atualizar</button>
        </div>

      </div>
    </div>
  </form>
</main>






<?php include_once('footer.html'); ?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
  $(document).ready(function() {
    $("#cpf").mask("000.000.000-00");
  });
</script>