<?php

    use Abril\App;
    use Abril\Pedido;
    use Abril\Produto;
    use Abril\Cliente;

    // Home (Produtos)
    $router->get('/', function(){ 
        header("Location: ".BASE_URL."pedidos/list");
    });

    // Produtos
    $router->group(['prefix' => 'produtos'], function($router){

        $router->get('list', function(){ 
            $produtos = Produto::getAll();

            print App::render('views/header.php', array('pagina' => 'produtos'));
            print App::render('views/produtos.php', array('produtos' => $produtos));
            print App::render('views/footer.php');
        });

        $router->get('create', function(){ 
            print App::render('views/header.php', array('pagina' => 'produtos'));
            print App::render('views/produto.php');
            print App::render('views/footer.php');
        });

        $router->get('{id}', function($id){
            $produto = new Produto($id);

            print App::render('views/header.php', array('pagina' => 'produtos'));
            print App::render('views/produto.php', array('produto' => $produto));
            print App::render('views/footer.php');
        });

        $router->post('create', function(){
            $produto = new Produto();

            $produto->nome = $_POST['nome'];
            $produto->preco = $_POST['preco'];
            $produto->descricao = $_POST['descricao'];
            $produto->create();

            header("Location: ".BASE_URL."produtos/list");
        });

        $router->post('{id}', function($id){ 
            $produto = new Produto($id);

            $produto->nome = $_POST['nome'];
            $produto->preco = $_POST['preco'];
            $produto->descricao = $_POST['descricao'];
            $produto->save();

            header("Location: ".BASE_URL."produtos/list");
        });

        $router->get('{id}/delete', function($id){
            $produto = new Produto($id);
            $produto->delete();

            header("Location: ".BASE_URL."produtos/list");
        });
    });

    // Clientes
    $router->group(['prefix' => 'clientes'], function($router){

        $router->get('list', function(){ 
            $clientes = Cliente::getAll();

            print App::render('views/header.php', array('pagina' => 'clientes'));
            print App::render('views/clientes.php', array('clientes' => $clientes));
            print App::render('views/footer.php');
        });

        $router->get('create', function(){ 
            print App::render('views/header.php', array('pagina' => 'clientes'));
            print App::render('views/cliente.php');
            print App::render('views/footer.php');
        });

        $router->get('{id}', function($id){
            $cliente = new Cliente($id);

            print App::render('views/header.php', array('pagina' => 'clientes'));
            print App::render('views/cliente.php', array('cliente' => $cliente));
            print App::render('views/footer.php');
        });

        $router->post('create', function(){
            $cliente = new Cliente();

            $cliente->nome = $_POST['nome'];
            $cliente->email = $_POST['email'];
            $cliente->telefone = $_POST['telefone'];
            $cliente->create();

            header("Location: ".BASE_URL."clientes/list");
        });

        $router->post('{id}', function($id){ 
            $cliente = new Cliente($id);

            $cliente->nome = $_POST['nome'];
            $cliente->email = $_POST['email'];
            $cliente->telefone = $_POST['telefone'];
            $cliente->save();

            header("Location: ".BASE_URL."clientes/list");
        });

        $router->get('{id}/delete', function($id){
            $cliente = new Cliente($id);
            $cliente->delete();

            header("Location: ".BASE_URL."clientes/list");
        });
    });

    //Pedidos
    $router->group(['prefix' => 'pedidos'], function($router){

        $router->get('list', function(){ 
            $pedidos = Pedido::getAll();

            print App::render('views/header.php', array('pagina' => 'pedidos'));
            print App::render('views/pedidos.php', array('pedidos' => $pedidos));
            print App::render('views/footer.php');
        });

        $router->get('create', function(){
            $produtos = Produto::getAll();
            $clientes = Cliente::getAll();

            print App::render('views/header.php', array('pagina' => 'pedidos'));
            print App::render('views/pedido.php', array('produtos' => $produtos, 'clientes' => $clientes));
            print App::render('views/footer.php');
        });

        $router->get('{id}', function($id){
            $pedido = new Pedido($id);
            $produtos = Produto::getAll();
            $clientes = Cliente::getAll();

            print App::render('views/header.php', array('pagina' => 'pedidos'));
            print App::render('views/pedido.php', array('pedido' => $pedido, 'produtos' => $produtos, 'clientes' => $clientes));
            print App::render('views/footer.php');
        });

        $router->post('create', function(){
            $pedido = new Pedido();

            $pedido->id_produto = $_POST['id_produto'];
            $pedido->id_cliente = $_POST['id_cliente'];
            $pedido->create();

            header("Location: ".BASE_URL."clientes/list");
        });

        $router->post('{id}', function($id){ 
            $pedido = new Pedido($id);

            $pedido->id_produto = $_POST['id_produto'];
            $pedido->id_cliente = $_POST['id_cliente'];
            $pedido->save();

            header("Location: ".BASE_URL."pedidos/list");
        });

        $router->get('{id}/delete', function($id){
            $pedido = new Pedido($id);
            $pedido->delete();

            header("Location: ".BASE_URL."pedidos/list");
        });
    });