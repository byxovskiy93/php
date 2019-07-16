window.onload=function(){
    $(document).ready(function() {
        $('.gallery-images img').click( function(event){

            var clickImagesSrc = this.src;
            var modalImagesSrc = $("#modal-img");
            var modalImagesHref = $("#modal-href");

            modalImagesSrc.attr("src",'');
            modalImagesHref.attr("href",'');
            modalImagesSrc.attr("src",clickImagesSrc);
            modalImagesHref.attr("href",clickImagesSrc);

            $('#overlay').fadeIn(400,
                function(){ //
                    $('#modal_form')
                        .css('display', 'block')
                        .animate({opacity: 1}, 200);
                });
        });


        $('#modal_close, #overlay').click( function(){
            $('#modal_form')
                .animate({opacity: 0}, 200,
                    function(){
                        $(this).css('display', 'none');
                        $('#overlay').fadeOut(400);
                    }
                );
        });
    });
};