<?php
        include('conexao.php');
        include('script.php');

        if($_POST){
            $input_nome = $_POST["input_nome"];
            $input_senha = $_POST["input_senha"];
            $btn = $_POST["btn"];
            
            if($btn == "criar"){//CRIAR CONTA

                $sql = "SELECT nm_usuario FROM usuario WHERE nm_usuario = '$input_nome'";
                $executa = $con->query($sql);
                if ($executa === FALSE) {
                    die("Erro na consulta: " . $con->error);
                }
                if ($executa->num_rows > 0) {
                    echo '<script>nomeexistente()</script>';
                } else {
                    //cadastrar usuario e senha
                    $sql = "INSERT INTO usuario VALUES (null, '$input_nome', '$input_senha')";
                    $executa = $GLOBALS['con']->query($sql);
                    if($executa){
                        echo '<script>cadastrado()</script>';
                    }else{
                        echo "fudeu";
                    }
                }
                
            }else{//LOGIN VERIFICAÇÂO DE SENHA
                

                $sql = "SELECT id_usuario FROM usuario WHERE nm_usuario = '$input_nome'";
                $executa = $con->query($sql); // Usando $con ao invés de $GLOBALS['con']
                
                if ($executa === FALSE) {
                    die("Erro na consulta: " . $con->error);
                }
                
                if ($executa->num_rows > 0) {
                    // Obtendo o primeiro resultado
                    $row = $executa->fetch_assoc();
                    
                    // Obtendo o ID do usuário
                    $id_usuario = $row["id_usuario"];
                    
                    //VERIFICANDO SENHA
                    $sql = "SELECT senha_usuario FROM usuario WHERE senha_usuario = '$input_senha'";
                    $executa = $con->query($sql); // Usando $con ao invés de $GLOBALS['con']
                    
                    if ($executa === FALSE) {
                        die("Erro na consulta: " . $con->error);
                    }
                    
                    if ($executa->num_rows > 0) {
                        // Obtendo o primeiro resultado
                        $row = $executa->fetch_assoc();
                        
                        // Obtendo o ID do usuário
                        $senha = $row["senha_usuario"];
                        session_start();
                        $_SESSION['id_usuario'] = $id_usuario;
                        header("Location: listas.php");
                    
                        
                    } else {
                        echo '<script>senhaincorreta()</script>';
                    }
                    
                } else {
                    echo '<script>nomeinexistente()</script>';
                }
                
            }

        }
        ?>
<!DOCTYPE html><!-- LOGIN PAGE -->
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online List</title>
</head>
<body background="/images/wllpp.jpg">
    <main>
    
        <h1 class="titulo1">Online List</h1>
        <form method="post">
            <div class="box_login"><!-- caixa de login -->
                <input id="input_nome" name="input_nome" type="text" placeholder="Seu nome">    <!-- login -->
                <input id="input_senha" name="input_senha" type="password" placeholder="Senha"> <!-- senha -->
                <p id="alerta_login" style="display: none;">Este nome já existe!</p> <!-- alerta de erro -->
                <div class="botoes_login">
                    <button id="criar" name="btn" value="criar">Criar</button>
                    <button id="entrar" name="btn" value="entrar">Entrar</button>
                </div>
            </div>
        </form>
        
    </main>
</body>
</html>