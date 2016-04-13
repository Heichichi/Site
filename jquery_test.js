//When delete button is clicked run ajax_delete.php

$(document).ready(function(){
    $('.delete').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax_delete.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("Delete performed successfully");

        });
    });

});