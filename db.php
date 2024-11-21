<?php
const DB_HOST = "localhost";
const DB_NAME = "atividade_thiago";
const DB_USER = "root";
const DB_PASS = "root";

class Database {
    static function connect() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        return $conn;
    }

    static function close($conn) {
        $conn->close();
    }

    static function criar($table, $campos, $valores) {
        $conn = self::connect();

        $valores = array_map(fn ($valor) => "'$valor'", $valores);
        $valores = implode(', ', $valores);
        $campos = implode(', ', $campos);

        $query = "INSERT INTO $table ($campos) VALUES ($valores)";

        $conn->query($query);
        self::close($conn);
    }

    static function listar($table) {
        $conn = self::connect();
        $query = "SELECT * FROM $table";
        $resposta = $conn->query($query);
        
        $data = [];
        while ($row = $resposta->fetch_assoc()) {
            $data[] = $row;
        }

        self::close($conn);
        return $data;
    }

    static function excluir($table, $id) {
        $conn = self::connect();
        $query = "DELETE FROM $table WHERE id = $id";
        $conn->query($query);
        self::close($conn);
    }

    static function atualizar($table, $dados, $id) {
        $conn = self::connect();
        $dados_query = "";

        foreach ($dados as $campo => $valor) {
            $dados_query.= "$campo = '$valor', ";
        }

        $dados_query = rtrim($dados_query, ', ');

        $query = "UPDATE $table SET $dados_query WHERE id = $id";


        $conn->query($query);
    }

    static function buscar($table, $id) {
        $conn = self::connect();
        $query = "SELECT * FROM $table WHERE id = $id";
        $resposta = $conn->query($query);
        
        self::close($conn);
        return $resposta->fetch_assoc();
    }
}