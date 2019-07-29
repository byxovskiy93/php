<?php

function is_auth(){
    if(!empty($_SESSION['login'])){
        return true;
    }else{
        return false;
    }
}


function getRole(){
    if(is_auth()){
       return $_SESSION['login']['role'];
    }else{
        return false;
    }
}


function getDataAccount(){
    if(is_auth()){
        return $_SESSION['login'];
    }else{
        return false;
    }
}

function getUserId(){
    if(is_auth()){
        return $_SESSION['login']['id'];
    }else{
        return false;
    }
}