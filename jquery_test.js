//When delete button is clicked run ajax_delete.php

$(document).ready(function(){
    $('.delete').click(function(){
    	if(confirm("This action will delete the member. Are you sure?")){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax_delete.php',
        data =  {'delete': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            window.location.reload();
        });
        }
        else {
        	preventDefault();
        }
    });

});

$(document).ready(function(){
    $('.delete_all').click(function(){
    	if(confirm("This action will delete all members. Are you sure?")){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax_delete.php',
        data =  {'delete_all': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            window.location.reload();
        });
    	}
        else {
        	preventDefault();
        }
    });

});