
CKEDITOR.replace('body', {
    toolbar: [
        { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        //{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        { name: 'styles', items: [ /*'Styles',*/ 'Format', /*'Font', 'FontSize'*/ ] },
        //{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'Maximize'/*, 'ShowBlocks'*/ ] },
        //{ name: 'about', items: [ 'About' ] }
    ]
});

//https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#basic



$("#show1").click(function(e){

    e.preventDefault();
    $("#2").fadeToggle(500);
    $("#3").fadeToggle(500);
    if($("#show1 img").attr('src')=='icons/expandmore.png'){
        $("#show1 img").attr('src', 'icons/expandless.png');
    }
    else if($("#show1 img").attr('src') == 'icons/expandless.png'){
        $("#show1 img").attr('src', 'icons/expandmore.png');
    }
    $("#hidden1").slideToggle(750);

});
$("#show").click(function(e){
    e.preventDefault();
    $("#1").fadeToggle(500);
    $("#3").fadeToggle(500);
    if($("#show img").attr('src')=='icons/expandmore.png'){
        $("#show img").attr('src', 'icons/expandless.png');
    }
    else if($("#show img").attr('src') == 'icons/expandless.png'){
        $("#show img").attr('src', 'icons/expandmore.png');
    }
    $("#hidden").slideToggle(750);

});
$("#show2").click(function(e){
    e.preventDefault();
    $("#1").fadeToggle(500);
    $("#2").fadeToggle(500);
    if($("#show2 img").attr('src')=='icons/expandmore.png'){
        $("#show2 img").attr('src', 'icons/expandless.png');
    }
    else if($("#show2 img").attr('src') == 'icons/expandless.png'){
        $("#show2 img").attr('src', 'icons/expandmore.png');
    }
    $("#hidden2").slideToggle(750);
});
