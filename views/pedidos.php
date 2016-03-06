<h2 class="sub-header">Pedidos <a href="<?= BASE_URL; ?>pedidos/create" class="btn btn-primary active">+ Adicionar</a></h2>

<?php if (!empty($pedidos)) : ?>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Produto</th>
          <th>Cliente</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pedidos as $pedido) : ?>
          <tr>
            <td><a href="<?= BASE_URL; ?>pedidos/<?= $pedido->id; ?>"><?= $pedido->id; ?></a></td>
            <td><?= $pedido->produto->nome; ?></td>
            <td><?= $pedido->cliente->nome; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>