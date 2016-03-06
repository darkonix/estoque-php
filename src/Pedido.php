<?php

namespace Abril;

class Pedido {
    public $id;
    public $id_produto;
    public $id_cliente;
    public $produto;
    public $cliente;

    public function __construct($id = null) {
        if ($id) {
            $db = getPDOInstance();

            $sql = 'SELECT * FROM `pedido` WHERE `id` = :id';     

            try {
                $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $st->execute(array(':id' => $id));
                $result = $st->fetchAll(\PDO::FETCH_CLASS);

                if (!$result) 
                    throw new \Exception('Pedido não encontrado');

                $this->id = $id;
                $this->id_produto = $result[0]->id_produto;
                $this->id_cliente = $result[0]->id_cliente;
                $this->produto = new Produto($this->id_produto);
                $this->cliente = new Cliente($this->id_cliente);
                return true;

            } catch (\Exception $e) {
                echo $e->getMessage();
                die;
            }
        }
    }

    static public function getAll() {
        $db = getPDOInstance();

        $sql = 'SELECT * FROM `pedido`';     

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute();
            $result = $st->fetchAll(\PDO::FETCH_CLASS);

            foreach ($result as $entry) {
                $entry->produto = new Produto($entry->id_produto);
                $entry->cliente = new Cliente($entry->id_cliente);
            }

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function create() {
        $db = getPDOInstance();

        $sql = 'INSERT INTO `pedido` (id_produto, id_cliente) VALUES (:id_produto, :id_cliente)';    

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':id_produto' => $this->id_produto, 
                ':id_cliente' => $this->id_cliente
            ));
            $this->id = $db ->lastInsertId();

            if (!$this->id) {
                throw new \Exception('Erro ao criar pedido');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function save() {
        $db = getPDOInstance();

        $sql = 'UPDATE `pedido` SET id_produto = :id_produto, id_cliente = :id_cliente WHERE id = :id';

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':id' => $this->id,
                ':id_produto' => $this->id_produto, 
                ':id_cliente' => $this->id_cliente
            ));

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function delete() {
        $db = getPDOInstance();

        $sql = 'DELETE FROM `pedido` WHERE id = :id';
        
        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':id' => $this->id,
            ));

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }
}

?>