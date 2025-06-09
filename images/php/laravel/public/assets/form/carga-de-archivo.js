function validateFileForm(formElement, successCallback, errorCallback, newSolicitud = false) {
    let hasError = false;
    const fileInputs = formElement.querySelectorAll('input[type="file"]');
    for (let i = 0; i < fileInputs.length; i++) {
        const input = fileInputs[i];
        if (input.getAttribute('data-error') == '1') {
            hasError = true;
        }
        const fileCount = input.parentElement.parentElement.parentElement.querySelectorAll('.attached-file-carga-de-archivo-govco').length;
        const required = input.getAttribute('required') !== null;
        if (required && fileCount == 0) {
            const inputName = input.getAttribute('name');
            input.setAttribute('data-error', '1');
            const errorSpan = formElement.querySelector('#' + inputName + '_error');
            if(errorSpan.innerHTML === '') {
                errorSpan.innerHTML = 'El campo es obligatorio';
            }
            errorSpan.classList.remove('visually-hidden');
            errorSpan.parentElement.style.display = 'block';
            hasError = true;
        }
    }
    
    if (newSolicitud) {
        const textInputs = ['nombres','tipo_documento','identificacion','email'];
        for (let i = 0; i < textInputs.length; i++) {
            const inputName = textInputs[i];
            const input = formElement.querySelector('input[name="' + inputName + '"]');
            const errorSpan = formElement.querySelector('#' + inputName + '_error');
            if (input && input.getAttribute('required') !== null && input.value.trim() === '') {
                input.parentElement.parentElement.setAttribute('data-error', '1');
                if(errorSpan.innerHTML === '') {
                    errorSpan.innerHTML = 'El campo es obligatorio';
                }
                errorSpan.classList.remove('visually-hidden');
                errorSpan.parentElement.style.display = 'block';
                hasError = true;
            }
            else{
                input.parentElement.parentElement.setAttribute('data-error', '0');
                // errorSpan.classList.add('visually-hidden');
            }
        }
    }
    
    if (hasError) {
        errorCallback();
    } else {
        successCallback();
    }
}

function cloneFileForm(form) {
    const tempForm = document.createElement("form");
    tempForm.action = form.action;
    tempForm.method = form.method;
    tempForm.enctype = form.enctype;

    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
        if (input.type !== 'file') {
            const clonedInput = input.cloneNode(true);
            tempForm.appendChild(clonedInput);
        }
    });
    return tempForm;
}