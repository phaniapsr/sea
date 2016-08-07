
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#form3').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            studentcode: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Student Code is required'
                    },
					integer: {
                        message: 'The value is not an integer'
						}
                }
            },
			 
			 receiptno: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Phone.No is required'
                    },
					
                    integer: {
                        message: 'The value is not an integer'
						}
                }
            },
			 batchno: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Batch No is required'
                    },
					
                    integer: {
                        message: 'The value is not an integer'
						}
                }
            },
			 time: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Time is required'
                    }
                }
            },
			 place: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Place is required'
                    },
					
                    integer: {
                        message: 'The value is not an integer'
						}
                }
            },
			 date: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Date is required'
                    }
                }
            },
			
			  admissiondate: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Admission Date is required'
                    }
                }
            },
			  level: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'level is required'
                    }
                }
            },
			  day: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Day is required'
                    }
                }
            },
			  iccode: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'I.C.Code is required'
                    }
                }
            },
            
        }
    });
});
