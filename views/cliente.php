<h2 class="sub-header"><?= (isset($cliente)) ? 'Editar Cliente' : 'Criar Cliente';  ?></h2>

<form action='<?= (isset($cliente)) ? BASE_URL . "clientes/{$cliente->id}" : BASE_URL . "clientes/create"; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr class="form-group required">
            <td><label class="control-label">Nome</label></td>
            <td><input type='text' name='nome' class='form-control' required="required" value="<?= (isset($cliente)) ? $cliente->nome : ''; ?>" /></td>
        </tr>
 
        <tr class="form-group required">
            <td><label class="control-label">Email</label></td>
            <td><input type='text' name='email' class='form-control' required="required" value="<?= (isset($cliente)) ? $cliente->email : ''; ?>" /></td>
        </tr>

        <tr class="form-group required">
            <td><label class="control-label">Telefone</label></td>
            <td><input type='text' name='telefone' class='form-control' required="required" value="<?= (isset($cliente)) ? $cliente->telefone : ''; ?>" /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary"><?= (isset($cliente)) ? 'Salvar' : 'Criar'; ?></button>
                </form>
                <?php if (isset($cliente)) : ?>
                    <a href="<?= BASE_URL; ?>clientes/<?= $cliente->id; ?>/delete" class="btn btn-danger">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>