$(document).ready(function () {
    $('.box_img_zoom').wrap('<span style="display:inline-block"></span>')
        .css('display', 'block')
        .parent().zoom();
});

$(document).ready(function () {
    $('#cardsmesage').click(function () {
        $('#card').modal('show');
        $('#modelcard').modal('hide');
    })
});

// function addBorder(el) {
//     $('.image img').css({'border':'none'});
//     $('#'+el.id+' .image img').css({'border':'5px solid black'})
// }

$(document).ready(function () {
    $('.sidebar .nav-item').each(function(el) {
        $(this).click(function(e) {
            // console.log('123')
            let nextEl = $(this).next();
            let parentEl = $(this).parent();

            // if (nextEl) {
                e.preventDefault();
                $('.js-dropp-action').removeClass('js-open')
                parentEl.children(":first").addClass('js-open')
                $(".sidebar .nav-item .submenu").removeClass('show')
                parentEl.children(".submenu").toggleClass('show')
            // }
        });
    });
});

function changeMainImage(el, pId){
    var mainImg = $('.gift-product-carousel-'+pId+' .carousel-item:first img');
    mainImg.attr('src', el.src)
}

$(document).ready(function() {
    // var to = $('#cardTo');
    // var from = $('#catdFrom');
    // var message = $('#cardMessage');
    $('#cardTo').on('keyup', function () {
        $('.previewto').text($(this).val())
    })
    $('#catdFrom').on('keyup', function () {
        $('.previewfrom').text($(this).val())
    });
    $('#cardMessage').on('keyup', function () {
        if ($(this).val().length >= 350) {
            $('.modl1').removeClass('vi')
            $('.modl1').addClass('boxfox-modal')
            $('.modl1').addClass('visible')

            return false;
        } else {
            $('.previewmessage').text($(this).val())
        }

    })
});