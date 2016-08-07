function Franchises() {
    this.StateFranchises = function (params, success, error) {
        $.ajax({
            url: '/api/Admin/StateFranchisee',
            data: { IncludeInActive: params.IncludeInActive, IncludeActive: params.IncludeActive },
            success: success,
            error: error
        });
    };
    this.DistrictFranchises = function (params, success, error) {
        $.ajax({
            url: '/api/Admin/DistrictFranchisee',
            data: { IncludeInActive: params.IncludeInActive, IncludeActive: params.IncludeActive },
            success: success,
            error: error
        });
    };
    this.UnitFranchises = function (params, success, error) {
        $.ajax({
            url: '/api/Admin/UnitFranchisee',
            data: { IncludeInActive: params.IncludeInActive, IncludeActive: params.IncludeActive },
            success: success,
            error: error
        });
    };

    this.SaveFranchisee = function (franchisee, success, error) {
        $.ajax({
            url: '/api/Admin/Franchisee',
            type: 'Post',
            data: franchisee,
            success: success,
            error: error
        });
    }
    this.InActivateFranchisee = function (params, success, error) {
        params.Status = params.Status || "1";
        $.ajax({
            url: '/api/Admin/Franchisee?userId=' + params.UserId + '&status=' + params.Status + '&reason=' + params.Reason,
            type: 'Delete',
            //data: { userId: params.UserId, reason: params.Reason },
            success: success,
            error: error
        });
    };
    this.UpdateFranchiseeStatus = function (params, success, error) {
        params.Status = params.Status || "1";
        $.ajax({
            url: '/api/Admin/Franchisee?userId=' + params.UserId + '&status=' + params.Status + '&reason=' + params.Reason,
            type: 'Delete',
            //data: { userId: params.UserId, reason: params.Reason },
            success: success,
            error: error
        });
    };

    this.FranchiseDetails = function (params, success, error) {
        $.ajax({
            url: '/api/admin/Franchiseedetails',
            data: { UserId: params.UserId },
            success: success,
            error: error
        });
    };
    this.FranchiseActive = function (params, success, error) {
        $.ajax({
            url: '/api/admin/Franchiseeactive',
            data: { UserId: params.UserId },
            success: success,
            error: error
        });
    };
}
// student
function Students() {
    this.CurrentStudents = function (includeInActive, success, error) {
        debugger;
        $.ajax({
            url: '/api/admin/Student',
            //data: { IncludueInActive: includeInActive },
            success: success,
            error: error
        });
    };
    this.StudentsDetails = function (params, success, error) {
        $.ajax({
            url: '/api/admin/Studentdetails',
            data: { UserId: params.UserId },
            success: success,
            error: error
        });
    };
    this.CourseCompleteStudents = function (includeInActive, success, error) {
        $.ajax({
            url: '/api/admin/Student',
            success: success,
            error: error
        });
    };
    this.GetStudentsByProgram = function (params, success, error) {
        $.ajax({
            url: '/api/admin/StudentProgram',
            data: { ProgramId: params.ProgramId, Level: params.Level },
            success: success,
            error: error
        });
    };
    this.GetStudentsByLevel = function (params, success, error) {
        $.ajax({
            url: '/api/admin/StudentLevel',
            data: { levelName: params.LevelName },
            success: success,
            error: error
        });
    };
    this.GetStudentsByCourse = function (params, success, error) {
        $.ajax({
            url: '/api/admin/StudentCourse',
            data: { CourseId: params.CourseId },
            success: success,
            error: error
        });
    };
    this.UpdateStudentStatus = function (params, success, error) {
        params.Status = params.Status || "1";
        $.ajax({
            url: '/api/Admin/Student?studentid=' + params.StudentId + '&status=' + params.Status + '&reason=' + params.Reason,
            type: 'Delete',
            success: success,
            error: error
        });
    };
    this.CertificateRequests = function (success, error) {
        $.ajax({
            url: '/api/admin/CertificateRequests',
            success: success,
            error: error
        });
    };
    this.StudentAttendanceById = function (studentId,success, error) {
        $.ajax({
            url: '/api/admin/StudentAttendance?id=' + studentId,
            success: success,
            error: error
        });
    };
    this.GetStudentFeeByCourse = function (courseLevelId, success, error) {
        $.ajax({
            url: '/api/admin/StudentCourseFee?courseLevelId=' + courseLevelId,
            success: success,
            error: error
        });
    };
}
//invoice
this.InvoiceFranchises = function (params, success, error) {
    $.ajax({
        url: '/api/admin/Invoice',
        data: { UserId: params.UserId },
        success: success,
        error: error
    });
}
//kit orders
function Kitorders() { 
    this.KitOrderRequest = function (params, success, error) {
        $.ajax({
            url: '/api/admin/Kitorders',
            success: success,
            error: error
        })
    };
    this.ApproveKitOrder = function (params, success, error) {
        $.ajax({
            url: '/api/admin/Kitorders?orderId=' + params.OrderId + '&message=' + params.Message,
            type:'Delete',
            data: {message:params.Message},
            success: success,
            error: error
        })
    }
}
//revenue configuration
function Revenueconfiguration() {
    this.RevenueConfigurationValue = function (success, error) {
        $.ajax({
            url: '/api/admin/Revenueconfiguration',
            success: success,
            error: error
        })
    };
    this.GetRevenueConfiguration = function (franchiseeId, success, error) {
        $.ajax({
            url: '/api/admin/RevenueConfiguration',
            data: { franchiseeId: franchiseeId },
            success: success,
            error: error
        })
    };
    this.GetStudentRevenueConfiguration = function (franchiseeId, success, error) {
        $.ajax({
            url: '/api/admin/StudentRevenueconfiguration',
            data: { franchiseeId: franchiseeId },
            success: success,
            error: error
        })
    };
}
// Edit User Profile
function EditUserProfile() {
    this.EditUserProfile = function (success, error) {
        $.ajax({
            url: '/api/admin/EditUserProfile',
            success: success,
            error: error
        });
    }
}
//Mails
function Mails() {
    //this.SentMails = function (success, error) {
    //    var data = {
    //       Subject: 'this is mail subject',
    //       Body: 'This is mail body',
    //        ReciptentUserId:1
    //    };
    //    $.ajax({
    //        url: '/api/Admin/Mail',
    //        type: "POST",
    //        //data: { Subject: Subject, Body: Body, ReciptentUserId: ReciptentUserId },
    //        data:data,
    //        success: success,
    //        error: error
    //    });
    //};
    //this.Drafts = function (success, error) {
    //    $.ajax({
    //        url: '/api/Admin/Drafts',
    //        success: success,
    //        error: error
    //    });
    //};
    this.GetMails = function (folderId, success, error) {
        $.ajax({
            url: '/api/Admin/MailBox',
            data: { folderId: folderId },
            success: success,
            error: error
        });
    };
    this.GetMail = function (mailId, success, error) {
        $.ajax({
            url: '/api/Admin/Mail',
            data: { id: mailId },
            success: success,
            error: error
        });
    };
}

function Reports() {
    this.Revenue = function (params, success, error) {
        $.ajax({
            url: '/api/Reports/Revenue',
            data: { StartDate: params.StartDate, EndDate: params.EndDate },
            success: success,
            error: error
        });
    };
    this.StudentRegistrationReport = function (params, success, error) {
        $.ajax({
            url: '/api/reports/StudentRegistration',
            data: params,
            success: success,
            error: error
        });
    };
    this.FrachiseeRegistrationReport = function (params, success, error) {
        $.ajax({
            url: '/api/reports/FranchiseeRegistration',
            data: params,
            success: success,
            error: error
        });
    };
}
