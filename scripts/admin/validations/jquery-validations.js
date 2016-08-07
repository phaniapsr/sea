$(document).ready(function() {	
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#form7').formValidation({
        framework: 'bootstrap',
        /*err: {
            container: function ($field, validator) {
                // Look at the markup
                //  <div class="col-xs-4">
                //      <field>
                //  </div>
                //  <div class="col-xs-5 messageContainer"></div>
                return $field.parent().next('.messageContainer');
            }
        },*/
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
          
			photo: {
				row: '.col-lg-6',
                validators: {
                    notEmpty: {
                        message: 'Please Upload a document'
                    },
                    //stringLength:{
                        // 2048 * 1024
                        //message: 'File size should not be greater than 2 MB'
                    //extension: 'jpeg,png,jpg,pdf', 
                   // },
                    file: {
                        extension: 'jpeg,png,jpg,gif,pdf',
                        type: 'image/jpeg,image/png,image/jpg,image/gif,application/pdf',
                        //regexp: /[".jpg", ".jpeg",".png",".pdf",".mkv"]$/,
                        maxSize: 2097152,
                        message: 'File size should not be greater than 2 MB (or) File Type of JPG, JPEG, PNG, GIF, PDF'
                    }
                }
            },
			
			image: {
			    row: '.col-lg-8',
			    validators: {
			        notEmpty: {
			            message: 'Please Select and Crop the Image'
			        }
			    }
			},
			
        }
    });    
});

