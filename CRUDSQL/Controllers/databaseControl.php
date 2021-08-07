<?php

if(!defined('PDO::ATTR_DRIVER_NAME')){
    echo "Not available";
}

require_once __DIR__ . '/../Core/config.php';

function createDatabase($cPdo, $dbname){

    try {

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $cPdo->exec($sql);
        return true;
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }finally{
        $cPdo = null;
    }
}

function createTable($pdo){

    try{
        $sql = "CREATE TABLE IF NOT EXISTS usuarios (id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        firstname varchar(40) not null,
        email varchar(40) not null,
        reg_date timestamp default current_timestamp on update current_timestamp)";

        $pdo -> exec($sql);

    }catch(PDOException $e){
        echo $e -> getMessage();
    }finally{
        $pdo = null;
    }
}

function getAll($pdo){

    try{
        $usuarios = $pdo -> query ('select * from usuarios') -> fetchAll();
        return $usuarios;
    }catch(PDOException $e){
        echo $e->getMessage();
    }finally{
        $pdo = null;
    }
}

function insert($pdo, $name, $email){

    try{
        $row = [
            'firstname' => $name,
            'email' => $email
        ];

        $sql = "INSERT INTO USUARIOS set firstname=:firstname, email=:email;";
        $status = $pdo -> prepare($sql) -> execute ($row);

        if($status){
            $id = (int) $pdo -> lastInsertId();
        }
        echo $id;
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }finally{
        $pdo = null;
    }
}

function update($pdo, $userId, $name, $email){

    try{
        $row = [
            'id' => $userId,
            'firstname' => $name,
            'email' => $email
        ];

        $sql = "update usuarios set firstname=:firstname,  email=:email where id=:id;";
        return $pdo -> prepare($sql) -> execute ($row);
    }catch(PDOException $e){
        echo $e->getMessage();
    }finally{
        $pdo =null;
    }
}

function delete($pdo, $userId){

    try{
        $where = ['id' => $userId ];
        echo $pdo -> prepare("Delete From usuarios where id=:id") -> execute($where);
    }catch(PDOException $e){
        echo $e -> getMessage();
    }finally{
        $pdo =null;
    }
}

function getSelected($pdo, $userId){

    try{
        return $pdo -> query("Select * From usuarios where id=$userId") -> fetch();
    }catch(PDOException $e){
        echo $e -> getMessage();
    }finally{
        $pdo = null;
    }
}