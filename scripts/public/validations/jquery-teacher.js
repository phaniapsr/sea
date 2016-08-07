
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#form2').formValidation({
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
                        message: 'The first name is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			
			 
          
			 
			
			     Date: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Date is required'
                    }
                }
            },
			  
			     Nationality: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Nationality is required'
                    }
                }
            },
			    
			   
			   
		
			     CompletedYear: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Year is required'
                    }
                }
            },
			
			 University: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'College/University  is required'
                    }
                }
            },
			 PhoneNumber: {
                row: '.col-lg-6',
                validators: {
                    
					
                   
                }
            },
			 MobileNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mobile No is required'
                    },
					
                    integer: {
                        message: 'The value is not an integer'
						},
						 between: {
                            min: 1,
                            max: 100000000000,
                            message: 'The phonenumber should be 10 digits only'
                        }
                }
            },
			 PlaceOfBirth: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Place of Birth is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			
			 Mari: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Maritual Status is required'
                    }
                }
            },
			
			 Courseapplied: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Applied Course is required'
                    }
                }
            },
			  TypeOfCourse: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Course is required'
                    }
                }
            },
			  Address: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
			 
           
			
			  EmailId: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            UserName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
          
			
			
          
            Qualification: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Qualification is required'
                    }
                }
            },
			
			
			 Gender: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
			 CourseApplied: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'courseapplied is required'
                    }
                }
            },
			 Goal: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'goal is required'
                    }
                }
            },
			 Coursefee: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Coursefee is required'
                    }
					
                   
                }
            },
			 FlateNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Flate/Door.No is required'
                    }
					
                   
                }
            },
			 StreetName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Streetname.No is required'
                    }
					
                   
                }
            },
			 Area: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Area is required'
                    }
					
                   
                }
            },
			 City: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Town/City is required'
                    }
					
                   
                }
            },
			 Pincode: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Pincode is required'
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
        }
    });
});
