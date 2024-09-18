const SCF_CLASSES = {
    FORM: 'scf_js-contact-form',
    MESSAGE: 'scf_c-contact-form__message',
    SUCCESS_MESSAGE: 'scf_c-contact-form__message--success',
    ERROR_MESSAGE: 'scf_c-contact-form__message--error'
};

const SCF_MESSAGES = {
    ERROR: 'There was an error sending your message. Please try again.'
};

document.addEventListener('DOMContentLoaded', initializeContactForms);

function initializeContactForms() {
    const forms = document.querySelectorAll(`.${SCF_CLASSES.FORM}`);
    forms.forEach(form => form.addEventListener('submit', handleFormSubmit));
}

async function handleFormSubmit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = createFormData(form);
    const result = await submitForm(formData);
    displayMessage(form, result);
}

function createFormData(form) {
    const formData = new FormData(form);
    formData.append('action', 'scf_submit_form');
    formData.append('nonce', scf_ajax.nonce);
    return formData;
}

async function submitForm(formData) {
    const response = await fetch(scf_ajax.ajax_url, {
        method: 'POST',
        body: formData
    });
    return await response.json();
}

function displayMessage(form, result) {
    const messageElement = createMessageElement(result);
    form.appendChild(messageElement);
    if (result.success) form.reset();
    setTimeout(() => messageElement.remove(), 5000);
}

function createMessageElement(result) {
    const messageElement = document.createElement('div');
    messageElement.classList.add(SCF_CLASSES.MESSAGE);
    messageElement.classList.add(result.success ? SCF_CLASSES.SUCCESS_MESSAGE : SCF_CLASSES.ERROR_MESSAGE);
    messageElement.textContent = result.success ? result.message : SCF_MESSAGES.ERROR;
    return messageElement;
};
