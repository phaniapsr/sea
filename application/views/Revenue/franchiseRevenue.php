<div id="page-wrapper">
    <div id="page-inner">
        <link href="Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Franchise Revenue
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
                        <div class="table-responsive" style="overflow: auto;">
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
                                        <th aria-label="Franchisee Name: activate to sort column ascending"
                                            style="width: 209px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0" class="selected sorting">
                                            Fr Type
                                        </th>
                                        <th aria-label="Franchisee Id: activate to sort column ascending"
                                            aria-sort="ascending" style="width: 165px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0"
                                            class="selected sorting_asc">Fr Name
                                        </th>

                                        <th aria-label="State: activate to sort column ascending" style="width: 68px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">SMF
                                        </th>
                                        <th aria-label="Revenue Configuration" style="width: 272px;" colspan="1"
                                            rowspan="1" class="text-center selected sorting_disabled">
                                            DMF
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Consultant
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">SMF Share
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">DMF Share
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Const Share
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Company
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Total License
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Kit Fee
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Tax
                                        </th>
                                        <th aria-label="City: activate to sort column ascending" style="width: 53px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="sorting">CreatedBy
                                        </th>
                                        <th aria-label="Deactive" style="width: 108px;" colspan="1" rowspan="1"
                                            class="text-center sorting_disabled">Paid On
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($data as $row) {
                                        ?>
                                        <tr class="odd">
                                            <td><?php echo $row['role']?></td>
                                            <td><?php echo $row['frname'];?></td>

                                            <td><?php echo $row['smfname'];?></td>
                                            <td><?php echo $row['dmfname'];?></td>
                                            <td><?php echo $row['consultantname'];?></td>
                                            <td><?php echo $row['lf_smf_amount']; ?></td>
                                            <td><?php echo $row['lf_dmf_amount']; ?></td>
                                            <td><?php echo $row['lf_consultant_amount']; ?></td>
                                            <td><?php echo $row['lf_company_amount']; ?></td>
                                            <td><?php echo $row['lf_amount']; ?></td>
                                            <td><?php echo $row['kf_amount']; ?></td>
                                            <td><?php echo $row['tax_amount']; ?></td>
                                            <td><?php echo $row['createdbyname'];?></td>
                                            <td><?php echo $row['created_datetime']; ?></td>
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
