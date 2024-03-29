(function(){
    $(document).ready(function ()
    {
        var selectElement;
        var totalHtml;

        $('.removeOrder').click(function (e) {

            e.preventDefault();

            var idOrder = $(this).data('order-id');
            selectElement = $(this).parents('.col-12')[0];
            console.log(selectElement);
            removeOrder(idOrder);
        });

        function removeOrder(id) {
            $.post({
                url: '/orderApi.php',
                data: {
                    method: 'remove',
                    id: id
                },
                success: function (response) {
                    if(response.error) {
                        alert('Произошла ошибка при передачи данных!');
                    } else {
                       $(selectElement).html(response.data);
                    }
                }
            });
        }


    });
})();