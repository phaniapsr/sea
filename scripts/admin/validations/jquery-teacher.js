
$(document).ready(function () {
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
            FirstName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z,_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },

            MiddleName: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z,_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },


            LastName: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z,_\. ]+$/,
                        message: 'Numbers are not allowed'
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

            FranchiseeTypeId: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'FranchiseeTypeId is required'
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
            PhoneNumber: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[0-9-_\-. ]+$/,
                        message: 'Youshould Enter numbers only'
                    }
                }
            },

            LandlineNumber: {
                row: '.col-lg-6',
                validators: {
                    regexp: {
                        regexp: /^[0-9-_\-. ]+$/,
                        message: 'Youshould Enter numbers only'
                    }
                }
            },

            //DateOfBirth: {
            //    row: '.col-lg-6',
            //    validators: {
            //        notEmpty: {
            //            message: 'The date is required'
            //        },
            //        //date: {
            //        //    format: 'DD-MM-YYYY',
            //        //    message: 'The date is not a valid'
            //        //}
            //    }
            //},



            University: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'College/University  is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z,_\. ]+$/,
                        message: 'Numbers are not allowed'
                    }
                }
            },



            MobileNumber: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Mobile Number is required'
                    },


                    between: {
                        min: 1000000000,
                        max: 1000000000000000,
                        message: 'The MobileNumber should be 10 digits only'
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

            MaritalStatus: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Maritual Status is required'
                    },
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
                        message: 'Email address is required'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s])+.([^@com,co,.in])',
                        message: 'The value is not a valid email address'
                    }
                }
            },





            Qualicfation: {
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
                        message: 'Gender is required'
                    }
                }
            },
            CourseApplied: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Courseapplied is required'
                    }
                }
            },

            FranchiseFee: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'FranchiseFee is required'
                    },

                    regexp: {
                        regexp: /^[0-9-_\-. ]+$/,
                        message: 'Youshould Enter numbers only'
                    }
                }
            },
            FlatNo: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Flate/Door Number is required'
                    }


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

                    regexp: {
                        regexp: /^[0-9-_\-/.]+$/,
                        message: 'Charecters are not allowed'
                    }
                }
            },

            CompletedYear: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'CompletedYear is Required'
                    },

                    regexp: {
                        regexp: /^[0-9-_\-/.]+$/,
                        message: 'Charecters are not allowed'
                    }
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
            FranchiseeFee: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'FranchiseeFee is required'
                    },
                    regexp: {
                        regexp: /^[0-9-_\-/.]+$/,
                        message: 'Charecters are not allowed'
                    }


                }
            },

            SelectFranchisee: {
                row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Please Select Franchisee'
                    },


                }
            },
            FranchiseeImage: {
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
