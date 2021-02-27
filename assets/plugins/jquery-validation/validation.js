$(document).ready(function() {
    $('#menuForm').validate({
        rules: {
            menu: {
                required: true
            },
            url: {
                required: true
            },
            icon: {
                required: true
            },
            "permissions[]": {
                required: true
            }
        },
        messages: {
            menu: {
                required: "* Please enter a menu name"
            },
            url: {
                required: "* Please enter a menu URL"
            },
            icon: {
                required: "* Please enter a menu icon"
            },
            "permissions[]": {
                required: "* Please select at least one permissions"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
    $.validator.addMethod("pwcheck", function(value) {
    return /^[A-Za-z0-9\d=!\-@#._*]*$/.test(value) // consists of only these
    && /[a-z]/.test(value) // has a lowercase letter
    && /[A-Z]/.test(value) // has a uppercase letter
    && /\d/.test(value) // has a digit
    });
});