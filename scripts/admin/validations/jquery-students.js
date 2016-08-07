
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
        DateOfBirth: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Date Of Birth is required'
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
			     Sibling1SchoolName: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
					
                }
            },
			
			 FirstName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'First Name is required'
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
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
					 
					
                }
            },
			 SchoolAddress: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'School Address is required'
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
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'Please enter valid Input'
                    }
                }
			     },

			     Sibling2Standard: {
			         row: '.col-lg-6',
			         validators: {
			             regexp: {
			                 regexp: /^[a-zA-Z0-9_\.]+$/,
			                 message: 'Please enter valid Input'
			             }
			         }
			     },

			     Sibling2SchoolName: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z_\-,/. ]+$/,
                        message: 'Numbers are not allowed'
                    }
					
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
                        regexp: /^[a-zA-Z_\-,/. ]+$/,
                        message: 'Numbers are not allowed'
                    }
					
                }
            },
			MotherQualicfation: {
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
			ResidentialAddress: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Residential Address is required'
                    }
                }
            },
			MotherTounge: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mother Tongue  is required'
                    },
					 regexp: {
                        regexp: /^[a-zA-Z_\. ,]+$/,
                        message: 'Numbers are not allowed'
                    }
					
                }
            },
			 PhoneNo: {
                row: '.col-lg-6',
                validators: {
                    
					
                   
						
                }
            },
			 FatherMobileNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Father Mobile Number is required'
                    },
					
                    integer: {
                        message: 'Value is not an integer'
						},
                         between: {
                        min: 1000000000,
                        max: 1000000000000000,
                        message: 'The MobileNumber should be 10 digits only'
                    }
                }
            },
			 MotherMobileNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mother Mobile Number is required'
                    },
					
                    integer: {
                        message: 'Value is not an integer'
						},
                         between: {
                        min: 1000000000,
                        max: 1000000000000000,
                        message: 'The MobileNumber should be 10 digits only'
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
			 SchoolPhoneNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'School Phone Number is required'
                    },
					
                     regexp: {
                        regexp: /^[0-9- ]+$/,
                        message: 'You should enter numbers only'
                    },
						 
                }
			 },
			 
			 SchoolNumber: {
        row: '.col-lg-6',
        validators: {
            regexp: {
                regexp: /^[0-9- ]+$/,
                message: 'You should enter numbers only'
            },
						 
            }
			     },
			 FatherQualicfation: {
                row: '.col-lg-6',
                validators: {
                   
                }
            },
			
			  FatherName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Father Name is required'
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
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
					
                }
            },
			  MotherName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mother Name is required'
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
                   
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
            LastName: {
               row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Last Name is required'
                    },
					
					 regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
            loginName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Login name is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Login name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'Login name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            password: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                }
            },
			
			Age: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Age is required'
                    },
                   
                   
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
                        message: 'Gender is required'
                    }
                }
            },
			 CourseName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Course Name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },
			 ProgrameName: {
			row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Program Name  is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
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
                        message: 'Value is not an integer'
						}
                }
            },
			 
			 ReceiptNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Phone Number is required'
                    },
					
                    integer: {
                        message: 'Value is not an integer'
						}
                }
            },
			 BatchNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Batch Number is required'
                    },
					
                    integer: {
                        message: 'Value is not an integer'
						}
                }
			 },

			 BatchDay: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Batch Day is required'
			         },
			     }
			 },

			 BatchTime: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Batch Time is required'
			         },
			     }
			 },

			 FranchiseeName: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Franchisee Name is required'
			         },
			         regexp: {
			             regexp: /^[a-zA-Z_\. ]+$/,
			             message: 'Numbers are not allowed'
			         }
			     }
			 },

			 KitFee: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Kitfee is required'
			         },
			         regexp: {
			             regexp: /^[0-9-_\-/.]+$/,
			             message: 'Charecters are not allowed'
			         }
			     }
			 },

			 Place: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Place is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                    
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
			  Level: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Level is required'
                    }
                }
            },
			  Day: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Day is required'
                    }
                }
            },
			  ICcode: {
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
                    regexp: {
                        regexp: /^[0-9-_\-/.]+$/,
                        message: 'Charecters are not allowed'
                    }
					
                   
                }
            },
			 FlatNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Flate/Door Number is required'
                    },
					
                   
                }
            },
			 StreetName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Street Name is required'
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
			 City: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'City is required'
                    },
					
                   
                }
			 },

			 CenterLocationCity: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Center Location/City is required'
			         },


			     }
			 },

			 PinCode: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Pincode is required'
                    },
                    regexp: {
                        regexp: /^[0-9-_\-/. ]+$/,

                        message: 'You should enter numbers only'
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
			 RegistrationFee: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Registration Fee required'
			         },
			         regexp: {
			             regexp: /^[0-9-_\-/.]+$/,
			             message: 'Charecters are not allowed'
			         }

			     }
			 },
			
			 EmailId: {
			     row: '.col-lg-6',
			     validators: {
			         regexp: {
			             regexp: '^[^@\\s]+@([^@\\s])+.([^@com,co,.in])',
			             message: 'The value is not a valid email address'
			         }
			     }
			 },

			 ParentEmailId: {
			     row: '.col-lg-6',
			     validators: {
			         notEmpty: {
			             message: 'Email address is required'
			         },
			         regexp: {
			             regexp: '^[^@\\s]+@([^@\\s])+.([^@com,co,.in])',
			             message: 'The value is not a valid email address'
			         }
			     }
			 },
            
			 LandlineNumber: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[0-9- ]+$/,

                        message: 'You should enter numbers only'
                    },
					
                   
                }
			 },
			 StudentImage: {
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
