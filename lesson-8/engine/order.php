<?php

function createOrder($address){

 $sql = '';
 $order =

 $date = date('Y-m-d h:i:s',time());
 $userId = getUserId();
 $status = 1;

 $sql = "INSERT INTO `orders`(`userId`,`address`,`date_create`,`status`) VALUES ('$userId','$address', '$date',' $status')";
 $orderId = insert($sql);


 $data = getCart();
 $readySql = 'INSERT INTO `orders_products`(`orderId`,`productId`,`price`,`amount`) VALUES';


 $productId = '';
 $price = '';
 $amount = '';

//формируем запрос
for($i=0;$i < count($data);++$i){

    $productId = $data[$i]['id'];
    $price = $data[$i]['price'];
    $amount = $data[$i]['count'];

    if($i == 0){
        $readySql.= " ('$orderId','$productId', '$price','$amount')";
    }else{
        $readySql.= ",('$orderId','$productId', '$price','$amount')";
    }

}

$orderProduct = execQuery($readySql);

if($orderProduct){
    if(clearBasket()){
        header('Location: /order.php?status=success');
    }else{
        header('Location: /order.php?status=error');
    };
}else{
    $sql = "DELETE FROM `orders` WHERE `id` = $orderId";
    $deleteOrder = insert($sql);
    header('Location: /order.php?status=error');
}

}

function renderOrder(){
        $result = '';
        $result = render(TEMPLATES_DIR . 'order.tpl');
        return $result;
}


function getClientOrders()
{
    //получаем id пользователя и и получаем все заказы пользователя
    $userId = getUserId();
    $orders = getAssocResult("SELECT * FROM `orders` WHERE `userId` = $userId and status  NOT IN (2) ORDER BY `date_create` DESC");


    if(!count($orders)){
        return false;
    }

    $result = '';
    $readySql = '';

    //формируем запрос
    for($i=0;$i < count($orders);++$i){

        $orderId = $orders[$i]['id'];

        if($i == 0){
            $readySql.="
			SELECT *, `op`.`price` FROM `orders_products` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId
		";
        }else{
            $readySql.= " UNION SELECT *, `op`.`price` FROM `orders_products` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId";
        }
    }
    $ordersProducts =  getAssocResult($readySql);
    $readyArray = [];

    foreach ($ordersProducts  as $k => $v){
        $readyArray[$v['orderId']]['order'][] = $v;
    }

    foreach ($orders as $k => $o){
        $readyArray[$o['id']]['status'] = $o['status'];
    }

    return $readyArray;

}


function renderClientOrder($data){

    $readyHtml = '';

    $totalSum = '';
    $price = '';
    $image = '';
    $description = '';
    $status = '';

    $totalSum = '';

    $readyHtmlOrder = '';

    foreach ($data as $key => $value){

        $totalSum = 0;
        $readyTr= '';

        foreach ($value['order'] as $product){

            $totalSum+= $product['price'] * $product['amount'];

            $readyTr.= render(TEMPLATES_DIR .'oneClient.tpl',[
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'amount' => $product['amount'],
            ]);

        }

        $readyHtmlOrder.= render(TEMPLATES_DIR .'oneClientOrder.tpl',[
            'orderId' => $key,
            'content' => $readyTr,
            'totalSum' => $totalSum,
            'status' => getStringStatus($value['status'])
        ]);
    }

    return $readyHtmlOrder;

}

function renderAdminClientOrder($data){

    $readyHtml = '';

    $totalSum = '';
    $price = '';
    $image = '';
    $description = '';
    $status = '';

    $totalSum = '';

    $readyHtmlOrder = '';

    foreach ($data as $key => $value){

        $totalSum = 0;
        $readyTr= '';

        foreach ($value['order'] as $product){

            $totalSum+= $product['price'] * $product['amount'];

            $readyTr.= render(TEMPLATES_DIR .'oneAdminClient.tpl',[
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'amount' => $product['amount']
            ]);

        }

        $readyHtmlOrder.= render(TEMPLATES_DIR .'oneAdminClientOrder.tpl',[
            'orderId' => $key,
            'content' => $readyTr,
            'totalSum' => $totalSum,
            'status' => getStringStatus($value['status']),
            'login' => $value['login'],
            'controlButton' => ($value['status'] == 2) ? render(TEMPLATES_DIR .'adminControlButtonNoAction.tpl') : render(TEMPLATES_DIR .'adminControlButton.tpl',['orderId' => $key])
        ]);
    }

    return $readyHtmlOrder;

}

function getStringStatus($id){
    $status = [
        1 => 'Не оработан',
        2 => 'Отменен',
        3 => 'Оплачен',
        4 => 'Доставлен',
    ];
    return $status[$id];
}

function removeOrderClient($orderId){
    $id = (int)$orderId;
    //2 = Заказ отменен
    $status = '2';
    $sql = "UPDATE `orders` SET `status`='2' WHERE `id` = $orderId";
    $result = execQuery($sql);
    return $result;
}

function switchOrderStatus($orderId, $newStatus)
{
    $orderId = (int)$orderId;
    $newStatus = (int)$newStatus;
    $sql = "UPDATE `orders` SET `status`= $newStatus WHERE `id` = $orderId";
    $result = execQuery($sql);
    return getStringStatus($newStatus);
}


function getAllOrders()
{

    $orders = getAssocResult("SELECT orders.id,orders.address,orders.status,users.login
                                FROM orders
                                LEFT JOIN users
                                ON orders.userId = users.id ORDER BY `date_create` DESC");

    if(!count($orders)){
        return false;
    }

    $result = '';
    $readySql = '';

    //формируем запрос
    for($i=0;$i < count($orders);++$i){

        $orderId = $orders[$i]['id'];

        if($i == 0){
            $readySql.="
			SELECT *, `op`.`price` FROM `orders_products` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId
		";
        }else{
            $readySql.= " UNION SELECT *, `op`.`price` FROM `orders_products` as op
			JOIN `products` as p ON `p`.`id` = `op`.`productId`
			WHERE `op`.`orderId` = $orderId";
        }
    }


    $ordersProducts =  getAssocResult($readySql);
    $readyArray = [];

    foreach ($ordersProducts  as $k => $v){
        $readyArray[$v['orderId']]['order'][] = $v;
    }

    foreach ($orders as $k => $o){
        $readyArray[$o['id']]['status'] = $o['status'];
        $readyArray[$o['id']]['login'] = $o['login'];
    }

    return $readyArray;

}