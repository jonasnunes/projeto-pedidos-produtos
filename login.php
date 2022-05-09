<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
            echo "<div class='alert alert-danger'><p>Usuário <strong>NÃO</strong> encontrado!</p></div>";
        } else{
            $action = "login.php";
        }
        
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    // fechando a conexão com o banco de dados
    $connect = null;

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>