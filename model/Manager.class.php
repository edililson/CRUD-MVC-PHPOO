<?php

    class Manager extends Connectiom{

        public function insertMotorista($table, $data){
            $pdo = parent::getConnection();
            //parent:: pega um metodo de outra classe, nesse caso da class Conexao
            $campos = implode(", ", array_keys($data));
            $valores = ":".implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($campos) VALUES ($valores)";
            $stmt = $pdo->prepare($sql);
            foreach($data as $key => $valores){
                $stmt->bindValue(":$key", $valores, PDO::PARAM_STR);
            }
            $stmt->execute();
        }

        public function listMotorista(){
            $pdo = parent::getConnection();
            $sql = "SELECT 
            m.id,
            m.nome,
            m.cpf,
            m.email,
            m.fk_situacao,
            m.fk_status,
            s.situacao,
            st.status  
            FROM motorista as m 
            JOIN situacao as s on s.id = m.fk_situacao
            JOIN stts as st on st.id = m.fk_status ORDER BY id ASC";
            $stmt = $pdo->query($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }


        public function deleteMotorista($table, $id){
            $pdo = parent::getConnection();
            $sql = "DELETE FROM $table WHERE id = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        }

        public function getInfo($table, $id){
            $pdo = parent::getConnection();
            $sql = "SELECT * FROM $table WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            
            return $stmt->fetchAll();

        }

        public function updateMotorista($table, $data, $id){
            $pdo = parent::getConnection();
            $new_value = "";
            foreach($data as $key => $value){
                $new_value .= "$key=:$key, ";
            }
            $new_value = substr($new_value,0 ,-2);
            $sql = "UPDATE $table SET $new_value where id = :id";
            $stmt = $pdo->prepare($sql);
            foreach($data as $key => $value){
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            $stmt->execute();
            var_dump($stmt);

        }
    }
