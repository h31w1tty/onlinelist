<?php
    include('conexao.php');
    if($_POST){
        $btn = $_POST['btn'];
        if($btn == "confirmar"){
            $nome = $_POST['input_grupo'];
            session_start();
            $id = $_SESSION['id_usuario'];
            $sql = 'INSERT INTO grupo VALUES (null, "'.$nome.'", "'.$id.'")';
            $executa = $con->query($sql);
            header("Location: listas.php");
        }else{
            header("Location: listas.php");
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Lista</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@700&display=swap');
        body{
            display: grid;
            justify-items: center;
            font-family: 'Roboto', sans-serif;
        }
        h1{
            margin: 80px 0 20px 0;
            font-size: 40px;
            text-decoration: underline;
            letter-spacing: 5px;
        }
        .alertbox{
            margin: 10px 0 40px 0;
            display: grid;
            align-items: center;
            text-align: center;
            background-color: #C6AE72;
            width: 320px;
            min-height: 100px;
            padding: 0 10px;
            font-size: 19px;
        }
        form{
            display: grid;
        }
        #cancelar{
            width: 100px;
            height: 68px;
            background-color: #BF3836;
        }
        #confirmar{
            width: 100px;
            height: 68px;
            background-color: #8BCD85;
        }
        #confirmar,#cancelar{
            box-shadow: #00000040 0 4px 4px;
            border: none;
        }
        #cancelar:active,#confirmar:active{
            box-shadow: none;
        }
        #cancelar:hover,#confirmar:hover{
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
        #grupo{
            display: grid;
            background-color: #D8D8D8;
            width: 60vw;
            padding: 10px 30px;
            min-height: 45px;
            border: 4px solid #494949;
            align-items: center;
            font-size: 24px;
        }
    </style>
</head>
<body background="/images/wllpp.jpg">
    <h1>Nova Lista +</h1>
    <svg width="34" height="34" fill="#C6AE72" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="m2.202 18.47 7.962-14.465c.738-1.34 2.934-1.34 3.672 0l7.962 14.465c.646 1.173-.338 2.53-1.835 2.53H4.037c-1.497 0-2.481-1.357-1.835-2.53Z"></path>
        <path d="M12 9v4"></path>
        <path d="M12 17.02V17"></path>
    </svg>
    <div class="alertbox">
        <p>Não será possível alterar o nome do grupo. Apenas apagar e criar outro.</p>
    </div>
    <form method="post">
        <label for="input_grupo" style="font-size: 18px;">Nome do Grupo:</label>
        <input id="grupo" type="text" name="input_grupo">
        <div class="controle">
            <button id="cancelar" name="btn" value="cancelar">
                <svg width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m5 5 14 14M5 19 19 5"></path>
                </svg>
            </button>
            <button id="confirmar" name="btn" value="confirmar">
                <svg width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m3 12 6 6L21 6"></path>
                </svg>
            </button>
        </div>
    </form>
    
</body>
</html>