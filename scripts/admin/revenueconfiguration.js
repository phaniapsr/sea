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
        var rev_config={};
        $(".f-rev-split").click(function(){
            $.ajax({
                url:$('#RevenueConfigurationForm').attr('action').split('RevenueManagement/')[0]+'RevenueManagement/getRevenueConfigurations',
                dataType:'json',
                method:'POST',
                data:{userId:$(this).attr('userid')},
                success:function(revenueSplit){
                    $('#kit_fee_identified').val('');
                    rev_config=revenueSplit
                    $('#license_amt_paid').text(revenueSplit.revenue_configurations[0].lf_amount);
                    $('#tax_amt_paid').text(revenueSplit.revenue_configurations[0].tax_amount);
                    if(revenueSplit.revenue_configurations[0].kf_amount>0) {
                        $('#kit_fee_identified').prop('readonly', true).val(revenueSplit.revenue_configurations[0].kf_amount),
                        $('#splitting_amount').text(revenueSplit.revenue_configurations[0].lf_amount-revenueSplit.revenue_configurations[0].kf_amount);
                        $('#license_district_amount').val(revenueSplit.revenue_configurations[0].lf_dmf_amount),
                        $('#license_company_amount').val(revenueSplit.revenue_configurations[0].lf_company_amount),
                        $('#license_state_amount').val(revenueSplit.revenue_configurations[0].lf_smf_amount),
                        $('#license_consultant_amount').val(revenueSplit.revenue_configurations[0].lf_consultant_amount)
                    }
                    $.each(revenueSplit.revenue_configurations,function(rev_key,rev_obj){
                        //For SMF
                        if(rev_obj.role_id==2){
                            if(rev_obj.smf_id==rev_obj.created_by){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#state_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.direct_unit_amount+unit);
                            }
                            else if(rev_obj.smf_id!=null){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#state_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.indirect_uf_amount+unit);
                            }
                        }
                        //For DMF
                        if(rev_obj.role_id==3){
                            if(rev_obj.dmf_id==rev_obj.created_by){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#district_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.direct_unit_amount+unit);
                            }
                            else if(rev_obj.dmf_id!=null){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#district_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.indirect_uf_amount+unit);
                            }
                        }
                        //For Consultant
                        if(rev_obj.role_id==5){
                            if(rev_obj.consultant_id==rev_obj.created_by){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#consultant_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.direct_unit_amount+unit);
                            }
                            else if(rev_obj.consultant_id!=null){
                                var unit= rev_obj.units==1?'%':'Rs';
                                $('#consultant_share_value').text(' '+rev_obj.franch_name+' - '+rev_obj.indirect_uf_amount+unit);
                            }
                        }
                    })
                },
                error:function(){
                    alert('There is server not properly responded');
                }
            })
        })
        $('#kit_fee_identified').change(function(){
            if($(this).val()>0){
                var split_amt=parseFloat(rev_config.revenue_configurations[0].lf_amount-$(this).val());
                $('#splitting_amount').text(split_amt);
                $.each(rev_config.revenue_configurations,function(rev_key,rev_obj){
                    //For SMF
                    if(rev_obj.role_id==2){
                        if(rev_obj.smf_id==rev_obj.created_by){
                            $('#license_state_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.direct_unit_amount):(split_amt-rev_obj.direct_unit_amount));
                        }
                        else if(rev_obj.smf_id!=null){
                            $('#license_state_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.indirect_uf_amount):(split_amt-rev_obj.indirect_uf_amount));
                        }
                    }
                    //For DMF
                    if(rev_obj.role_id==3){
                        if(rev_obj.dmf_id==rev_obj.created_by){
                            $('#license_district_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.direct_unit_amount):(split_amt-rev_obj.direct_unit_amount));
                        }
                        else if(rev_obj.dmf_id!=null){
                            $('#license_district_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.indirect_uf_amount):(split_amt-rev_obj.indirect_uf_amount));
                        }
                    }
                    //For Consultant
                    if(rev_obj.role_id==5){
                        if(rev_obj.consultant_id==rev_obj.created_by){
                            $('#license_consultant_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.direct_unit_amount):(split_amt-rev_obj.direct_unit_amount));
                        }
                        else if(rev_obj.consultant_id!=null){
                            $('#license_consultant_amount').val(rev_obj.units==1?((split_amt/100)*rev_obj.indirect_uf_amount):(split_amt-rev_obj.indirect_uf_amount));
                        }
                    }

                })
                $('#license_company_amount').val(split_amt-(parseFloat($('#license_consultant_amount').val())+parseFloat($('#license_district_amount').val())+parseFloat($('#license_state_amount').val())))
            }
        })
        $('#revenue_split_button_save').click(function(){
            $.ajax({
                url: $('#SplitRevenueConfigurationForm').attr('action'),
                type: "POST",
                dataType:'json',
                data: {
                    revenue_config_id:rev_config.revenue_configurations[0].revenue_id,
                    kit_amount:$('#kit_fee_identified').val(),
                    company_amount:$('#license_company_amount').val(),
                    district_amount:$('#license_district_amount').val(),
                    state_amount:$('#license_state_amount').val(),
                    consultant_amount:$('#license_consultant_amount').val()
                },
                success: function () {
                    alert("Successfully Submitted......!!");
                    $('#kit_fee_identified').prop('readonly', true);
                    //$('#kit_fee_identified').attr('readonly','readonly');
                },
                error: function () {
                    alert('There is some error in data saving please try again');
                }
            })
        })
        $(".f-rev-config").click(function(e) {
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
					//alert(data.student_revenue_type);
					$('#RevenueConfigurationForm').siblings().remove().not(':first');
					$.each(data.student_revenue_type,function(data_key,data_val){
					    var cloned =$('#tbl_student_revenue_types_1').clone(true).insertAfter('#RevenueConfigurationForm > table:last');
                        cloned.attr('id',cloned.attr('id').replace(/\d+/, data_val.ssrt_id));
                        cloned.find('span,input').each(function(){
                            $(this).attr('id',$(this).attr("id").replace(/\d+/, data_val.ssrt_id))
                        });
						$('#student_revenue_type_'+data_val.ssrt_id).text(data_val.ssrt_revenue_type);
                        $('#hid_student_revenue_type_'+data_val.ssrt_id).val(data_val.ssrt_id)
                    });
					for(var j=0;j<=13;j++)
					{
						$('#tbl_student_revenue_types_'+j).each(function () {
					    $('[id="' + this.id + '"]:gt(0)').remove();
                       })
					}
				   $.ajax({
				type:'post',
				url:'/sea/RevenueManagement/unitRevenueConfig',
				data:{user_id:userId},
				success:function(res){
					var obj=JSON.parse(res);
					var i=1;
					$.each(obj,function(k,v){
						$('#consultant_share_'+i).val(v.consultant_share);
						$('#state_share_'+i).val(v.state_share);
						$('#district_share_'+i).val(v.district_share);
						$('#unit_share_'+i).val(v.unit_share);
						i++;
						
					});
					
				}	   
			  
			});
                },
                error:function(){
                    alert('Some thing went wrong in collecting the student revenue type data')
                }
            });
			
			
			
			/*$.ajax({
				type:'post',
				url:'/sea/RevenueManagement/unitRevenueConfig',
				data:{user_id:userId},
				async:false,
				success:function(res){
					var obj=JSON.parse(res);
					var i=1;
					//alert("CLICK OK TO PROCEED");
					$.each(obj,function(k,v){
						$('#consultant_share_'+i).val(v.consultant_share);
						$('#state_share_'+i).val(v.state_share);
						$('#district_share_'+i).val(v.district_share);
						$('#unit_share_'+i).val(v.unit_share);
						i++;
					});
				  	
				}	   
			  
			});*/
            
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