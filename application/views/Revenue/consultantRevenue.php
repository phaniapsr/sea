<div id="page-wrapper">
    <div id="page-inner">
        <link href="Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Consultant Revenue
                </h1>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-6">
                <div>
                    <label>
                        <input id="cbx-inactive" name="InActive" value="InActive" onchange="LoadStateFranchises()"
                               checked="checked" type="checkbox"> Active Franchisee
                    </label>
                    <label id="margin-left">
                        <input id="cbx-active" name="IsActive" value="IsActive" onchange="LoadStateFranchises()"
                               type="checkbox"> Inactive Franchisee
                    </label>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dt-state-franchisee_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="dt-state-franchisee_length" class="dataTables_length"><label><select
                                                    class="form-control input-sm" aria-controls="dt-state-franchisee"
                                                    name="dt-state-franchisee_length">
                                                    <option selected="selected" value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> records per page</label></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dataTables_filter" id="dt-state-franchisee_filter"><label>Search
                                                <input aria-controls="dt-state-franchisee" class="form-control input-sm"
                                                       type="search"></label></div>
                                    </div>
                                </div>
                                <table aria-describedby="dt-state-franchisee_info"
                                       class="table table-striped table-bordered table-hover dataTable no-footer"
                                       id="dt-state-franchisee" style="font-size:14px;">
                                    <thead>

                                    <tr role="row">
                                        <th aria-label="Franchisee Id: activate to sort column ascending"
                                            aria-sort="ascending" style="width: 165px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0"
                                            class="selected sorting_asc">Name
                                        </th>
                                        <th aria-label="Franchisee Name: activate to sort column ascending"
                                            style="width: 209px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0" class="selected sorting">
                                            Type
                                        </th>
                                        <th aria-label="City: activate to sort column ascending" style="width: 53px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">LicenseFee
                                        </th>
                                        <th aria-label="State: activate to sort column ascending" style="width: 68px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">KitFee
                                        </th>
                                        <th aria-label="Revenue Configuration" style="width: 272px;" colspan="1"
                                            rowspan="1" class="text-center selected sorting_disabled">Revenue
                                            Tax
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Company Share
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Consultant Share
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    foreach ($consultant as $row) { ?>
                                        <tr class="odd">
                                            <td class="selected sorting_1"><?php echo $row['first_name']; ?></td>
                                            <td class=" selected"><?php
                                                $RoleId = $row['role_id'];
                                                $this->db->select('role');
                                                $this->db->from('sea_roles');
                                                $this->db->where('id', $RoleId);
                                                $Role = $this->db->get()->row();
                                                echo $Role->role;
                                                ?></td>
                                            <td class=" selected"><?php echo $row['lf_amount']; ?></td>
                                            <td><?php echo $row['kf_amount']; ?></td>
                                            <td><?php echo $row['tax_amount']; ?></td>

                                            <td class=" text-center"><?php echo $row['lf_company_amount']; ?>
                                            <td><?php echo $row['lf_consultant_amount']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div aria-relevant="all" aria-live="polite" role="alert"
                                             id="dt-state-franchisee_info" class="dataTables_info">Showing 1 to 10 of 23
                                            entries
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="dt-state-franchisee_paginate"
                                             class="dataTables_paginate paging_simple_numbers">
                                            <ul class="pagination">
                                                <li id="dt-state-franchisee_previous" tabindex="0"
                                                    aria-controls="dt-state-franchisee"
                                                    class="paginate_button previous disabled"><a href="#">Previous</a>
                                                </li>
                                                <li tabindex="0" aria-controls="dt-state-franchisee"
                                                    class="paginate_button active"><a href="#">1</a></li>
                                                <li tabindex="0" aria-controls="dt-state-franchisee"
                                                    class="paginate_button "><a href="#">2</a></li>
                                                <li tabindex="0" aria-controls="dt-state-franchisee"
                                                    class="paginate_button "><a href="#">3</a></li>
                                                <li id="dt-state-franchisee_next" tabindex="0"
                                                    aria-controls="dt-state-franchisee" class="paginate_button next"><a
                                                        href="#">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->
        <div id="details" class="row">
        </div>
        <script>
            //var franchiseeManager = new Franchises();
            //var revenueConfigManager = new Revenueconfiguration();
            $(document).ready(function () {
                LoadStateFranchises();
                $("#btnUpdateStatus").click(function () {
                    $("#dvStatus").addClass("hidden");
                    //var UserId = $("#franchiseeId").val();
                    var reason = $("#DeactivateReson").val();
                    if (reason == "") {
                        $("#dvStatus").removeClass("hidden");
                        return false;
                    } else {
                        UpdateFranchiseeStatus($("#franchiseeId").val(), $("#franchiseeStatus").val(), $("#DeactivateReson").val());
                    }
                });

                function UpdateFranchiseeStatus(userId, status, reason) {
                    franchiseeManager.InActivateFranchisee({
                        UserId: userId,
                        Status: status,
                        Reason: reason
                    }, function (dataSet) {
                        $(".mfp-close").click();
                        $('#dt-state-franchisee').dataTable({
                            "filter": false,
                            "destroy": true
                        });
                        $.magnificPopup.instance.close();
                        LoadStateFranchises();
                    }, function (xhr) {
                    });
                }
            });
            function LoadStateFranchises() {
                franchiseeManager.StateFranchises({
                    IncludeInActive: $("#cbx-inactive").prop("checked"),
                    IncludeActive: $("#cbx-active").prop("checked")
                }, function (dataSet) {
                    $('#dt-state-franchisee').DataTable({
                        className: "selected",
                        data: dataSet,
                        destroy: true,
                        columns: [
                            {data: "UserId", className: "selected", title: "Franchisee Id"},
                            {
                                data: "DisplayName",
                                title: "Franchisee Name",
                                className: "selected",
                                render: function (data, type, row) {
                                    return '<a data-ajax="true" data-ajax-mode="replace" data-ajax-update="#details" href="/Admin/FranchiseeDetail?userId=' + row.UserId + '">' + data + '</a>';
                                    //'<a href="#state" class="f-details" userid="' + row.UserId + '">' + data + '</a>';
                                }
                            },
                            {data: "City", title: "City"},
                            {data: "State", title: "State"},

                            {
                                data: "UserId", title: "Revenue Configuration",
                                render: function (data, type, row) {
                                    return '<button type="button" userid="' + row.UserId + '" fee="' + row.FranchiseFee + '"  data-toggle="modal" data-target="#myModalSMFRevenueConfiguration" class="btn btn-primary btn-xs f-rev-config">Revenue Configuration</button>';
                                },
                                orderable: false,
                                className: "text-center selected"
                            },
                            {
                                data: "UserId", title: "Deactive",
                                render: function (data, type, row) {
                                    if (row.Status == 0) {
                                        return '<a class="popup-with-zoom-anim-mec btn-activate" userid="' + row.UserId + '" status="0"  href="#small-dialog3"><button type="button"  class="btn btn-primary btn-xs">Deactivate</button></a>';
                                    } else {
                                        return '<a class="popup-with-zoom-anim-mec btn-activate" userid="' + row.UserId + '" status="1"  href="#small-dialog3"><button type="button"  class="btn btn-primary btn-xs">Activate</button></a>';
                                    }
                                },
                                orderable: false,
                                className: "text-center"
                            },

                        ]
                    });

                    $(".btn-activate").click(function () {
                        $("#dvStatus").addClass("hidden");
                        var userId = $(this).attr('userid');
                        var status = $(this).attr('status');
                        $("#franchiseeId").val(userId);
                        $("#franchiseeStatus").val(status);
                    });
                    function Closepopup() {
                        $.magnificPopup.instance.close()
                    }


                    $(".f-details").click(function () {
                        BindFranchisesdetails($(this).attr('userid'));
                    });
                    $(".f-rev-config").click(function () {
                        var userId = $(this).attr('userid');
                        $("#RevConfigUserId").val($(this).attr('userid'));
                        $("#SMFPaidFranchiseeFee").val($(this).attr('fee'));
                        /*revenueConfigManager.GetRevenueConfiguration(userId, function (resp) {
                         $("#SMFFranchiseeLicenseFee").val(parseFloat(resp.LicenseFee));
                         $("#SMFFranchiseeKitFee").val(parseFloat(resp.KitFee));
                         $("#RevConfigId").val(resp.Id);
                         });*/
                    });

                    $('.popup-with-zoom-anim-mec').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                    $('.popup-with-zoom-anim-it').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });


                }, function (xhr) {
                });
            }
            function BindFranchisesdetails(franchiseeUserId) {
                franchiseeManager.FranchiseDetails({UserId: franchiseeUserId}, function (franchisee) {
                    if (franchisee != null) {
                        $("#f-name").text(franchisee.DisplayName);
                        $("#f-area").text(franchisee.Area);
                        $("#f-emailid").text(franchisee.EmailId);
                        $("#f-franchiseefee").text(franchisee.FranchiseFee);
                        $("#f-goal").text(franchisee.Goal);
                        $("#f-qualicfation").text(franchisee.Qualification);
                        $("#f-presentocupation").text(franchisee.PresentOcupation);
                        $("#f-university").text(franchisee.University);
                        $("#f-compltedyear").text(franchisee.CompletedYear);
                        $("#f-nationality").text(franchisee.Nationality);
                        $("#f-institution").text(franchisee.Instution);
                        $("#f-pincode").text(franchisee.PinCode);
                        $("#f-coursename").text(franchisee.CourseName);
                        $("#f-courseappliedfor").text(franchisee.CourseApplied);
                        $("#f-maritualstatus").text(franchisee.MaritalStatus);
                        $("#f-placeofbirth").text(franchisee.PlaceOfBirth);
                        $("#f-state").text(franchisee.State);
                        $("#f-city").text(franchisee.City);
                        $("#f-mobilenumber").text(franchisee.PhoneNumber);
                        $("#f-landlinenumber").text(franchisee.LandLineNumber);
                        $("#f-streetname").text(franchisee.StreetName);
                        $("#f-gender").text(franchisee.Gender);
                        $("#f-dateofbirth").text((new Date(franchisee.DateOfBirth.replace('T00:00:00', ''))).formatDate('dd/MM/yyyy'));
                        $("#f-flatno").text(franchisee.FlatNo);
                        $("#f-typeofcourse").text(franchisee.TypeOfCourse);
                        $("#f-completedinyear").text(franchisee.OtherCompletedYear);
                        $("#f-imageurl").attr('src', franchisee.ImageUrl);
                    } else {
                        $("#f-name").text('');
                        $("#f-completedinyear").text('');
                        $("#f-imageurl").attr('');
                        $("#f-typeofcourse").text('');
                        $("#f-area").text('');
                        $("#f-emailid").text('');
                        $("#f-franchiseefee").text('');
                        $("#f-goal").text('');
                        $("#f-qualicfation").text('');
                        $("#f-presentocupation").text('');
                        $("#f-university").text('');
                        $("#f-compltedyear").text('');
                        $("#f-nationality").text('');
                        $("#f-institution").text('');
                        $("#f-coursename").text('');
                        $("#f-courseappliedfor").text('');
                        $("#f-maritualstatus").text('');
                        $("#f-placeofbirth").text('');
                        $("#f-state").text('');
                        $("#f-city").text('');
                        $("#f-mobilenumber").text('');
                        $("#f-landlinenumber").text('');
                        $("#f-streetname").text('');
                        $("#f-gender").text('');
                        $("#f-dateofbirth").text('');
                        $("#f-flatno").text('');
                        $("#f-pincode").text('');
                    }
                }, function (xhr) {
                });
            }
            function deactivateform() {
            }
        </script>


        <script>
            $(document).ready(function () {
                $("#state").hide();
                $(".table").click(
                    function () {
                        $("#state").show();
                    }
                );
            });
        </script>
    </div>
    <footer><p>All right reserved by: <a href="http://lemonbridgeit.com/">LemonBridge</a></p></footer>
</div>
