$('.data-custom').css({
    position: 'absolute'
}).hide();

$('area').each(function (i) {
    $('area').eq(i).bind('mouseover', function (e) {
        $('.data-custom').eq(i).css({
            top: e.pageY,
            left: e.pageX
        }).show();

    });

    $('area').eq(i).bind('mouseout', function () {
        $('.data-custom').hide();
    });

});