<?php

function getAllProduct(){
    $sql = "SELECT * FROM products";
    return getAssocResult($sql);
}

function getOneProduct($id){
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = show($sql);
    return $result;
}


function createProduct($name,$price,$description,$images)
{
    $format = explode('.',$images['name'])[1];
    $uploadir = '/img/products/';
    $newImagesName = uniqid('', true).'.'.$format;
    $uploadfile = $uploadir . $newImagesName;

    if (move_uploaded_file($images['tmp_name'], WWW_DIR . $uploadfile)) {
        $link = createConnection();
        $name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($name)));
        $price = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($price)));
        $description = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($description)));
        $images = $uploadfile;
        $sql = "INSERT INTO `products`(`name`,`price`,`description`,`image`) VALUES ('$name', '$price','$description','$images')";
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
        return $result;
    }else{
        return false;
    }

}

function editProduct($id,$name,$price,$description,$images)
{
    if(!empty($images['name'])){

        $format = mb_strtolower(explode('.',$images['name'])[1]);
        $uploadir = '/img/products/';
        $newImagesName = uniqid('', true).'.'.$format;
        $uploadfile = $uploadir . $newImagesName ;

        if (move_uploaded_file($images['tmp_name'], WWW_DIR . $uploadfile)) {
            $link = createConnection();
            $name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($name)));
            $price = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($price)));
            $description = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($description)));
            $images = $uploadfile;
            $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description',`image`='$images' WHERE `id` = $id";
            $result = mysqli_query($link, $sql);
            mysqli_close($link);
            return $result;
        }else{
            return false;
        }
    }else{
        $link = createConnection();
        $name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($name)));
        $price = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($price)));
        $description = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($description)));
        $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description',`image`='$images' WHERE `id` = $id";
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
        return $result;
    }


}

function deleteProduct($id){
    $id = (int)$id;
    $sql = "DELETE FROM `products` WHERE `id` = $id";
    return execQuery($sql);
}

function renderAllProduct($products){
    $result = '<div class="product-list"><div class="container"><div class="row">';
    foreach ($products as $product) {
        $result .= render(TEMPLATES_DIR . 'productItem.tpl',$product);
    }
    $result .= '</div></div></div>';
    return $result;
}

function renderOneProduct($product){
    $result = '<div class="product-list"><div class="container"><div class="row">';
    $result.= render(TEMPLATES_DIR . 'productOneItem.tpl',$product);
    $result.= '</div></div></div>';
    return $result;
}

function renderAddProduct($messages){
    $result = '<div class="product-list"><div class="container-fluid"><div class="row">';
    $result.= render(TEMPLATES_DIR . 'addProduct.tpl',['messages' => $messages]);
    $result.= '</div></div></div>';
    return $result;
}

function renderEditProduct($product){
    $result = '<div class="product-list"><div class="container-fluid"><div class="row">';
    $result.= render(TEMPLATES_DIR . 'editProduct.tpl',$product);
    $result.= '</div></div></div>';
    return $result;
}

