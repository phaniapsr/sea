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
                                       <div class="col-sm-6">
                                        <form id="searchStudentByName"
                              action="<?php echo base_url()?>/RevenueManagement/franchiseRevenueGrid" name="form1"
                              class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                              enctype="multipart/form-data">
							    <select class="form-control" name="conid" id="conid">
                                                <option value="">Select</option>
                                                
                                            </select>
											<select class="form-control" name="smfid" id="smfid">
                                                <option value="">Select</option>
                                                
                                            </select>
											<select class="form-control" name="dmfid" id="dmfid">
                                                <option value="">Select</option>
                                                
                                            </select>
											
							   <input type="text" name="search" id="search" placeholder="searchByName" ></input>
			<input type="submit" class="btn btn-primary btn-xs" name="man_f" id="man_f" value="SEARCH">
		   </form>
                                    </div>
                                    </div>
                                </div>
								<script>
								$(document).ready(function(){
									$.ajax({
													type: 'post',
													url: '<?php echo base_url()?>/FranchiseeManagement/getCons',
													data: {id:'5'},
													success: function (res) {
														  var s="";
														  var obj = jQuery.parseJSON(res);
														  $.each(obj,function(k,v){
															  s += "<option value="+v.id+">" + v.username + "</option>";
														  });
														  $("#conid").append(s);
														  }
 													
									});	
                                  $('#conid').change(function(){
									var conid=$('#conid').val();
									document.getElementById('smfid').options.length = 1; 
									//alert('con id'+conid);
									$.ajax({
													type: 'post',
													url: '<?php echo base_url()?>/FranchiseeManagement/getSmf',
													data: {id:'2',
													       conid:conid
													},
													success: function (res) {
														  var s="";
														  var obj = jQuery.parseJSON(res);
														  $.each(obj,function(k,v){
															  //alert(v.id);
															  s += "<option value="+v.id+">" + v.username + "</option>";
														  });
														  $("#smfid").append(s);
														  }
 													
									});	
									
								});									
								
                                  $('#smfid').change(function(){
									  var smfid=$('#smfid').val();
									  document.getElementById('dmfid').options.length = 1; 
									 // alert('smfid888'+smfid);
									  $.ajax({
										          type: 'post',
												  url: '<?php echo base_url()?>/FranchiseeManagement/getDmf',
												  data: {id:'3',smfid:smfid},
												  success: function(res){
													 // alert("hi");
												    var s="";
													var obj=jQuery.parseJSON(res);
													$.each(obj,function(k,v){
														//alert(v.id);
														s += "<option value="+v.id+">" + v.username + "</option>";
													});
													$("#dmfid").append(s);
												  }
												   
									  });
								  });   								
								});
								</script>
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
                                    foreach ($data['smf'] as $row) {
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
                                        
                                    </div>
                                    <div class="col-sm-6">
									<div id="dt-state-franchisee_paginate"
                                             class="dataTables_paginate paging_simple_numbers">
                                            <?php
        
		 echo $data['links'];
		?>
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
