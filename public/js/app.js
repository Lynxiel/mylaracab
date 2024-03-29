
window.onload = function() {
    if (window.jQuery) {

        /*------------------- CART----------------------*/
        $('.cart-add').on('click',function(e){

            e.preventDefault();
            $('.tooltip').remove();
            var cartbtn = $(this);
            var type = "PUT";
            var ajaxurl = 'cart';
            $.ajax({
                headers: { 'X-CSRF-TOKEN': cartbtn.closest('form').find('input[name=_token]').val()  },
                type: type,
                url: ajaxurl,
                data: {cable_id : cartbtn.closest('form').find('input[name=cable_id]').val(),
                },
                success: function (data) {
                    $('#cart-replace').empty().append(data);
                    cartbtn.removeClass('btn-warning').addClass('btn-light').attr('disabled',true)
                        .html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">'
                            +'<path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>'
                            +'<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>'
                            +'</svg>');
                },
                error: function (data) {
                    console.log(data.responseText);
                }
            });
        })
        /*-----  SHOW/HIDE PASSWORD ---------------*/
        $(".show_hide_password a").bind('click', function(event) {
            event.preventDefault();

            if($('.show_hide_password input').attr("type") == "text"){
                $('.show_hide_password input').attr('type', 'password');

                $('.show_hide_password svg').html(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">'+
                    '<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"></path>'+
                    '<path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"></path>'+
                    '<path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"></path>'+
                    '</svg>');

            }else if($('.show_hide_password input').attr("type") == "password"){
                $('.show_hide_password input').attr('type', 'text');
                $('.show_hide_password svg').html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">'
                    +'<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>'
                    +'<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>'
                    +'</svg>');

            }
        });
    }

    $(document).on('click', '.btn-close, .modal-btn',function (){
        $('div.alert-danger').remove();
    })

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $('#cart-replace').on('click','.btn-remove-cart',function(e){
        e.preventDefault();
        var context = $(this);
        var cable_id = context.closest('form').find('input[name=cable_id]').val();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': context.closest('form').find('input[name=_token]').val()  },
            type: "DELETE",
            url: 'cart',
            data: {cable_id : cable_id},
            success: function (data) {
                cartRefreshCallback(data);
                var input = $('.groups-container').find('input[value='+cable_id+']');
                var form = input.closest('form');
                console.log(form);
                form.find('button').addClass('btn-warning bg-orange').removeClass('btn-light').attr('disabled',false)
                    .html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" '+
                          'class="bi bi-cart" viewBox="0 0 16 16">'+
                          '<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>'+
                          '</svg>');

            },
            error: function (data) {
                console.log(data);
            }
        });


    });


    $('#cart-replace').on('click','.plus',function(){
        context = $(this);
        input = context.closest('.qty').find('.count');
        input.attr('value',parseInt(input.val()) + 1 );

        updateQuantityAjax(context );
    });




    $('#cart-replace').on('click','.minus',function(){

        context = $(this);
        input = $(this).closest('.qty').find('.count');
        input.attr('value',parseInt(input.val()) - 1 );
        if (input.val() == 0) {
            input.attr('value',1);
        }
        else {
           updateQuantityAjax( context );
        }


    });

    function updateQuantityAjax( context ){
        var type = "PUT";
        var ajaxurl = 'cart';
        $.ajax({
            headers: { 'X-CSRF-TOKEN': context.closest('form').find('input[name=_token]').val()  },
            type: type,
            url: ajaxurl,
            data: {cable_id : context.closest('form').find('input[name=cable_id]').val(),
                   quantity: context.closest('.qty').find('.count').val()},
            success: function (data) {
                cartRefreshCallback(data)
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function cartRefreshCallback(data){
        var newdata = $(data).find('.modal-content');
        $('#CartModal').find('.modal-content').empty().append(newdata);
        $('#cart-btn').replaceWith($(data).closest('button'));
    }{}



}
