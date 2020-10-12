function companyAreaIdChange() {
    var companyAreaLen = $('.companyAreaId').length;
    var isAllHave = true;
    for(i = 0; i < companyAreaLen;++i) {
        console.log($($('.companyAreaId')[i]).val().trim());
        if($($('.companyAreaId')[i]).val().trim() == '')
            isAllHave = false;
    }
    if(isAllHave == true) {
        var companyAreaClone = $($('.companyAreaId')[0]).clone();
        $(companyAreaClone).removeAttr('required');
        $(companyAreaClone).val('');
        $(companyAreaClone).on('change', companyAreaIdChange);
        $('.companyAreaP').append(companyAreaClone);
    }
}
$(document).ready(function() {
    $('.infoMode').on('change', function() {
        var infoNum = $(this).attr('infoNum');
        var infoMode = $(this).val();
        if(infoMode == 1) {
            $("[name=infoPath"+infoNum+"]").show();
            $("[name=infoVideo"+infoNum+"]").hide();
        } else {
            $("[name=infoPath"+infoNum+"]").hide();
            $("[name=infoVideo"+infoNum+"]").show();
        }
    });

    $('.infoMode').trigger('change');

    $('.frontMode').on('change', function() {
        var frontMode = $(this).val();
        switch(frontMode) {
            case '1':
                $('.frontModePic').attr('src', '/images/black.jpg');
                break;
            case '2':
                $('.frontModePic').attr('src', '/images/blue.jpg');
                break;
            case '3':
                $('.frontModePic').attr('src', '/images/green.jpg');
                break;
            case '4':
                $('.frontModePic').attr('src', '/images/red.jpg');
                break;
            case '5':
                $('.frontModePic').attr('src', '/images/purple.jpg');
                break;
            case '6':
                $('.frontModePic').attr('src', '/images/yellow.jpg');
                break;
        }
    });

    $('.frontMode').trigger('change');

    $('.companyAreaId').on('change', companyAreaIdChange);

    $('.form1').submit(function() {
        for(var i = 0;i < $('input[type=file]').length;++i) {
            if(typeof($('input[type=file]')[i].files[0]) != 'undefined') {
                var tmpSize = $('input[type=file]')[i].files[0].size / 1024 / 1024;
                var filename = $('input[type=file]')[i].files[0].name;
                if(tmpSize > 5) {
                    alert(filename+ " 超過5M");
                    return false;
                }
            }
        }
    });
});
