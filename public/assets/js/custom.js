$(document).ready(function(){
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
      });

    $('.box_img_zoom').wrap('<span style="display:inline-block"></span>')
        .css('display', 'block')
        .parent().zoom();

});

function initFontField(el) {
    $('#'+el).fontselect().on('change', function() {
        // applyFont(this.value);
        var font = this.value;
            // Replace + signs with spaces for css
    font = font.replace(/\+/g, ' ');

    // Split font into family and weight
    font = font.split(':');

    var fontFamily = font[0];
    var fontWeight = font[1] || 400;

    // Set selected font on paragraphs
    $('.prev').css({fontFamily:"'"+fontFamily+"'", fontWeight:fontWeight});
    })
}