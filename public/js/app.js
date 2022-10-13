/*------------------- CART----------------------*/
window.onload = function() {
    if (window.jQuery) {
        $('.quantity_edit').on('change',function(e){
            e.preventDefault();
            if (this.value<0) this.value=0;
            this.closest('form').submit();
        });

        $('.cart-add').on('click',function(e){

            e.preventDefault();
            var cartbtn = $(this);
            var type = "POST";
            var ajaxurl = 'addToCart';
            $.ajax({
                headers: { 'X-CSRF-TOKEN': cartbtn.closest('form').find('input[name=_token]').val()  },
                type: type,
                url: ajaxurl,
                data: {cable_id : cartbtn.closest('form').find('input[name=cable_id]').val()},
                success: function (data) {
                    $('#cart-replace').empty().append(data);
                    cartbtn.removeClass('btn-warning').addClass('btn-success').attr('disabled',true)
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

                $('.show_hide_password svg').html('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">'+
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

    $('.btn-close, .modal-btn').bind('click',function (){
        $('div.alert-danger').remove();
    })

}

