<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{TITLE}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Главная</a>
        <a class="p-2 text-dark" href="/gallery.php">Галерея</a>
        <a class="p-2 text-dark" href="/news.php">Новости</a>
        <a class="p-2 text-dark" href="/products/index.php">Продукты</a>
        <a class="p-2 text-dark" href="/contacts.php">Контакты</a>
        <a class="p-2 text-dark" href="/cart.php">Корзина</a>
    </nav>
    {{LOGINBUTTON}}
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{TITLE}}</h1>
</div>

<div class="container">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong id="total">{{TOTALSUM}} руб.</strong></td>
                        </tfoot>
                        <tbody class="product-basket">
                            {{CONTENT}}
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="text-right" style="width: 100%">
                        {{BUTTONBUY}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/holder.min.js"></script>
<script src="/js/basket.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>