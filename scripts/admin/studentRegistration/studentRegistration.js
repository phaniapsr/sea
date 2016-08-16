/**
 * Created by pc32261 on 8/8/2016.
 */
  $(function(){
	$('#signup').click(function(){
		var regexp_name=/^[a-zA-Z]+$/;
		var stu_email=document.forms["form1"]["email"].value;
		var stu_pass=document.forms["form1"]["password"].value;
		var regexp_pass=new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
		if(!regexp_pass.test(stu_pass))
		{
			alert("password should contain atleast one number one special character one capital letter");
			document.forms["form1"]["password"].focus();
			return false;

		}
		var stu_fname=document.forms["form1"]["first_name"].value;
		if(!regexp_name.test(stu_fname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["first_name"].focus();
			return false;
		}
		var stu_lname=document.forms["form1"]["last_name"].value;
		if(!regexp_name.test(stu_lame))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["first_name"].focus();
			return false;
		}
		var stu_dob=document.forms["form1"]["date_of_birth"].value;
		if(stu_dob=='01/01/0001')
		{
			alert("select date of birth from datepicker");
			document.forms["form1"]["date_of_birth"].focus();
			return false;
		}
		var stu_gen=document.forms["form1"]["gender"].value;
		if(stu_gen=='')
		{
			alert("please select gender from drop down");
			document.forms["form1"]["gender"].focus();
			return false;
		}
		var stu_age=document.forms["form1"]["Age"].value;
		var regexp_age=/^\d{3}$/;
		if(!regexp_age.test(stu_age))
		{
			alert("age should be numeric value between 0 to 100");
			document.forms["form1"]["Age"].focus();
			return false;
			
		}
		var stu_mothtoung=document.forms["form1"]["MotherTounge"].value;
		if(!regexp_name.test(stu_mothtoung))
		{
			alert("mother tound should contain only alphabets");
			document.forms["form1"]["MotherTounge"].focus();
			return false;
		}
		var stu_fathname=document.forms["form1"]["FatherName"].value;
		if(!regexp_name.test(stu_fathname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["FatherName"].focus();
			return false;
		}
       var stu_fathmob=document.forms["form1"]["FatherMobileNumber"].value;
	   var regexp_fathmob=/^\d{10}$/;
	   if(!regexp_fathmob.test(stu_fathmob))
	   {
		   alert("mobileno contains exact 10 digits");
		   document.forms["form1"]["FatherMobileNumber"].focus();
		   return false;		   
	   }
	   
		var stu_mothname=document.forms["form1"]["MotherName"].value;
		if(!regexp_name.test(stu_mothname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["MotherName"].focus();
			return false;
		}
		var stu_mothmob=document.forms["form1"]["MotherMobileNumber"].value;
		var regexp_mob=/^\d{10}$/;
		if(!regexp_mob.test(stu_mothmob))
		{
	       alert("mobileno contains exact 10 digits");
		   document.forms["form1"]["MotherMobileNumber"].focus();
		   return false;		   
		}		
		var stu_parentemail=document.forms["form1"]["ParentEmailId"].value;
		var stu_fathoccu=document.forms["form1"]["FatherOccupation"].value;
		if(!regexp_name.test(stu_fathoccu))
		{
			alert("father occupation should be in letters only");
			document.forms["form1"]["FatherOccupation"].focus();
			return false;
		}
		var stu_mothoccu=document.forms["form1"]["MotherOccupation"].value;
		if(!regexp_name.test(stu_mothoccu))
		{
			alert("mother occupation should be in letters only");
			document.forms["form1"]["MotherOccupation"].focus();
			return false;
		}
		var stu_schoolname=document.forms["form1"]["SchoolName"].value;
	    regexp_schname=/^[a-zA-Z0-9]+$/;
		if(!regexp_schname.test(stu_schoolname))
		{
			alert("school name should not be contain special characters ");
			document.forms["form1"]["SchoolName"].focus();
			return false;
		}
		var stu_schooladd=document.forms["form1"]["SchoolAddress"].value;
		var stu_schoolmob=document.forms["form1"]["SchoolNumber"].value;
		var regexp_mob=/^\d{10}$/;
		if(!regexp_mob.test(sut_schoolmob))
		{
			alert("mobileno contains exact 10 digits");
		   document.forms["form1"]["SchoolNumber"].focus();
		   return false;
			
		}
		var stu_progid=document.forms["form1"]["ProgramId"].value;
		var stu_courseid=document.forms["form1"]["CourseId"].value;
		var stu_levelid=document.forms["form1"]["ProgramCourseLevelId"].value;
		var stu_flatno=document.forms["form1"]["FlatNo"].value;
		var stu_streetname=document.forms["form1"]["StreetName"].value;
		var stu_area=document.forms["form1"]["Area"].value;
		var stu_city=document.forms["form1"]["City"].value;
		if(!regexp_name.test(stu_city))
		{
			alert("city should contain only alphabets");
			document.forms["form1"]["City"].focus();
			return false;
		}
		var stu_pin=document.forms["form1"]["PinCode"].value;
		var regexp_pin=/^\d{6}$/;
		if(!regexp_pin.test(sut_pin))
		{
			alert("pin nummber should containe exact 6 digits");
			document.forms["form1"]["PinCode"].focus();
			return false;
		}
		var stu_state=document.forms["form1"]["State"].value;
		if(stu_state=='')
		{
			alert("plese select state from list");
			document.forms["form1"]["State"].focus;
			return false;
		}			
		
		return false;
	});
    $('#studentRegistration').submit(function(e){
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
            {
                url : formURL,
                type: "POST",
                data : postData,
                success:function(data, textStatus, jqXHR)
                {
                    //alert('phani'+data);
                    if(data>0)
                        $('#message_from_server').text('Student registered successfully');
                    else $('#message_from_server').text('Student registration failed');
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