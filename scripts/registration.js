let status_username = false;
let status_password = false;
let status_password2 = false;
let status_email = false;
let status_firstname = false;
let status_lastname = false;
let status_birthdate = false;
let status_eula = false;

function check_username() {
    let input = $('#username')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('username-error-first-last-lowercase', /^[a-z].*[a-z]$/.test(value));
    valid &= set_error_message('username-error-two-underscores', !/__/.test(value));
    valid &= set_error_message('username-error-invalid-characters', !/[^a-z_]/.test(value));
    valid &= set_error_message('username-error-length', value.length >= 6);

    status_username = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_password() {
    let input = $('#password')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('password-error-lowercase', /[a-z]/.test(value));
    valid &= set_error_message('password-error-uppercase', /[A-Z]/.test(value));
    valid &= set_error_message('password-error-number', /[0-9]/.test(value));
    valid &= set_error_message('password-error-symbol', /[#?!@$%^&*-]/.test(value));
    valid &= set_error_message('password-error-length', value.length >= 8);

    status_password = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_password2() {
    let input = $('#password2')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('password2-error', value == $('#password').val());

    status_password2 = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_email() {
    let input = $('#email')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('email-error', /a/.test(value));

    status_email = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_firstname() {
    let input = $('#firstname')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('firstname-error-uppercase', /^[A-Z]/.test(value));
    valid &= set_error_message('firstname-error-invalid-characters', !/[^A-Za-z ]/.test(value));

    status_firstname = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_lastname() {
    let input = $('#lastname')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('lastname-error-uppercase', /^[A-Z]/.test(value));
    valid &= set_error_message('lastname-error-invalid-characters', !/[^A-Za-z ]/.test(value));

    status_lastname = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_birthdate() {
    let input = $('#birthdate')
    let value = input.val();
    
    let valid = true;
    valid &= set_error_message('birthdate-error-age', datediff_years(new Date(value), new Date()) >= 18);

    status_birthdate = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_eula() {
    let input = $('#eula')
    let value = input.is(':checked');
    
    let valid = true;
    valid &= set_error_message('eula-error', value);

    status_eula = valid;
    set_input_validity(input, valid);
    check_submit();

    return valid;
}

function check_submit() {
    let submit = $('#submit');

    if (status_username && status_password && status_password2 && status_email && status_firstname && status_lastname && status_birthdate && status_eula)
        submit.prop('disabled', false);
    else
        submit.prop('disabled', true);
}

function set_input_validity(input, valid) {
    if (valid) {
        input.removeClass('is-invalid');
        input.addClass('is-valid');
    } else {
        input.removeClass('is-valid');
        input.addClass('is-invalid');
    }
}

function set_error_message(message_id, valid) {
    let message = $(`#${message_id}`);

    if (valid)
        message.addClass('hidden');
    else
        message.removeClass('hidden');

    return valid;
}

function datediff_years(from, to) {
    let diff = to - from;
    let date = new Date(diff); // miliseconds from epoch
    return date.getUTCFullYear() - 1970;
}