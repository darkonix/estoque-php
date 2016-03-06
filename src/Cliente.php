<?php

namespace Abril;

class Cliente {
    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function __construct($id = null) {
        if ($id) {
            $db = getPDOInstance();

            $sql = 'SELECT * FROM `cliente` WHERE `id` = :id';     

            try {
                $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
                $st->execute(array(':id' => $id));
                $result = $st->fetchAll(\PDO::FETCH_CLASS);

                if (!$result) 
                    throw new \Exception('Cliente não encontrado');

                $this->id = $id;
                $this->nome = $result[0]->nome;
                $this->email = $result[0]->email;
                $this->telefone = $result[0]->telefone;

                return true;

            } catch (\Exception $e) {
                echo $e->getMessage();
                die;
            }
        }
    }

    static public function getAll() {
        $db = getPDOInstance();

        $sql = 'SELECT * FROM `cliente`';     

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute();
            $result = $st->fetchAll(\PDO::FETCH_CLASS);

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function create() {
        $db = getPDOInstance();

        $sql = 'INSERT INTO `cliente` (nome, email, telefone) VALUES (:nome, :email, :telefone)';    

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':nome' => $this->nome, 
                ':email' => $this->email, 
                ':telefone' => $this->telefone
            ));
            $this->id = $db ->lastInsertId();

            if (!$this->id) {
                throw new \Exception('Erro ao criar cliente');
            }

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function save() {
        $db = getPDOInstance();

        $sql = 'UPDATE `cliente` SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id';

        try {
            $st = $db->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $st->execute(array(
                ':id' => $this->id,
                ':nome' => $this->nome, 
                ':email' => $this->email, 
                ':telefone' => $this->telefone
            ));

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function delete() {
        $db = getPDOInstance();

        $sql = 'DELETE FROM `cliente` WHERE id = :id';
        
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