<h2 class="sub-header">Clientes <a href="<?= BASE_URL; ?>clientes/create" class="btn btn-primary active">+ Adicionar</a></h2>

<?php if (!empty($clientes)) : ?>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente) : ?>
          <tr>
            <td><a href="<?= BASE_URL; ?>clientes/<?= $cliente->id; ?>"><?= $cliente->id; ?></a></td>
            <td><?= $cliente->nome; ?></td>
            <td><?= $cliente->email; ?></td>
            <td><?= $cliente->telefone; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>