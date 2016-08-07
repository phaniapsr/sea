
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#form1').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           
			   sibling2standard: {
                row: '.col-lg-6',
                validators: {
                    
                }
            },
			 
			
			 DateOfBirth: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Date of birth is required'
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
			     sibling1schoolname: {
                row: '.col-lg-6',
                validators: {
                  
					
                }
            },
			
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
			 MiddleName: {
                row: '.col-lg-6',
                validators: {
                    
					 
					
                }
            },
			 SchoolAddress: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The schooladdress is required'
                    },
					 
					
                }
            },
			
			     Sibling1Age: {
                row: '.col-lg-6',
                validators: {
                   
                }
            },
			     Sibling1Standard: {
                row: '.col-lg-6',
                validators: {
                   
                }
            },
			     Sibling2SchoolName: {
                row: '.col-lg-6',
                validators: {
                   
					
                }
            },
			     Sibling2Age: {
                row: '.col-lg-6',
                validators: {
                   
                }
            },
			FatherOccupation: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Father Occupation is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			MotherQualification: {
                row: '.col-lg-6',
                validators: {
                    
					
                }
            },
			MotherOccupation: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mother Occupation is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			residentialaddress: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Residential Address is required'
                    }
                }
            },
			 MotherTongue: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mother tongue  is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ,]+$/,
                        message: 'Numbers are not allowed'
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
                        message: 'Father Mobile No is required'
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
			 MobileNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'mother Mobile No is required'
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
			 SchoolName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'School Name is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			 SchoolPhoneNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'School Phone.No is required'
                    },
					
                     regexp: {
                        regexp: /^[0-9- ]+$/,
						
                        message: 'You should enter numbers only'
                    },
						 
                }
            },
			 FatherQualification: {
                row: '.col-lg-6',
                validators: {
                    
                }
            },
			
			  FatherName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The Fathername is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			  Sibling1Name: {
                row: '.col-lg-6',
                validators: {
                   
					
                }
            },
			  MotherName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The Mothername is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			  Sibling2Name: {
                row: '.col-lg-6',
                validators: {
                   
					
                }
            },
            LastName: {
               row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    },
					
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
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
         
			
			Age: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The age is required'
                    },
                   
                    integer: {
                        message: 'Age should be an integer'
						}
                }
            },
			
        
            Sibling2Gender: {
			row: '.col-lg-6',
                validators: {
                    
                }
            },
			 Sibling1Gender: {
			row: '.col-lg-6',
                validators: {
                   
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
			 CourseName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The coursename is required'
                    }
                }
            },
			 ProgramName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'The programname name is required'
                    }
                }
            },
			 DateOfBirth: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'DOB is required'
                    }
                }
            },
			 StudentCode: {
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
			 
			 ReceiptNo: {
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
			 BatchNo: {
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
			 Time: {
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
					
                    
                }
            },
			
			
			  AdmissionDate: {
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
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
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
			 CourseFee: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Coursefee is required'
                    },
					
                   
                }
            },
			 FlateNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Flate/Door.No is required'
                    },
					
                   
                }
            },
			 StreetName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Streetname.No is required'
                    },
					
                   
                }
            },
			 Area: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Area is required'
                    },
					
                   
                }
            },
			 Town: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Town/City is required'
                    },
					
                   
                }
            },
			 PinCode: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Pincode is required'
                    },
					
                   
                }
            },
			 State: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'State is required'
                    },
					
                   
                }
            },
			
			
         
        }
    });
});
