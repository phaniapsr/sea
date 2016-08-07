
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#main-contact-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            FirstName: {
                
                validators: {
                    notEmpty: {
                        message: 'First Name is required'
                    }
					
                }
            },
			
		
			
            LastName: {
               
                validators: {
                    notEmpty: {
                        message: 'Last Name is required'
                    }
                }
            },
			  
            
            MobileNumber: {
            validators: {
              notEmpty: {
                  message: 'MobileNumbe is required'
              },
              regexp: {
                  message: 'The phone number can only contain the digits',
                  regexp: /^[0-9\s\-()+\.]+$/
              }
                    }
            },
            EmailId: {

                validators: {
                    notEmpty: {
                        message: 'EmailId is required'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
                   
                }
            },
            Address: {

                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            IamLooking: {

                validators: {
                    notEmpty: {
                        message: 'You should franchisee'
                    }
                }
            },
		
		
        }
    });
});
