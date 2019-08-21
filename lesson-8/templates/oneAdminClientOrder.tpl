<div class="row">
    <div class="col-12">
        <h3 class="text-center" style="padding: 20px 0">Заказ № {{ORDERID}}</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Product</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-right">Price</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Сумма заказа</strong></td>
                    <td class="text-right"><strong id="total">{{TOTALSUM}} руб.</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Статус</strong></td>
                    <td class="text-right"><strong class="td-status">{{STATUS}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Логин</strong></td>
                    <td class="text-right"><strong id="login">{{LOGIN}}</strong></td>
                </tr>
                </tfoot>
                <tbody class="product-basket">
                {{CONTENT}}
                </tbody>

            </table>
        </div>
        {{CONTROLBUTTON}}
    </div>
    <div class="col mb-2">
        <div class="row">
            <div class="text-right" style="width: 100%">

            </div>
        </div>
    </div>
</div>