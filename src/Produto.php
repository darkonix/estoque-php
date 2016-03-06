<?php

namespace Abril;

class Produto {
    public $id;
    public $nome;
    public $descricao;
    public $preco;

    public function __construct($id = null) {
        if ($id) {
            $db = getPDOInstance();

            $sql = 'SELECT * FROM `produto` WHERE `id` = :id';     

            try {
                $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $st->execute(array(':id' => $id));
                $result = $st->fetchAll(\PDO::FETCH_CLASS);

                if (!$result) 
                    throw new \Exception('Produto não encontrado');

                $this->id = $id;
                $this->nome = $result[0]->nome;
                $this->descricao = $result[0]->descricao;
                $this->preco = $result[0]->preco;

                return true;

            } catch (\Exception $e) {
                echo $e->getMessage();
                die;
            }
        }
    }

    static public function getAll() {
        $db = getPDOInstance();

        $sql = 'SELECT * FROM `produto`';     

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute();
            $result = $st->fetchAll(\PDO::FETCH_CLASS);

            if (!$result) 
                throw new \Exception('Produto não encontrado');

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function create() {
        $db = getPDOInstance();

        $sql = 'INSERT INTO `produto` (nome, descricao, preco) VALUES (:nome, :descricao, :preco)';    

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':nome' => $this->nome, 
                ':preco' => $this->preco, 
                ':descricao' => $this->descricao
            ));
            $this->id = $db ->lastInsertId();

            if (!$this->id) {
                throw new \Exception('Erro ao criar produto');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function save() {
        $db = getPDOInstance();

        $sql = 'UPDATE `produto` SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id';

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':id' => $this->id,
                ':nome' => $this->nome, 
                ':preco' => $this->preco, 
                ':descricao' => $this->descricao
            ));

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function delete() {
        $db = getPDOInstance();

        $sql = 'DELETE FROM `produto` WHERE id = :id';
        
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