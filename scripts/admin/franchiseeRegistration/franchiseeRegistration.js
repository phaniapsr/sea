/**
 * Created by pc32261 on 8/6/2016.
 */
$(function(){
	$('#signup').click(function(){
		//alert("manu");
		var fr_id=document.forms["form2"]["franchiseetypeId"].value;
		if(fr_id=='')
		{
			alert("Please Select Franchisee in drop down list");
			document.forms["form2"]["franchiseetypeId"].focus();
			return false;
		}
		var fr_name=document.forms["form2"]["franchiseeName"].value;
		var regexp_name=/^[a-zA-Z]+$/;
		if(!regexp_name.test(fr_name))
		{
			alert("name should contain only alphabets");
			document.forms["form2"]["franchiseeName"].focus();
			return false;	
		}
		
		var fr_pass=document.forms["form2"]["password"].value;
		var regexp_pass=new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
		if(!regexp_pass.test(fr_pass))
		{
			alert("password should contain atleast one number one special character one capital letter");
			document.forms["form2"]["password"].focus();
			return false;

		}
	    var fr_fname=document.forms["form2"]["first_name"].value;
		if(!regexp_name.test(fr_fname))
		{
			alert("name should contain only alphabets");
			document.forms["form2"]["first_name"].focus();
			return false;
		}
		
		var fr_lname=document.forms["form2"]["last_name"].value;
		if(!regexp_name.test(fr_lname))
		{
			alert("name should contain only alphabets");
			document.forms["form2"]["last_name"].focus();
			return false;
		}
		
		var fr_dob=document.forms["form2"]["date_of_birth"].value;
		if(fr_dob=='01/01/0001')
		{
			alert("select date of birth from datepicker");
			document.forms["form2"]["date_of_birth"].focus();
			return false;
		}
		var fr_gen=document.forms["form2"]["gender"].value;
		if(fr_gen=='')
		{
			alert("please select gender from drop down");
			document.forms["form2"]["gender"].focus();
			return false;
		}
		var fr_mobno=document.forms["form2"]["MobileNumber"].value;
		var regexp_mobno=/^\d{10}$/;
		if(!regexp_mobno.test(fr_mobno))
		{
			alert("please enter mobno with 10 digits");
			document.forms["form2"]["MobileNumber"].focus();
			return false;
		}
		var fr_pob=document.forms["form2"]["PlaceOfBirth"].value;
		if(!regexp_name.test(fr_pob))
		{
			alert("place of birth should contain only alphabets");
			document.forms["form2"]["PlaceOfBirth"].focus();
			return false;
		}
		var fr_marital=document.forms["form2"]["MaritalStatus"].value;
		if(fr_marital=='')
		{
			alert("please choose correct one from drop down");
			document.forms["form2"]["MaritalStatus"].focus();
			return false;
		}
		var fr_course_apply=document.forms["form2"]["CourseApplied"].value;
		if(fr_course_apply=='')
		{
			alert("please select minimum one course");
			document.forms["form2"]["CourseApplied"].focus();
			return false;
		}
        var fr_university=document.forms["form2"]["University"].value;
		if(!regexp_name.test(fr_university))
		{
			alert("university name should contain only alphabets");
			document.forms["form2"]["University"].focus();
			return false;
		}	
        var fr_qulif=document.forms["form2"]["Qualicfation"].value;
		var fr_com_year=document.forms["form2"]["CompletedYear"].value;
		var regexp_year=/^\d{4}$/;
		if(!regexp_year.test(fr_com_year))
		{
			alert("year in the format 2016 only");
			document.forms["form2"]["CompletedYear"].focus();
			return false;
				
		}
		var fr_flatno=document.forms["form2"]["FlatNo"].value;
		var fr_streetname=document.forms["form2"]["StreetName"].value;
		var fr_area=document.forms["form2"]["Area"].value;
		var fr_city=document.forms["form2"]["City"].value;
		if(!regexp_name.test(fr_city))
		{
			alert("city name should contain only alphabets");
			document.forms["form2"]["City"].focus();
			return false;
		}
		var fr_pincode=document.forms["form2"]["PinCode"].value;
        var regexp_pincode=/^\d{6}$/;
        if(!regexp_pincode.test(fr_pincode))
		{
			alert("pincode should contain 6 digits only");
			document.forms["form2"]["PinCode"].focus();
			return false;
		}		
        var fr_state=document.forms["form2"]["State"].value;
        if(fr_state=='')
		{
		    alert("choose correct one from list");
            document.forms["form2"]["State"].focus();
            return false;			
		}	
        var fr_nation=document.forms["form2"]["Nationality"].value;
        if(fr_nation=='')
        {
			alert("choose correct one from list");
			document.forms["form2"]["Nationality"].focus();
			return false;	
		}	
        var fr_fee=document.forms["form2"]["FranchiseFee"].value;
		var regexp_fee=/^\d{0,10}$/;
		if(!regexp_fee.test(fr_fee)|fr_fee==0)
        {
			alert("please enter correct amount as fee");
			document.forms["form2"]["FranchiseFee"].focus();
			return false;
		}			
		
			//while submitting 
			//$('#franchiseeRegistration').submit();
		
		
	});
    $('#franchiseeRegistration').submit(function(e){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
            {
                url : formURL,
                type: "POST",
                data : postData,
                success:function(data, textStatus, jqXHR)
                {
                    if(data>0)
                        $('#message_from_server').text('Franchisee registered successfully');
                    else $('#message_from_server').text('Registration failed');
                    //alert('phani'+data);
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    //alert('An'+jqXHR);
                }
            });
        e.preventDefault();
        e.unbind();
        return false;
    })
})