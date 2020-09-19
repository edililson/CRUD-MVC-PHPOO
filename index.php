  <?php
  include('view/header.php');
  include_once 'model/Conexao.class.php';
  include_once 'model/Manager.class.php';

  $manager = new Manager();
  ?>
  <!doctype html>
  <html lang="pt-BR">
  <link rel="stylesheet" href="view/style/style.css">

  <main>
    <menu>
      <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="view/img/logo.png" alt="Logo" style="width: 50px; margin-right: 5px;">CRUD</a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="view/adicionar.php" style="font-size: 20px;">Adicionar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </menu>
    <div class="container">
      <div>

      </div>
      <div class="table-overflow">

        <table class="table table-striped">
          <thead class="thead">

            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Cpf</th>
            <th scope="col">E-mail</th>
            <th scope="col">Situação</th>
            <th scope="col">Status</th>
            <th scope="col" colspan="4">Ações</th>
          </thead>
          <tbody>
            <tr>
              <?php foreach($manager->listMotorista() as $motorista): ?>
              <td><?php echo $motorista['id']; ?></td>
              <td><?php echo $motorista['nome']; ?></td>
              <td><?php echo $motorista['cpf']; ?></td>
              <td><?php echo $motorista['email']; ?></td>
              <td><?php echo $motorista['situacao']; ?></td>
              <td><?php echo $motorista['status']; ?></td>
              <td>
                <form action="view/update.php" method="post">
                <input type="hidden" name="id" value="<?=$motorista['id']?>">
                  <button class="btn btn-warning">
                    <i>Editar</i></button>
                </form>
              </td>
              <td>
                <form action="controller/deleteMotorista.php" method="post" onclick="return confirm('Você tem certeza que deseja exluir?');">
                  <input type="hidden" name="id" value="<?=$motorista['id']?>">
                  <button class="btn btn-danger">
                    <i>Escluir</i>
                  </button>
                </form>
              </td>

            </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <?php include('view/footer.html'); ?>