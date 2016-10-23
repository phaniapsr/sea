$(window).load(function () {
	$(document).ready(function () {
		$('.number,#direct_smf_share,#direct_dmf_share,#direct_umf_share,#indirect_dmf_share,#indirect_umf_share,#student_commission').blur(function(){
            if (parseFloat($(this).val()) > 0 ) {

            } else {
                $(this).val('');
            }
            return false;
        });
		

        $('#revenue_button_save').click(function(){
            var data = {
                UserId: $("#RevConfigUserId").val(),
                Id: $("#RevConfigId").val(),
                direct_smf_share: $("#direct_smf_share").val(),
                direct_dmf_share: $("#direct_dmf_share").val(),
                direct_umf_share: $("#direct_umf_share").val(),
                indirect_dmf_share: $("#indirect_dmf_share").val(),
                indirect_umf_share: $("#indirect_umf_share").val(),
                student_commission: $("#student_commission").val(),
                units: $("#units_id").val()
            };

            $.ajax({
                url: $('#RevenueConfigurationForm').attr('action'),
                type: "POST",
                data: data,
                success: function () {
                    alert("Successfully Submited......!!");
                    $("#SMFFranchiseeLicenseFee").val('');
                    $("#SMFFranchiseeKitFee").val('');
                },
                error: function () {
                }
            });
        });
        $('#student_revenue_button_save').click(function(){
            $('#RevenueConfigurationForm').submit();
        });
        $('#RevenueConfigurationForm').submit(function(e){

            e.preventDefault();
            var data=$(this).serializeArray();
            $.ajax({
                url: $('#RevenueConfigurationForm').attr('action'),
                type: "POST",
                data: data,
                success: function () {
                    alert("Successfully Submited......!!");
                },
                error: function () {

                }
            });
            e.preventDefault();
            return false;
        });

        $(".f-rev-split").click(function(){
            //$('#license_amt_paid')
            $.ajax({
                url:$('#RevenueConfigurationForm').attr('action').split('RevenueManagement/')[0]+'RevenueManagement/getStudentRevenueTypes',
                dataType:'json',
                method:'GET',
                data:{},
                success:function(data){},
                error:function(){}
            })
        })
       
        $(".f-rev-config").click(function() {
			var userId = $(this).attr('userid');
		    $("#RevConfigUserId").val($(this).attr('userid'));
            $("#RevConfigId").val($(this).attr('rowid'));
            $("#SMFPaidFranchiseeFee").val($(this).attr('fee'));
            $.ajax({
					    
                             type:'post',
                             url:'/sea/RevenueManagement/checkRevenueConfig',
                             data:{user_id:userId},
							 success:function(res){
								var obj=JSON.parse(res);
								$.each(obj,function(k,v){
									$('#direct_smf_share').val(v.direct_state_amount);
									$('#direct_dmf_share').val(v.direct_district_amount);
									$('#direct_umf_share').val(v.direct_unit_amount);
									$('#indirect_dmf_share').val(v.indirect_dmf_amount);
									$('#indirect_umf_share').val(v.indirect_uf_amount);
									
								});
								
							 }
							 
                             
            });
			$.ajax({
                url:$('#RevenueConfigurationForm').attr('action').split('RevenueManagement/')[0]+'RevenueManagement/getStudentRevenueTypes',
                dataType:'json',
                method:'GET',
                success:function(data){
                    $.each(data.student_revenue_type,function(data_key,data_val){
                        var cloned =$('#tbl_student_revenue_types_1').clone(true).insertAfter('#RevenueConfigurationForm > table:last');
                        cloned.attr('id',cloned.attr('id').replace(/\d+/, data_val.ssrt_id));
                        cloned.find('span,input').each(function(){
                            $(this).attr('id',$(this).attr("id").replace(/\d+/, data_val.ssrt_id))
                        });
                        $('#student_revenue_type_'+data_val.ssrt_id).text(data_val.ssrt_revenue_type);
                        $('#hid_student_revenue_type_'+data_val.ssrt_id).val(data_val.ssrt_id)
                    });
                    $('#tbl_student_revenue_types_1').each(function () {
                        $('[id="' + this.id + '"]:gt(0)').remove();
                    })
                },
                error:function(){
                    alert('Some thing went wrong in collecting the student revenue type data')
                }
            });

        });

        $('#DMFFranchiseeKitFee').keyup(function () {
			if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#DMFPaidFranchiseeFee').val())) {
                $('#DMFFranchiseeLicenseFee').val(parseFloat($('#DMFPaidFranchiseeFee').val()) - parseFloat($('#DMFFranchiseeKitFee').val()));
            } else {
                $('#DMFFranchiseeKitFee').val(0);
                $('#DMFFranchiseeLicenseFee').val(parseFloat($('#DMFPaidFranchiseeFee').val()));
            }
            return false;
        });
        $('#DMFFranchiseeLicenseFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#DMFPaidFranchiseeFee').val())) {
                $('#DMFFranchiseeKitFee').val(parseFloat($('#DMFPaidFranchiseeFee').val()) - parseFloat($('#DMFFranchiseeLicenseFee').val()));
            } else {
                $('#DMFFranchiseeLicenseFee').val(0);
                $('#DMFFranchiseeKitFee').val(parseFloat($('#DMFPaidFranchiseeFee').val()));
            }
            return false;
        });
       

        $('#UFKitFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) < parseFloat($('#UFPaidFranchiseeFee').val())) {
                $('#UFLicenseFee').val(parseFloat($('#UFPaidFranchiseeFee').val()) - parseFloat($('#UFKitFee').val()));
            } else {
                $('#UFKitFee').val(0);
                $('#UFLicenseFee').val(parseFloat($('#UFPaidFranchiseeFee').val()));
            }
            return false;
        });
        $('#UFLicenseFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#UFPaidFranchiseeFee').val())) {
                $('#UFKitFee').val(parseFloat($('#UFPaidFranchiseeFee').val()) - parseFloat($('#UFLicenseFee').val()));
            } else {
                $('#UFLicenseFee').val(0);
                $('#UFKitFee').val(parseFloat($('#UFPaidFranchiseeFee').val()));
            }
            return false;
        });

        $('#SMFKitFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#SMFFranchiseeFee').val())) {
                $('#SMFKitFee').val(parseFloat($('#SMFFranchiseeFee').val()) - parseFloat($('#SMFLisenceFee').val()));
            } else {
                $('#SMFLisenceFee').val(0);
                $('#SMFKitFee').val(parseFloat($('#SMFFranchiseeFee').val()));
            }
            return false;
        });

        $('#DMFCompanyShare').keyup(function () {
            $('#DMFCompanyPercentage').val(parseFloat($('#DMFCompanyShare').val()) * 100 / parseFloat($('#DMFFranchiseeLicenseFee').val()));
            return false;
        });
        $('#DMFSMFShare').keyup(function () {
            $('#DMFSMFPercentage').val(parseFloat($('#DMFSMFShare').val()) * 100 / parseFloat($('#DMFFranchiseeLicenseFee').val()));
            return false;
        });
        $('#UFCompanyShare').keyup(function () {
            $('#UFCompanyPercentage').val(parseFloat($('#UFCompanyShare').val()) * 100 / parseFloat($('#UFLicenseFee').val()));
            return false;
        });
        $('#UFSMFShare').keyup(function () {
            $('#UFSMFPercentage').val(parseFloat($('#UFSMFShare').val()) * 100 / parseFloat($('#UFLicenseFee').val()));
            return false;
        });
        $('#UFDMFShare').keyup(function () {
            $('#UFDMFPercentage').val(parseFloat($('#UFDMFShare').val()) * 100 / parseFloat($('#UFLicenseFee').val()));
            return false;
        });
        $('#StudentCompanyShare').keyup(function () {
          //  var sharableFee = parseFloat($('#StudentRegistrationFee').val()) - (parseFloat($('#StudentLevelFee').val()) + parseFloat($('#StudentKitFee').val()));
            $('#StudentCompanyPercentage').val(parseFloat($('#StudentCompanyShare').val()) * 100 / parseFloat($('#StudentLevelFee').val()));
            return false;
        });
        $('#StudentSMFShare').keyup(function () {
         //   var sharableFee = parseFloat($('#StudentRegistrationFee').val()) - (parseFloat($('#StudentLevelFee').val()) + parseFloat($('#StudentKitFee').val()));
            $('#StudentSMFPercentage').val(parseFloat($('#StudentSMFShare').val()) * 100 / parseFloat($('#StudentLevelFee').val()));
            return false;
        });
        $('#StudentDMFShare').keyup(function () {
         //   var sharableFee = parseFloat($('#StudentRegistrationFee').val()) - (parseFloat($('#StudentLevelFee').val()) + parseFloat($('#StudentKitFee').val()));
            $('#StudentDMFPercentage').val(parseFloat($('#StudentDMFShare').val()) * 100 / parseFloat($('#StudentLevelFee').val()));
            return false;
        });
        $('#StudentUFShare').keyup(function () {
          //  var sharableFee = parseFloat($('#StudentRegistrationFee').val()) - (parseFloat($('#StudentLevelFee').val()) + parseFloat($('#StudentKitFee').val()));
            $('#StudentUFPercentage').val(parseFloat($('#StudentUFShare').val()) * 100 / parseFloat($('#StudentLevelFee').val()));
            return false;
        });
        //
        $('#StudentLevelFee').keyup(function () {
            //var vStudentKitFee = parseFloat($('#StudentRegistrationFee').val()) - (parseFloat($('#StudentLevelFee').val()));
            //if (vStudentKitFee > parseFloat($('#StudentRegistrationFee').val())) {
            //    vStudentKitFee = parseFloat($('#StudentRegistrationFee').val());
            //}
            //if (vStudentKitFee < 0) {
            //    vStudentKitFee = 0;
            //}
            //if (parseFloat(vStudentKitFee) > 0) {
            //    $('#StudentKitFee').val(parseFloat(vStudentKitFee));
            //}            
            return false;
        });
    });
});
function ValidateShares() {
    var DMFCompanyPercentage = parseFloat($("#DMFCompanyPercentage").val()) || 0;
    var DMFSMFPercentage = parseFloat($("#DMFSMFPercentage").val()) || 0;
    var UFCompanyPercentage = parseFloat($("#UFCompanyPercentage").val()) || 0;
    var UFSMFPercentage = parseFloat($("#UFSMFPercentage").val()) || 0;
    var UFDMFPercentage = parseFloat($("#UFDMFPercentage").val()) || 0;
    var StudentCompanyPercentage = parseFloat($("#StudentCompanyPercentage").val()) || 0;
    var StudentSMFPercentage = parseFloat($("#StudentSMFPercentage").val()) || 0;
    var StudentDMFPercentage = parseFloat($("#StudentDMFPercentage").val()) || 0;
    var StudentUFPercentage = parseFloat($("#StudentUFPercentage").val()) || 0;
    var total = DMFCompanyPercentage + DMFSMFPercentage + UFCompanyPercentage
                + UFSMFPercentage + UFDMFPercentage + StudentCompanyPercentage + StudentSMFPercentage +
                StudentDMFPercentage + StudentUFPercentage;
    if (total == 100) {
        if (StudentCompanyPercentage != 0) {
            $("studentrev-config-msg").text("");
             return true;
        } else {
            $("#rev-config-msg").text("");
            return true;
        }
    } else {
        if (StudentCompanyPercentage != 0) {

            $("#studentrev-config-msg").text("Invalid share distribution.");
            return false;
        }
        else {
            $("#rev-config-msg").text("Invalid share distribution.");
            return false;
        }
    }
}

