<h2 class="sub-header"><?= (isset($pedido)) ? 'Editar Pedido' : 'Criar Pedido';  ?></h2>

<form action='<?= (isset($pedido)) ? BASE_URL . "pedidos/{$pedido->id}" : BASE_URL . "pedidos/create"; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr class="form-group required">
            <td><label class="control-label">Produto</label></td>
            <td>
                <select class="form-control" name="id_produto">
                    <?php foreach ($produtos as $produto) : ?>
                        <?php 
                            $selected = '';
                            if (isset($pedido) && $pedido->id_produto == $produto->id)
                                $selected = "selected='selected'";
                        ?>
                        <option value="<?= $produto->id; ?>" <?= $selected; ?>><?= $produto->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
 
        <tr class="form-group required">
            <td><label class="control-label">Cliente</label></td>
            <td>
                <select class="form-control" name="id_cliente">
                    <?php foreach ($clientes as $cliente) : ?>
                        <?php 
                            $selected = '';
                            if (isset($cliente) && $pedido->id_cliente == $cliente->id)
                                $selected = "selected='selected'";
                        ?>
                        <option value="<?= $cliente->id; ?>" <?= $selected; ?>><?= $cliente->nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary"><?= (isset($pedido)) ? 'Salvar' : 'Criar'; ?></button>
                </form>
                <?php if (isset($pedido)) : ?>
                    <a href="<?= BASE_URL; ?>pedidos/<?= $pedido->id; ?>/delete" class="btn btn-danger">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>