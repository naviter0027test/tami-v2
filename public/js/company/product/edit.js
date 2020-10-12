$(document).ready(function() {
    var infoEditor;
    var infoEnEditor;
    ClassicEditor.create(document.querySelector( '#info'),{
        toolbar:['bold','italic','link', 
        'bulletedList', 
        'numberedList', 
        '|','outdent','indent']
    })
    .then(function(editor) {
        editor.setData($('[name=info]').val());
        infoEditor = editor;
    })
    .catch(function(error) {
        console.error(error);
    });

    ClassicEditor.create(document.querySelector( '#infoEn'),{
        toolbar:['bold','italic','link', 
        'bulletedList', 
        'numberedList', 
        '|','outdent','indent']
    })
    .then(function(editor) {
        editor.setData($('[name=infoEn]').val());
        infoEnEditor = editor;
    })
    .catch(function(error) {
        console.error(error);
    });

    $('.form1').submit(function() {
        $('[name=info]').val(infoEditor.getData());
        $('[name=infoEn]').val(infoEnEditor.getData());
    });

    $('.addEmail').on('click', function() {
        $(this).before('<input type="email" name="email[]" />');
        return false;
    });

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
