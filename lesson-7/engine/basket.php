<?php

function addBasket($id){
    $id = (int)$id;
    $week = time() + (7 * 24 * 60 * 60);
    if(!empty($_COOKIE["cart"][$id])){
        if(setcookie("cart[$id]",++$_COOKIE["cart"][$id],$week,'/')){
            return 1;
        }
        return null;
    };
    if(setcookie("cart[$id]",1,$week,'/')){
        return 1;
    }
    return null;
}

function deleteBasket($id){
    $id = (int)$id;
    unset($_COOKIE["cart"][$id]);
    if(setcookie("cart[$id]", null, -1,'/')){
        return 1;
    }
    return null;
}


function getCart(){
    $idsString = '';
    $i = 1;

    if(empty($_COOKIE["cart"])){
        return false;
    }

    foreach($_COOKIE["cart"] as $k => $v){

        if((count($_COOKIE["cart"])) == $i){
            $idsString.= $k;
        }else{
            $idsString.= $k.',';
        }
        ++$i;
    }
    $products = getAllProductsBasket($idsString);
    foreach ($products as $k => $v){
        $products[$k]['count'] =  $_COOKIE["cart"][$v['id']];
    }
    return $products;
}

function getTotalSum(){
    $products = getCart();
    if($products){
        $price = 0;
        foreach ($products as $k => $v){
            $price+=  $v['count'] * $v['price'];
        }
        return $price;
    }
    return 0;
}


function renderCart($products){
    $result = '';
    if($products){
        foreach ($products as $product) {
            $result .= render(TEMPLATES_DIR . 'cartItem.tpl',$product);
        }
    }else{
        $result = render(TEMPLATES_DIR . 'cartEmpty.tpl');
    }
    return $result;
}


