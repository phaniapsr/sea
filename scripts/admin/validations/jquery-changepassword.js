
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#changepassword').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
 			OldPassword: {
			row: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'Old Password is required'
                    }
                }
            },
			NewPassword: {
            row: '.col-lg-4',
				validators: {
					notEmpty: {
                        message: 'New Password is required'
                    }
				}
            },
				ConfirmPassword: {
			row: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'ConfirmPassword is required'
                    }
                }
            },
		
        }
    });
});
