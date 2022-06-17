$('#deleteCheckBox').on('click',function(){
    let deleteForm = $(this).parent().parent().parent();
    let checkBox = deleteForm.find('#deleteCheckBox').prop('checked');
    let deleteButton = deleteForm.find('.common-button');

    if(checkBox){
        onChecked(deleteButton);
    } else {
        offChecked(deleteButton);
    }

})


function onChecked(deleteButton){
    deleteButton.prop("disabled", false);
    deleteButton.css('opacity', 1);
    deleteButton.css('background-color', '#eb7e35');
    deleteButton.css('color', '#fafafa');
}


function offChecked(deleteButton){
    deleteButton.prop("disabled", true);
    deleteButton.css('opacity', 0.5);
    deleteButton.css('background-color', '#d5d5d5');
    deleteButton.css('color', 'black');
}
