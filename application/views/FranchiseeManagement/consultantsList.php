<div id="page-wrapper">
    <div id="page-inner">
        <link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Consultants List
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
                                        <form id="searchStudentByName"
                              action="<?php echo base_url()?>FranchiseeManagement/consultantsList" name="form1"
                              class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                              enctype="multipart/form-data">
							   <input type="text" name="search" id="search" placeholder="searchByName" ></input>
			<input type="submit" class="btn btn-primary btn-xs" name="find" id="find" value="SEARCH">
		   </form>
                                    </div>
                                </div>
                                <table aria-describedby="dt-state-franchisee_info"
                                       class="table table-striped table-bordered table-hover dataTable no-footer"
                                       id="dt-state-franchisee" style="font-size:14px;">
                                    <thead>

                                    <tr role="row">
                                        <th aria-label="Franchisee Id: activate to sort column ascending"
                                            aria-sort="ascending" style="width: 100px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0"
                                            class="text-center sorting_disabled">Franchisee Id
                                        </th>
                                        <th aria-label="Franchisee Name: activate to sort column ascending"
                                            style="width: 108px;" colspan="1" rowspan="1"
                                            aria-controls="dt-state-franchisee" tabindex="0" class="text-center sorting_disabled">
                                            Franchisee Name
                                        </th>
                                        <th aria-label="City: activate to sort column ascending" style="width: 108px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="text-center sorting_disabled">City
                                        </th>
                                        <th aria-label="State: activate to sort column ascending" style="width: 108px;"
                                            colspan="1" rowspan="1" aria-controls="dt-state-franchisee" tabindex="0"
                                            class="text-center sorting_disabled">State
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
                                            <td style="text-align:center" class="selected sorting_1"><?php echo $row['id'];?></td>
                                            <td style="text-align:center" class=" selected"><a data-ajax="true" data-ajax-mode="replace"
                                                                     data-ajax-update="#details"
                                                                     href="detailConsulView/<?php echo $row['user_id']?>"><?php echo $row['first_name'];?></a></td>
                                            <td style="text-align:center"><?php echo $row['city'];?></td>
                                            <td style="text-align:center"><?php echo $row['state'];?></td>
                                            <td class="text-center selected">
                                                <button type="button"  userid="<?php echo $row['user_id'];?>" rowid="<?php echo $row['id'];?>" data-toggle="modal"
                                                        data-target="#myModalSMFRevenueConfiguration"
                                                        class="btn btn-primary btn-xs f-rev-config">Revenue Configuration
                                                </button>
                                            </td>
                                           <?php if($row['user_status']==0){?>
                                            <td class="text-center"><a class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="<?php echo $row['user_id'];?>" status="0">
                                                    <button type="button" id="dact_<?php echo $row['user_id'];?>" class="btn btn-primary btn-xs">Deactivate</button>
                                                </a></td>
											<?php } ?>
											<?php if($row['user_status']==1){?>
                                            <td class="text-center"><a class="popup-with-zoom-anim-mec btn-activate"
                                                                        userid="<?php echo $row['user_id'];?>" status="0">
                                                    <button type="button" id="dact_<?php echo $row['user_id'];?>" class="btn btn-primary btn-xs">Activate</button>
                                                </a></td>
											<?php } ?>	
											<script>
											$('#dact_<?php echo $row['user_id'];?>').click(function(){
												var id="<?php echo $row['id']?>";
												$.ajax({
													type: 'post',
													url: '<?php echo base_url()?>/FranchiseeManagement/checkStatus',
													data: {id: id},
													success: function (res) {
														  if(res==0)
														  {
															  alert("deactivated sucessfully");
															  $('#dact_'+id).text('Activate');
															  
														  }
														  if(res==1)
														  {
															  alert("activated successfully");
															  $('#dact_'+id).text('Deactivate');
														  }	  
														  
													}
												});


											});
											</script>
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
                                    <center><h2 class="modal-title">Consultant Revenue Configuration</h2>
                                    </center>
                                </div>
                            </div>
                            <br>
                            <form id="RevenueConfigurationForm" name="ConsRevenueConfiguration" action="<?php echo base_url()?>RevenueManagement/saveRevenueConfig" method="post">
                                <div class="row">
                                    <div class="row col-lg-12"><b>Consultant directly appoints</b></div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>SMF Share</label>
                                                <label><input class="form-control" name="direct_smf_share"
                                                              id="direct_smf_share" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>DMF Share</label>
                                                <label><input class="form-control" name="direct_dmf_share"
                                                              id="direct_dmf_share" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>UMF Share</label>
                                                <label><input class="form-control" name="direct_umf_share"
                                                              id="direct_umf_share" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="row col-lg-12"><b>Consultant indirectly appoints(through hierarchy)</b></div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>DMF Share</label>
                                                <label><input class="form-control" name="indirect_dmf_share"
                                                              id="indirect_dmf_share" type="text"></label>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>
                                            <div class="col-lg-12">
                                                <label>Unit Share</label>
                                                <label><input class="form-control" name="indirect_umf_share"
                                                              id="indirect_umf_share" type="text"></label>
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
