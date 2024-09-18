function confirmSubmit(selectElement) {
    var form = selectElement.form
    var selectedOption = selectElement.options[selectElement.selectedIndex].text;
    var defaultValue = selectElement.getAttribute('data-default-value') ;

    if(comfirm(' Are you sure you want to change status " ' + selectedOption + '"')) {
        form.submit();
    }else {
        selectElement.value = defaultValue;
    }
}