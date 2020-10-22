var nowProductNum = 0;
var maxProductNum = 0;
var infoPathCount = 0;
function col02ImgImgResize() {
    var col02Width = $('.col02 .img').css('width');
    console.log(col02Width);
    col02Width = parseInt(col02Width);
    var col02Height = $('.col02').css('height');
    col02Height = col02Width / 2 - 10;
    $('.col02 .img img').css('height', col02Height+ 'px');
}

$(document).ready(function() {
    maxProductNum = $('.maxProductNum').val();

    var pdfHref = $('.pdf'+nowProductNum).val();
    $('.btn_cate').attr('href', '/product'+pdfHref);
    var videoHref = $('.video'+nowProductNum).val().trim();
    $('.btn_video').attr('href', videoHref);

    switch($("meta[name=lan]").attr('content')) {
        case 'en':
            var href = location.protocol+ '//'+ location.host+ location.pathname+ "?lan=en";
            $('#locationHref').val(href);
            break;
        default:
            $('#locationHref').val(location.href);
    }
    $('#locationHref').css('position', 'absolute');
    $('#locationHref').css('left', '-99999px');
    $('.btn_share').on('click', function() {
        var copyText = document.getElementById("locationHref");
        copyText.select();
        document.execCommand("copy");
        alert('分享連結 複製成功');
        return false;
    });

    $('.owl-prev').on('click', function() {
        if(nowProductNum <= 0)
            nowProductNum = maxProductNum - 1;
        else 
            --nowProductNum;
        pdfHref = $('.pdf'+nowProductNum).val();
        videoHref = $('.video'+nowProductNum).val();
        if(pdfHref == '')
            $('.btn_cate').attr('href', '#');
        else
            $('.btn_cate').attr('href', '/product'+pdfHref);
        if(videoHref == '')
            $('.btn_video').attr('href', '#');
        else
            $('.btn_video').attr('href', videoHref);
        return false;
    });

    $('.owl-next').on('click', function() {
        if(nowProductNum + 1 >= maxProductNum)
            nowProductNum = 0;
        else 
            ++nowProductNum;
        pdfHref = $('.pdf'+nowProductNum).val();
        videoHref = $('.video'+nowProductNum).val();
        if(pdfHref == '' || typeof(pdfHref) == 'undefined')
            $('.btn_cate').attr('href', '#');
        else
            $('.btn_cate').attr('href', '/product'+pdfHref);
        if(videoHref == '')
            $('.btn_video').attr('href', '#');
        else
            $('.btn_video').attr('href', videoHref);
        return false;
    });

    $('.contact').submit(function() {
        var productId = $('.product'+nowProductNum).val();
        $('[name=productId]').val(productId);
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function(data) {
            var askSuccess = $('.askSuccess').val();
            var errMsg = $('.errMsg').val();
            var notifyAdm = $('.notifyAdm').val();
            if(data['result'] == true) {
                alert(askSuccess);
                location.href = "/";
            } else {
                alert(errMsg+ ':'+ data['msg'] +' '+ notifyAdm);
            }
        });
        return false;
    });

    var infoPathLen = $('.infoPath').length;
    //$('.logo img').css('width', '11vw');
    setInterval(function() {
        if(infoPathLen == 0)
            return;

        $('.infoPathImg').fadeOut(function() {
            $('.infoPathImg').attr('src', $($('.infoPath')[infoPathCount]).val());
            $('.infoPathImg').fadeIn();
        });
        
        ++infoPathCount;
        if(infoPathCount >= infoPathLen)
            infoPathCount = 0;
    }, 3000);

    col02ImgImgResize();
    $(window).resize(function () {
        col02ImgImgResize();
    });

    setTimeout(function() {
        console.log('test');
        $('.body_company').css('position', '');
    }, 2000);
});
