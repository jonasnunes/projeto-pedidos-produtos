<?php

    // pegar os valores do formulário
    $email = $_POST["email"] ?? !empty($email);
    $senha = $_POST["senha"] ?? !empty($senha);

    // fazer a conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "restaurante_bd";

    try{
        $connect = new PDO("mysql:host=$servername; dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        // verificar se email e senha estão no BD
        $query = $connect->prepare("SELECT codigo FROM usuario WHERE email=:email AND senha=md5(:senha)");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':senha', $senha, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetchAll();
        $qtd_usuarios = count($result);
        
        if(empty($qtd_usuarios)){
            $action = "index.php";
            echo "<p style='color:red;'>Usuário <strong>NÃO</strong> encontrado!</p>";
        } else{
            $action = "login.php";
        }
        
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    // fechando a conexão com o banco de dados
    $connect = null;