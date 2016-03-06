<h2 class="sub-header"><?= (isset($produto)) ? 'Editar Produto' : 'Criar Produto';  ?></h2>

<form action='<?= (isset($produto)) ? BASE_URL . "produtos/{$produto->id}" : BASE_URL . "produtos/create"; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr class="form-group required">
            <td><label class="control-label">Nome</label></td>
            <td><input type='text' name='nome' class='form-control' required="required" value="<?= (isset($produto)) ? $produto->nome : ''; ?>" /></td>
        </tr>
 
        <tr class="form-group required">
            <td><label class="control-label">Preço</label></td>
            <td><input type='text' name='preco' class='form-control' required="required" value="<?= (isset($produto)) ? $produto->preco : ''; ?>"/></td>
        </tr>
 
        <tr class="form-group">
            <td><label class="control-label">Descrição</label></td>
            <td><textarea name='descricao' class='form-control'><?= (isset($produto)) ? $produto->descricao : ''; ?></textarea></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary"><?= (isset($produto)) ? 'Salvar' : 'Criar'; ?></button>
                </form>
                <?php if (isset($produto)) : ?>
                    <a href="<?= BASE_URL; ?>produtos/<?= $produto->id; ?>/delete" class="btn btn-danger">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>