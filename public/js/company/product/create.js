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
});
