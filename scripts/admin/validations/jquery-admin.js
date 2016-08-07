
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#Editprofile').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
 			FirstName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'First Name is required'
                    }
                }
            },
			LastName: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'Last Name is required'
                    }
				}
            },
				Gender: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    }
                }
            },
			Birthday: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'Birthday is required'
                    }
				}
            },
				Language: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Language is required'
                    }
                }
            },
			City: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'City is required'
                    }
				}
            },
				State: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'State is required'
                    }
                }
            },
			Country: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'Country is required'
                    }
				}
            },
				EmailAddress: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Email Address is required'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[com]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            },
			MobileNumber: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'Mobile Number is required'
                    }
				}
            },
				LandlineNumber: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Landline Number is required'
                    }
                }
            },
			OfficePhoneNumber: {
            row: '.col-lg-6',
				validators: {
					notEmpty: {
                        message: 'Office Phone Number is required'
                    }
				}
            },
				SkypeNumber: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Skype Number is required'
                    }
                }
				},
				UserImage: {
				    row: '.col-lg-6',
				    validators: {
				        notEmpty: {
				            message: 'Please Select Image'
				        },
				        file: {

				            type: 'image/jpeg,image/png',
				            maxSize: 2097152,   // 2048 * 1024
				            message: 'The selected file is not valid'
				        }
				    }
				},
        }
    });
});
