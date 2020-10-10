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
});
