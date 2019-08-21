(function(){
    $(document).ready(function ()
    {
        var tdStatus;

        $('.switchStatus').click(function (e) {

            e.preventDefault();

            var idOrder = $(this).data('order-id');
            var status = $(this).data('order-status');
            tdStatus = $(this).parents('.col-12')[0];
            tdStatus = $(tdStatus).find('.td-status')[0];
            console.log(status);
            switchOrder(idOrder,status);
        });

        function switchOrder(id,status) {
            $.post({
                url: '/orderApi.php',
                data: {
                    method: 'switch',
                    id: id,
                    status: status
                },
                success: function (response) {
                    if(response.error) {
                        alert('Произошла ошибка при передачи данных!');
                    } else {
                        $(tdStatus).text(response.data);
                    }
                }
            });
        }


    });
})();