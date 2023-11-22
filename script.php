<?php

echo '
<script>

let alerta = document.querySelector("#alerta_login");

function cadastrado(){
    alerta.style.display = "flex";
    alerta.style.color = "#A0BA94";
    alerta.textContent = "Cadastro com Sucesso!";
    setTimeout(function() {
        alerta.style.display = "none";
    }, 2000);
}

function nomeexistente(){
    alerta.style.display = "flex";
    alerta.style.color = "red";
    alerta.textContent = "Nome já em uso!";
    setTimeout(function() {
        alerta.style.display = "none";
    }, 2000);
}

function nomeinexistente(){
    alerta.style.display = "flex";
    alerta.style.color = "red";
    alerta.textContent = "Nome não cadastrado";
    setTimeout(function() {
        alerta.style.display = "none";
    }, 2000);
}

function senhaincorreta(){
    alerta.style.display = "flex";
    alerta.style.color = "red";
    alerta.textContent = "Senha incorreta";
    setTimeout(function() {
        alerta.style.display = "none";
    }, 2000);
}

</script>';