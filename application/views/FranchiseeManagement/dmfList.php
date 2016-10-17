<div id="page-wrapper">
    <div id="page-inner">
        <link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    District Master Franchisee(s)
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
                                            class="selected sorting_asc">Franchisee Id
                                        </th>
                                        <th aria-label="Franchisee Name: activate to sort column ascending"
                                            style="width: 209px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0" class="selected sorting">
                                            Franchisee Name
                                        </th>
                                        <th aria-label="City: activate to sort column ascending" style="width: 53px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">City
                                        </th>
                                        <th aria-label="State: activate to sort column ascending" style="width: 68px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">State
                                        </th>
                                        <th aria-label="Revenue Configuration" style="width: 272px;" colspan="1"
                                            rowspan="1" class="text-center selected sorting_disabled">Revenue
                                            Configuration
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Deactive
                                        </th>
										<th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Edit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i=1;
                                    foreach ($data['smf'] as $row){ ?>
                                        <tr class="odd">
                                            <td class="selected sorting_1"><?php echo $row['id'];?></td>
                                            <td class=" selected"><a data-ajax="true" data-ajax-mode="replace"
                                                                     data-ajax-update="#details"
                                                                     href="detaildmfList/<?php echo $row['user_id']?>"><?php echo $row['first_name'];?></a></td>
                                            <td><?php echo $row['city'];?></td>
                                            <td><?php echo $row['state'];?></td>
                                            <td class="text-center selected">
                                                <button type="button" userid="<?php echo $row['user_id'];?>" rowid="<?php echo $row['id'];?>" data-toggle="modal"
                                                        data-target="#myModalDMFRevenueConfiguration"
                                                        class="btn btn-primary btn-xs f-rev-config">Revenue Configuration
                                                </button>
                                            </td>
                                            <td class=" text-center"><a class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="8" status="0" href="#small-dialog3">
                                                    <button type="button" class="btn btn-primary btn-xs">Deactivate</button>
                                                </a></td>
											<td class=" text-center"><a href="editsmfList/<?php echo $row['user_id']?>" class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="8" status="0" href="#small-dialog3">
                                                    <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                                </a></td>	
                                        </tr>
                                    <?php }?>
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
        <!--<script>
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
                                    return '<button type="button" userid="' + row.UserId + '" fee="' + row.FranchiseFee + '"  data-toggle="modal" data-target="#myModalDMFRevenueConfiguration" class="btn btn-primary btn-xs f-rev-config">Revenue Configuration</button>';
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
        </script>-->
        <div aria-hidden="true" style="display: none;" class="modal fade" id="myModalDMFRevenueConfiguration"
             role="dialog">
            <div class="modal-dialog modal-lg" id="sizeofmodel">
                <div class="modal-content" id="contentbackground">

                    <div class="modal-body" id="bodybackground">
                        <div id="border">
                            <div class="modal-header">
                                <div id="headerbackground">
                                    <button type="button" class="close" data-dismiss="modal"
                                            style="color:red;font-size:29px;">×
                                    </button>
                                    <center><h2 class="modal-title">District Master Franchisee Revenue Configuration</h2>
                                    </center>
                                </div>
                            </div>
                            <br>
                            <form id="RevenueConfigurationForm" name="ConsRevenueConfiguration" action="<?php echo base_url()?>RevenueManagement/saveRevenueConfig" method="post">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>UMF Share</label>
                                                <label><input class="form-control" name="direct_umf_share"
                                                              id="direct_umf_share" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <!--<div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Student commission</label>
                                                <label><input class="form-control" name="student_commission"
                                                              id="student_commission" type="text"></label>
                                            </div>
                                        </label>
                                    </div>-->
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Units</label>
                                                <label>
                                                    <select name="units" id="units_id">
                                                        <option value="0">Amount</option>
                                                        <option value="1">Percentage</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <input id="RevConfigUserId" name="UserId" type="hidden">
                                            <input id="RevConfigId" name="RevConfigId" type="hidden">
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="roww1">
                                    <center>
                                        <label class="danger" id="rev-config-msg"></label>
                                        <button class="btn primaryCta small" type="button"
                                                role="button"
                                                id="revenue_button_save"><span>Save</span></button>
                                        <button class="btn primaryCta small" type="button" id="buttonCancel"
                                                data-dismiss="modal"><span>Cancel</span></button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="small-dialog3" class="mfp-hide">

            <form id="DeactivateYes" method="post" class="form-horizontal" name="DeactivateYes">
                <div class="pop_up">
                    <div class="row form-group">
                        <br>
                        <center>
                            <h4 style="color:red;">
                                <input id="franchiseeId" name="UserId" type="hidden">
                                <input id="franchiseeStatus" name="Status" type="hidden">
                                Are you sure to Activate/Deactivate the Franchisee?
                            </h4>
                        </center>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <input id="DeactivateReson" name="DeactivateReson" placeholder="Enter the reason"
                                   class="form-control" type="text">
                        </div>
                        <br>
                        <br>
                        <div class="hidden" id="dvStatus" style="color:red">
                            <center>*Please Enter the reason, why you activate/deactivate this Franchisee</center>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <center>
                                <a class="popup-with-zoom-anim-it">
                                    <button type="button" id="btnUpdateStatus" class="btn btn-primary btn-md as_button">
                                        <b id="yesmargin">Yes</b></button>
                                </a>
                                <button type="button" name="cancel" class="btn btn-primary btn-md as_button pull-right"
                                        onclick="return Closepopup();"><b id="yesmargin">No</b></button>
                            </center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">FriendsFocus</a></p></footer>
</div>