
$(window).load(function () {
    $(document).ready(function () {
        
        $('#SMFFranchiseeKitFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#SMFPaidFranchiseeFee').val())) {
                $('#SMFFranchiseeLicenseFee').val(parseFloat($('#SMFPaidFranchiseeFee').val()) - parseFloat($('#SMFFranchiseeKitFee').val()));
            } else {
                $('#SMFFranchiseeKitFee').val(0);
                $('#SMFFranchiseeLicenseFee').val(parseFloat($('#SMFPaidFranchiseeFee').val()));
            }
            return false;
        });
        $('#SMFFranchiseeLicenseFee').keyup(function () {
            if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) <= parseFloat($('#SMFPaidFranchiseeFee').val())) {
                $('#SMFFranchiseeKitFee').val(parseFloat($('#SMFPaidFranchiseeFee').val()) - parseFloat($('#SMFFranchiseeLicenseFee').val()));
            } else {
                $('#SMFFranchiseeLicenseFee').val(0);
                $('#SMFFranchiseeKitFee').val(parseFloat($('#SMFPaidFranchiseeFee').val()));
            }
            return false;
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