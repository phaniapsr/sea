
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#loginform').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok ',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			 username: {
                row: '.col-md-10',
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    }
                }
            },
			password: {
               row: '.col-md-10',
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                }
            },
			franchisee: {
               row: '.col-md-10',
                validators: {
                    notEmpty: {
                        message: 'You should select anyone from select list'
                    }
                }
            },
			    
        }
    });
});
