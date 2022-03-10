

$(document).ready(function() {

    // add to cart btn

    $('.addCartBtn ').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        // alert(product_id);
        // alert(product_qty);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
                swal(response.status);
            }
        });

    });




    //  functionlity of the qty button 
    $('.increment-btn').click(function(e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value=$(this).closest('.product_data').find('.qty-input').val();
     
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value=$(this).closest('.product_data').find('.qty-input').val();

        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // delete delete-cartItem
    $('.delete-cartItem').click(function (e) { 
        e.preventDefault();
        var prod_id=$(this).closest('.product_data').find('.prod_id').val()
    
        $.ajax({
            method:"POST",
            url: "delete-cart-Item",
            data: {"prod_id":prod_id},
            success: function (response) {
                window.location.reload()
                swal('',response.status,'sucsess')
            }
        });
        
    });
});
