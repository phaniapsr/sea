$(function(){
	$('#signup').click(function(){
	var regexp_name=/^[a-zA-Z]+$/;
		var stu_email=document.forms["form1"]["email"].value;
		if(stu_email=='')
		{
			alert("Please Enter Email");
			document.forms["form1"]["email"].focus();
			return false;
		}
var stu_fname=document.forms["form1"]["first_name"].value;
		if(stu_fname=='')
		{
			alert("Please Enter First Name");
			document.forms["form1"]["first_name"].focus();
			return false;
		}
		if(!regexp_name.test(stu_fname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["first_name"].focus();
			return false;
		}
		var stu_lname=document.forms["form1"]["last_name"].value;
		if(stu_lname=='')
		{
			alert("Please Enter Last Name");
			document.forms["form1"]["last_name"].focus();
			return false;
		}
		if(!regexp_name.test(stu_lname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["last_name"].focus();
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
		if(stu_age=='')
		{
			alert("Please Enter Age");
			document.forms["form1"]["Age"].focus();
			return false;
		}
		if (isNaN(stu_age)||stu_age<1||stu_age>100)
		{
			alert("The age must be a number between 1 and 100");
			document.forms["form1"]["Age"].focus();
			return false;
		}
		var stu_mothtoung=document.forms["form1"]["MotherTounge"].value;
		if(stu_mothtoung=='')
		{
			alert("Please Enter Mohter Tounge");
			document.forms["form1"]["MotherTounge"].focus();
			return false;
		}
		if(!regexp_name.test(stu_mothtoung))
		{
			alert("mothertounge should contain only alphabets");
			document.forms["form1"]["MotherTounge"].focus();
			return false;
		}
		var stu_fathname=document.forms["form1"]["FatherName"].value;
		if(stu_fathname=='')
		{
			alert("Please Enter Father Name");
			document.forms["form1"]["FatherName"].focus();
			return false;
		}
		if(!regexp_name.test(stu_fathname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["FatherName"].focus();
			return false;
		}
		var stu_fathmob=document.forms["form1"]["FatherMobileNumber"].value;
		if(stu_fathmob=='')
		{
			alert("Please Enter Father MobileNo");
			document.forms["form1"]["FatherMobileNumber"].focus();
			return false;
		}
		var regexp_fathmob=/^\d{10}$/;
		if(!regexp_fathmob.test(stu_fathmob))
		{
			alert("mobileno contains exact 10 digits");
			document.forms["form1"]["FatherMobileNumber"].focus();
			return false;
		}

		var stu_mothname=document.forms["form1"]["MotherName"].value;
		if(stu_mothname=='')
		{
			alert("Please Enter Mohter Name");
			document.forms["form1"]["MotherName"].focus();
			return false;
		}
		if(!regexp_name.test(stu_mothname))
		{
			alert("name should contain only alphabets");
			document.forms["form1"]["MotherName"].focus();
			return false;
		}
		var stu_mothmob=document.forms["form1"]["MotherMobileNumber"].value;
		if(stu_mothmob=='')
		{
			alert("Please Enter Mother MobileNo");
			document.forms["form1"]["MotherMobileNumber"].focus();
			return false;
		}
		var regexp_mob=/^\d{10}$/;
		if(!regexp_mob.test(stu_mothmob))
		{
			alert("mobileno contains exact 10 digits");
			document.forms["form1"]["MotherMobileNumber"].focus();
			return false;
		}
		var stu_parentemail=document.forms["form1"]["ParentEmailId"].value;
		if(stu_parentemail=='')
		{
			alert("Please Enter Mail Id");
			document.forms["form1"]["ParentEmailId"].focus();
			return false;
		}
		var stu_fathoccu=document.forms["form1"]["FatherOccupation"].value;
		if(stu_fathoccu=='')
		{
			alert("Please Enter Father Occupation");
			document.forms["form1"]["FatherOccupation"].focus();
			return false;
		}
		if(!regexp_name.test(stu_fathoccu))
		{
			alert("father occupation should be in letters only");
			document.forms["form1"]["FatherOccupation"].focus();
			return false;
		}
		var stu_mothoccu=document.forms["form1"]["MotherOccupation"].value;
		if(stu_mothoccu=='')
		{
			alert("Please Enter Mohter Occupation");
			document.forms["form1"]["MotherOccupation"].focus();
			return false;
		}
		if(!regexp_name.test(stu_mothoccu))
		{
			alert("mother occupation should be in letters only");
			document.forms["form1"]["MotherOccupation"].focus();
			return false;
		}
		var stu_schoolname=document.forms["form1"]["SchoolName"].value;
		if(stu_schoolname=='')
		{
			alert("Please Enter SchoolName");
			document.forms["form1"]["SchoolName"].focus();
			return false;
		}
		regexp_schname=/^[a-zA-Z0-9]+$/;
		if(!regexp_schname.test(stu_schoolname))
		{
			alert("school name should not be contain special characters ");
			document.forms["form1"]["SchoolName"].focus();
			return false;
		}
		var stu_schooladd=document.forms["form1"]["SchoolAddress"].value;
		if(stu_schooladd=='')
		{
			alert("Please Enter School Address");
			document.forms["form1"]["SchoolAddress"].focus();
			return false;

		}
		var stu_schoolmob=document.forms["form1"]["SchoolNumber"].value;
		if(stu_schoolmob==0)
		{
			alert("Please Enter School MobileNo");
			document.forms["form1"]["SchoolNumber"].focus();
			return false;
		}
		var regexp_mob=/^\d{10}$/;
		if(!regexp_mob.test(stu_schoolmob))
		{
			alert("mobileno contains exact 10 digits");
			document.forms["form1"]["SchoolNumber"].focus();
			return false;

		}

		var stu_progid=document.forms["form1"]["ProgramId"].value;
		var stu_courseid=document.forms["form1"]["CourseId"].value;
		var stu_levelid=document.forms["form1"]["ProgramCourseLevelId"].value;
		if(stu_progid=='')
		{
			alert("please select Program from drop down");
			document.forms["form1"]["ProgramId"].focus();
			return false;
		}
		if(stu_progid=='ACMAS')
		{
			if(stu_courseid=='')
			{
				alert("please select Course from drop down");
				document.forms["form1"]["CourseId"].focus();
				return false;
			}
			
		}
		if(stu_progid=='ACMAS')
		{
		if(stu_levelid=='')
			{
				alert("please select Level from drop down");
				document.forms["form1"]["ProgramCourseLevelId"].focus();
				return false;
			}
		}
		if(stu_progid=='IAA')
		{
			if(stu_courseid=='')
			{
				alert("please select Course from drop down");
				document.forms["form1"]["CourseId"].focus();
				return false;
			}
		}
		
		if(stu_progid=='IAA')
		{
		if(stu_levelid=='')
			{
				alert("please select Level from drop down");
				document.forms["form1"]["ProgramCourseLevelId"].focus();
				return false;
			}	
		}
		if(stu_progid=='FUNMATHS')
		{
			if(stu_levelid=='')
			{
				alert("please select Level from drop down");
				document.forms["form1"]["ProgramCourseLevelId"].focus();
				return false;
			}	
		}
		var stu_flatno=document.forms["form1"]["FlatNo"].value;
		if(stu_flatno=='')
		{
			alert("Please Enter FlatNo");
			document.forms["form1"]["FlatNo"].focus();
			return false;
		}
		var stu_streetname=document.forms["form1"]["StreetName"].value;
		if(stu_streetname=='')
		{
			alert("Please Enter StreetName");
			document.forms["form1"]["StreetName"].focus();
			return false;
		}
		var stu_area=document.forms["form1"]["Area"].value;
		if(stu_area=='')
		{
			alert("Please Enter Area");
			document.forms["form1"]["Area"].focus();
			return false;
		}
		var stu_city=document.forms["form1"]["City"].value;
		if(stu_city=='')
		{
			alert("Please Enter CityName");
			document.forms["form1"]["City"].focus();
			return false;
		}
		if(!regexp_name.test(stu_city))
		{
			alert("city should contain only alphabets");
			document.forms["form1"]["City"].focus();
			return false;
		}
		var stu_pin=document.forms["form1"]["PinCode"].value;
		if(stu_pin=='')
		{
			alert("Please Enter Pincode");
			document.forms["form1"]["PinCode"].focus();
			return false;
		}
		var regexp_pin=/^\d{6}$/;
		if(!regexp_pin.test(stu_pin))
		{
			alert("pin nummber should containe exact 6 digits");
			document.forms["form1"]["PinCode"].focus();
			return false;
		}
		var stu_state=document.forms["form1"]["State"].value;
		if(stu_state=='')
		{
			alert("plese select state from list");
			document.forms["form1"]["State"].focus();
			return false;
		}
        alert("updated successfully");
        return true;		
});
});