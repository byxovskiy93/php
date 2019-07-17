<?php

function getAllImages(){
    $sql = "SELECT * FROM images ORDER BY `images`.`views` DESC";
    return getAssocResult($sql);
}

function addView($id){
    $sql = "UPDATE `images` SET `views` = `views` + 1 where id = $id";
    $result = execQuery($sql);
    return $result;
}

function renderOneImages($gallery){
    $result = '';
    $result = render(TEMPLATES_DIR . 'galleryOneItem.tpl',$gallery);
    return $result;
}

function renderAllGallery($gallery) {
    $result = '';
    foreach ($gallery as $image) {
            $result .= render(TEMPLATES_DIR . 'galleryItem.tpl',$image);
    }
    return $result;
}
