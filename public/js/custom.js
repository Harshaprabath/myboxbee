// $(document).ready(function () {



//     $('.add-to-cart').click(function (e) {
//         e.preventDefault();

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         var product_id = $(this).closest('.product').find('.product_id').val();
//         var quantity = $(this).closest('.product').find('.qty-input').val();
//         $.ajax({
//             url: "/add-to-cart",
//             method: "POST",
//             data: {
//                 'quantity': quantity,
//                 'id': product_id,

//             },
//             success: function (response) {
//                document.location.href="/cart"
//             },
//         });
//     });
//     $('.increment-btn').click(function(e) {
//         e.preventDefault();
//         var incre_value = $(this).parents('.quantity').find('.qty-input2').val();
//         var value = parseInt(incre_value, 10);
//         value = isNaN(value) ? 0 : value;

//             value++;
//             $(this).parents('.quantity').find('.qty-input2').val(value);
//             $('#operation').val('+');


//     });

//     // $('.decrement-btn').click(function(e) {
//     //     e.preventDefault();
//     //     var decre_value = $(this).parents('.quantity').find('.qty-input2').val();
//     //     var value = parseInt(decre_value, 10);
//     //     value = isNaN(value) ? 0 : value;
//     //     if (value > 1) {
//     //         value--;
//     //         $(this).parents('.quantity').find('.qty-input2').val(value);
//     //         $('#operation').val('-');
//     //     }
//     // });



//     $('.changeQuantity1').click(function (e) {
//        var div =$('#sub1').text()
//      var op=  $('#operation').val()
//         e.preventDefault();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         var thiskclick =$(this);
//         var quantity = $(this).closest(".quantity").find('.qty-input2').val();
//         var product_id = $(this).closest(".quantity").find('.product_id').val();
//         var status = $(this).closest(".quantity").find('.status2').val();
//         var id = $(this).closest(".quantity").find('.cart_id').val();

//         var data = {
//             // '_token': $('input[name=_token]').val(),
//             'quantity':quantity,
//             'product_id':product_id,
//             'status2':status,
//             'id':id
//         };

//         $.ajax({
//             url: '/update-to-cart',
//             type: 'POST',
//             data: data,
//             success: function (response) {
//                 console.log(response);
//                 console.log(div);
//                 thiskclick.closest('.item').find('.grandtotal').text('$' + response.gtprice + '.00');
//             //    $('.grandtotal').text(response.gtprice);
//                 $('#sub').load(location.href + ' .subtotal');
//                 if(op == '-'){
//                     $('#sub1').text(Number(div) - Number(response.price));
//                     $('#esti').text(Number(div) - Number(response.price));

//                 }
//                 else{
//                     $('#sub1').text(Number(div) + Number(response.price));
//                     $('#esti').text(Number(div) + Number(response.price));
//                 }

//                 $('#bagkload').load(location.href + ' .bag');

//             }
//         });
//     });


// });

// // $('.remove1').click(function (e) {
// //     e.preventDefault();
// //     $.ajaxSetup({
// //         headers: {
// //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //         }
// //     });
// //     var thiskclick =$(this);
// //     var id = $(this).closest(".item-details").find('.cart_id').val();

// //     var data = {
// //         'id':id
// //     };

// //     $.ajax({
// //         url: '/remove-to-cart',
// //         type: 'POST',
// //         data: data,
// //         success: function (response) {
// //             if(response.status == 200){
// //                 thiskclick.closest('.item').remove();
// //                 $('#bagkload').load(location.href + ' .bag');

// //             }


// //         }
// //     });
// // });
// // $('.remove').click(function (e) {
// //     e.preventDefault();
// //     $.ajaxSetup({
// //         headers: {
// //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //         }
// //     });
// //     var thiskclick =$(this);
// //     var id = $(this).closest(".remove").find('.cart_id').val();

// //     var data = {
// //         'id':id
// //     };

// //     $.ajax({
// //         url: '/remove-to-cart',
// //         type: 'POST',
// //         data: data,
// //         success: function (response) {
// //             if(response.status == 200){
// //                 thiskclick.closest('.item').remove();
// //                 $('#bagkload').load(location.href + ' .bag');
// //                 $('#sub').load(location.href + ' .subtotal');
// //             }


// //         }
// //     });
// // });

// $('.iWishAdd').click(function(e){
//     e.preventDefault();
//     var id =$('.product_id').val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     var data = {
//         'id':id
//     };
//     $.ajax({
//         url: '/add-to-wishlist',
//         type: 'POST',
//         data: data,
//         success: function (response) {
//             if(response.status == 200){
//                  document.getElementById('iWishAdd').style.display='none';
//                 $('.iWishLoginMsg').text('Your wishlist has been  saved.');

//                 $('#loadwish').load(location.href + ' .iWishView');
//             }
//             else{
//                 document.location.href='/login'
//             }



//         }
//     });

// })






$(document).ready(function() {
    $('#font1')
				.fontselect()
				.on('change', function() {
					applyFont(this.value);
				});

    $("#owl-demo").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

});

//   });
  function hideCart(){
    $('.cart-flyout').removeClass('visible');
  }

  $('.increment-btn').click(function(e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input1').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;

        value++;
        $(this).parents('.quantity').find('.qty-input1').val(value);
        $('#operation').val('+');


});

$('.decrement-btn').click(function(e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input1').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
        value--;
        $(this).parents('.quantity').find('.qty-input1').val(value);
        $('#operation').val('-');
    }
});



$('.changeQuantity').click(function (e) {
   var div =$('#sub1').text()
 var op=  $('#operation').val()
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var thiskclick =$(this);
    var quantity = $(this).closest(".quantity").find('.qty-input1').val();
    var product_id = $(this).closest(".quantity").find('.product_id').val();
    var status = $(this).closest(".quantity").find('.status2').val();
    var id = $(this).closest(".quantity").find('.cart_id').val();

    var data = {
        // '_token': $('input[name=_token]').val(),
        'quantity':quantity,
        'product_id':product_id,
        'status2':status,
        'id':id
    };

    $.ajax({
        url: '/update-to-cart',
        type: 'POST',
        data: data,
        success: function (response) {
            console.log(response);
            console.log(div);
            thiskclick.closest('.item').find('.grandtotal').text('$' + response.gtprice + '.00');
        //    $('.grandtotal').text(response.gtprice);
            $('#sub').load(location.href + ' .subtotal');
            if(op == '-'){
                $('#sub1').text(Number(div) - Number(response.price));
            }
            else{
                $('#sub1').text(Number(div) + Number(response.price));
            }

            $('#bagkload').load(location.href + ' .bag');

        }
    });
});

function applyFont(font) {
    console.log('You selected font: ' + font);

    // Replace + signs with spaces for css
    font = font.replace(/\+/g, ' ');

    // Split font into family and weight
    font = font.split(':');

    var fontFamily = font[0];
    var fontWeight = font[1] || 400;

    // Set selected font on paragraphs
    $('.prev').css({fontFamily:"'"+fontFamily+"'", fontWeight:fontWeight});
}

$(function() {
    // Highlight code samples:
    hljs.configure({
        tabReplace: '   ', // 3 spaces
    });
    $('pre code').each(function() {
        hljs.highlightBlock(this);
    });
});




