'use strict';

// toggles the password visibility after the eye icon is clicked
document.querySelectorAll('button.toggle-password').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const btn = e.currentTarget;
        const pwd = btn.parentElement.querySelector('input.pwd-input');
        const new_type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
        pwd.setAttribute('type', new_type);

        btn.querySelector('span').classList.toggle('bi-eye');
        btn.querySelector('span').classList.toggle('bi-eye-slash');
    });
});

// sets the password input's type attribute back to "password" before submitting
document.querySelector('form.form-with-pwd').addEventListener('submit', (e) => {
    e.currentTarget.querySelectorAll('input.pwd-input').forEach((input) => {
        input.setAttribute('type', 'password');
    });
});