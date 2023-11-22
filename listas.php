<?php
    include('conexao.php');
    session_start();
    $id_usuario = $_SESSION['id_usuario'];
    
    $sql = 'SELECT * FROM grupo WHERE id_usuario = '.$id_usuario.' ORDER BY id_grupo ASC';

    if($_POST){
        $btn = $_POST['btn'];
        if($btn == "logout"){
            $_SESSION['id_usuario'] = 0;
            header("Location: index.php");
        }else if($btn == "deletar"){

        }else if($btn == "adicionar"){
            header("Location: addgrupo.php");
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Listas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@700&display=swap');
        form{
            display:grid;
        }
        .logout{
            margin-top: 37px;
            margin-left: 32px;
            width: 45px;
            height: 45px;
            background-color: #57705E;
        }
        #deletar{
            width: 100px;
            height: 68px;
            background-color: #BF3836;
        }
        #adicionar{
            width: 100px;
            height: 68px;
            background-color: #8BCD85;
        }
        .logout,#adicionar,#deletar{
            box-shadow: #00000040 0 4px 4px;
            border: none;
        }
        .logout:active,#deletar:active,#adicionar:active{
            box-shadow: none;
        }
        .logout:hover,#deletar:hover,#adicionar:hover{
            cursor: pointer;
        }
        .controle{
            background-color: grey;
            padding: 10px;
            padding-bottom: 55px;
            justify-self: center;
            display: flex;
            position: fixed;
            bottom: 0;
            width: 100%;
            justify-content: space-around;
        }
        h1{
            font-family: 'Roboto', sans-serif;
            justify-self: center;
            letter-spacing: 8px;
        }
        .lista{
            width: 100%;
            display: grid;
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            justify-content: center;
        }
        .grupo{
            display: grid;
            background-color: #D8D8D8;
            width: 70vw;
            padding: 10px 30px;
            margin: 10px;
            min-height: 55px;
            border: 4px solid #494949;
            align-items: center;
        }
    </style>
</head>
<body background="/images/wllpp.jpg">
    <form method="post">
        <button class="logout" name="btn" value="logout">
            <svg width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 12h11"></path>
                <path d="m8 7-5 5 5 5"></path>
                <path d="M21 3v18"></path>
            </svg>
        </button>
        <h1>Listas</h1>

        <div class="controle">
            <button id="deletar" name="btn" value="deletar">
                <svg width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 6h18M5 6v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <path d="M14 11v6"></path>
                    <path d="M10 11v6"></path>
                </svg>
            </button>
            <button id="adicionar" name="btn" value="adicionar">
                <svg width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 7v10m-5-5h10"></path>
                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                </svg>
            </button>
        </div>
    </form>
    <?php
    $executa = $con->query($sql);
    while($grupo = $executa -> fetch_array()){
        echo '<div class="lista">
                <div class="grupo">'.$grupo['nm_grupo'].'</div>
              </div>';
    }
    ?>
</body>
</html>