<?php

    // pegar os valores do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // fazer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "restaurante_bd";

    try{
        $connect = new PDO("mysql:host=$servername; dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        // verificar se email e senha estão no BD
        $query = $connect->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=:senha");
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $senha);
        $query->execute();

        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $k=>$v) {
            echo $v;
  }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    // fechando a conexão com o banco de dados
    $connect = null;