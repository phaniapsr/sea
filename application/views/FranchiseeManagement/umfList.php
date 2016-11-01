	<div id="page-wrapper">
    <div id="page-inner">
        <link href="Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Unit Master Franchisee(s)
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
                                        <th aria-label="Split License Amount" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Split License Amount
                                        </th>
										<th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Edit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data['smf'] as $row) { ?>
                                        <tr class="odd">
                                            <td class="selected sorting_1"><?php echo $row['id']; ?></td>
                                            <td class=" selected"><a data-ajax="true" data-ajax-mode="replace"
                                                                     data-ajax-update="#details"
                                                                     href="detailufList/<?php echo $row['user_id'] ?>"><?php echo $row['first_name']; ?></a>
                                            </td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['state']; ?></td>
                                            <td class="text-center selected">
                                                <button type="button" id="umfRev" userid="<?php echo $row['user_id']; ?>"
                                                        rowid="<?php echo $row['id']; ?>" data-toggle="modal"
                                                        data-target="#myModalSMFRevenueConfiguration"
                                                        class="btn btn-primary btn-xs f-rev-config">Revenue
                                                    Configuration
                                                </button>
                                            </td>
                                            <td class=" text-center"><a class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="8" status="0" href="#small-dialog3">
                                                    <button type="button" class="btn btn-primary btn-xs">Deactivate
                                                    </button>
                                                </a></td>
                                            <td class="text-center selected">
                                                <button type="button" userid="<?php echo $row['user_id'];?>" listType="uf" rowid="<?php echo $row['id'];?>" data-toggle="modal"
                                                        data-target="#myModalSMFRevenueSplit"
                                                        class="btn btn-primary btn-xs f-rev-split">Split
                                                </button>
                                            </td>
											<td class=" text-center"><a href="editsmfList/<?php echo $row['user_id']?>" class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="8" status="0" href="#small-dialog3">
                                                    <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                                </a></td>	
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
        <div aria-hidden="true" style="display: none;" class="modal fade" id="myModalSMFRevenueSplit" role="dialog">
            <div class="modal-dialog modal-lg" id="split_sizeofmodel">
                <div class="modal-content" id="split_contentbackground">
                    <div class="modal-body" id="split_bodybackground">
                        <div id="split_border">
                            <div class="modal-header">
                                <div id="split_headerbackground">
                                    <button type="button" class="close" data-dismiss="modal"
                                            style="color:red;font-size:29px;">×
                                    </button>
                                    <center><h2 class="modal-title">Unit Franchisee Revenue Split</h2></center>
                                </div>
                            </div>
                            <br>
                            <form id="SplitRevenueConfigurationForm" name="SplitRevenueConfiguration" action="<?php echo base_url()?>RevenueManagement/saveRevenueSplit" method="post">
                                <div class="row">
                                    <div class="row col-lg-12"><label>Total License Amount Paid : <span id="license_amt_paid"></span></label></div>
                                    <div class="row col-lg-12"><label>Tax Amount Paid : <span id="tax_amt_paid"></span></label></div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Kit Fee</label>
                                                <label><input class="form-control number" min="0"  name="kit_fee_identified"
                                                              id="kit_fee_identified" type="number"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="row col-lg-12"><label>Amount to be Split : <span id="splitting_amount"></span></label></div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Company Amount</label>
                                                <label><input class="form-control" readonly name="license_company_amount" id="license_company_amount" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>District Amount ( <span id="district_share_value"></span>)</label>
                                                <label><input class="form-control" readonly name="license_district_amount" id="license_district_amount" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>State Amount ( <span id="state_share_value"></span>)</label>
                                                <label><input class="form-control" readonly name="license_state_amount"
                                                              id="license_state_amount" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Consultant Amount ( <span id="consultant_share_value"></span>)</label>
                                                <label><input class="form-control" readonly name="license_consultant_amount"
                                                              id="license_consultant_amount" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="row" id="roww1">
                                    <center>
                                        <label class="danger" id="rev-config-msg"></label>
                                        <button class="btn primaryCta small" type="button"
                                                role="button"
                                                id="revenue_split_button_save"><span>Save</span></button>
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
        <div aria-hidden="true" style="display: none;" class="modal fade" id="myModalSMFRevenueConfiguration"
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
                                    <center><h2 class="modal-title">Unit Master Franchisee Revenue Configuration</h2>
                                    </center>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div id="margin-top" class="panel-body">
                                            <form id="RevenueConfigurationForm" name="ConsRevenueConfiguration" action="<?php echo base_url() ?>RevenueManagement/saveStudentRevenueConfig"
                                                  method="post">
                                                <input id="RevConfigUserId" name="UserId" type="hidden">
                                                <input id="RevConfigId" name="RevConfigId" type="hidden">
                                                <table width="100%" class="repeat_tr" id="tbl_student_revenue_types_1">
                                                    <tbody>
                                                    <tr>
                                                        <td>Revenue Type</td>
                                                        <td>
                                                            <span id="student_revenue_type_1"></span>
                                                            <input type="hidden" class="number"
                                                                   id="hid_student_revenue_type_1"
                                                                   name="student_revenue_type[]">
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Consultant Share</td>
                                                        <td>
                                                            <input type="text" class="number" name="consultant_share[]"
                                                                   id="consultant_share_1">
                                                        </td>
                                                        <td>State Share</td>
                                                        <td>
                                                            <input type="text" class="number" name="state_share[]"
                                                                   id="state_share_1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>District Share</td>
                                                        <td>
                                                            <input type="text" class="number" name="district_share[]"
                                                                   id="district_share_1">
                                                        </td>
                                                        <td>Unit Share</td>
                                                        <td>
                                                            <input type="text" class="number" name="unit_share[]"
                                                                   id="unit_share_1">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <div class="col-lg-4">
                                                    <label>Units</label>
                                                    <select name="units" id="units_id">
                                                        <option value="0">Amount</option>
                                                        <option value="1">Percentage</option>
                                                    </select>
                                                </div>
                                                <label class="danger" id="rev-config-msg"></label>
                                                <button class="btn primaryCta small" type="button"
                                                        role="button"
                                                        id="student_revenue_button_save"><span>Save</span></button>
                                                <button class="btn primaryCta small" type="button" id="buttonCancel"
                                                        data-dismiss="modal"><span>Cancel</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                        <button type="button" id="btnUpdateStatus"
                                                class="btn btn-primary btn-md as_button">
                                            <b id="yesmargin">Yes</b></button>
                                    </a>
                                    <button type="button" name="cancel"
                                            class="btn btn-primary btn-md as_button pull-right"
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