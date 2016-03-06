<h2 class="sub-header">Produtos <a href="<?= BASE_URL; ?>produtos/create" class="btn btn-primary active">+ Adicionar</a></h2> 

<?php if (!empty($produtos)) : ?>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Descrição</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produtos as $produto) : ?>
          <tr>
            <td><a href="<?= BASE_URL; ?>produtos/<?= $produto->id; ?>"><?= $produto->id; ?></a></td>
            <td><?= $produto->nome; ?></td>
            <td><?= $produto->preco; ?></td>
            <td><?= $produto->descricao; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>