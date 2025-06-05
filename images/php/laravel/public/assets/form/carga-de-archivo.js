function validateFileForm(formElement, successCallback, errorCallback) {
    const fileInputs = formElement.querySelectorAll('input[type="file"]');
    let hasError = false;
    for (let i = 0; i < fileInputs.length; i++) {
        const input = fileInputs[i];
        if (input.getAttribute('data-error') == '1') {
            hasError = true;
        }
        const fileCount = input.parentElement.parentElement.parentElement.querySelectorAll('.attached-file-carga-de-archivo-govco').length;
        if (input.getAttribute('required') && fileCount == 0) {
            const inputName = input.getAttribute('name');
            input.setAttribute('data-error', '1');
            const errorSpan = formElement.querySelector('#' + inputName + '_error');
            errorSpan.innerHTML = 'El campo es obligatorio';
            errorSpan.classList.remove('visually-hidden');
            errorSpan.parentElement.style.display = 'block';
            hasError = true;
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
    // var token = document.createElement("input");
    // token.type = "hidden";
    // token.name = "_token";
    // token.value = form.querySelector('input[name="_token"]').value;
    // tempForm.appendChild(token);
    return tempForm;
}