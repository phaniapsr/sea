<script type="application/javascript"
        src="<?php echo base_url() ?>Scripts/admin/studentRegistration/studentRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Students List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="searchStudentByName"
                      action="<?php echo base_url() ?>StudentManagement/currentStudentsList" name="form1"
                      class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                      enctype="multipart/form-data">
                    <input type="text" name="search" id="search" placeholder="searchByName"/>
                    <input type="text" name="email" id="email" placeholder="searchByEmail"/>
                    <input type="submit" class="btn btn-primary btn-xs f-rev-config" name="find" id="find"
                           value="SEARCH">
                </form>
            </div>
        </div>

        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover no-footer dataTable"
                       id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['smf'] as $row) { ?>
                        <tr class="odd">
                            <td><?php echo $row['user_id']; ?></td>
                            <td><a href="sdetailView/<?php echo $row['id'] ?>"><?php echo $row['first_name']; ?></a>
                            </td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['middle_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><input type="button" class="btn btn-primary btn-xs f-rev-config" value="Courses Info"
                                       onclick="window.location.href='sdetailView/<?php echo $row['id'] ?>'"/></td>
                            <?php if ($row['user_status'] == 0) { ?>
                                <td class="text-center"><a userid="<?php echo $row['user_id']; ?>">
                                        <button type="button" id="dact_<?php echo $row['user_id']; ?>"
                                                class="btn btn-primary btn-xs f-rev-config">Deactivate
                                        </button>
                                    </a></td>
                            <?php } ?>
                            <?php if ($row['user_status'] == 1) { ?>
                                <td class="text-center"><a userid="<?php echo $row['user_id']; ?>">
                                        <button type="button" id="dact_<?php echo $row['user_id']; ?>"
                                                class="btn btn-primary btn-xs f-rev-config">Activate
                                        </button>
                                    </a></td>
                            <?php } ?>
                            <script>
                                $('#dact_<?php echo $row['user_id'];?>').click(function () {
                                    var id = "<?php echo $row['id']?>";
                                    $.ajax({
                                        type: 'post',
                                        url: '<?php echo base_url()?>/FranchiseeManagement/checkStatus',
                                        data: {id: id},
                                        success: function (res) {
                                            if (res == 0) {
                                                alert("deactivated sucessfully");
                                                $('#dact_' + id).text('Activate');

                                            }
                                            if (res == 1) {
                                                alert("activated successfully");
                                                $('#dact_' + id).text('Deactivate');
                                            }

                                        }
                                    });
                                });
                            </script>
                            <td class=" text-center"><a href="editstuList/<?php echo $row['id'] ?>"
                                                        class="popup-with-zoom-anim-mec btn-activate"
                                                        userid="8" status="0" href="#small-dialog3">
                                    <button type="button" class="btn btn-primary btn-xs f-rev-config">Edit</button>
                                </a></td>
								<?php if($this->session->user_logged_in['role_id'] == 4){?>
								<td class="text-center selected">
                                                <button type="button" userid="<?php echo $row['user_id'];?>"
																     courseid="<?php echo $row['course_level_id'];?>"
 												                      attendance="<?php echo $row['feedback_attendance'];?>"                                    
																	  excercise="<?php echo $row['feedback_excercise'];?>"
																	  practice="<?php echo $row['feedback_practice'];?>"
																	  motivate="<?php echo $row['feedback_motivating'];?>"
																	  development="<?php echo $row['feedback_development'];?>"
																	  franchisee="<?php echo $row['feedback_franchisee'];?>"
																	  trainer="<?php echo $row['feedback_trainer'];?>"	
                        																	  data-toggle="modal"
                                                        data-target="#studentFeedbackform"
                                                        class="btn btn-primary btn-xs f-feedback">Student FeedBack
                                                </button>
								</td> <?php } ?>
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
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
		<div aria-hidden="true" style="display: none;" class="modal fade" id="studentFeedbackform" role="dialog">
            <div class="modal-dialog modal-lg" id="split_sizeofmodel">
                <div class="modal-content" id="split_contentbackground">
                    <div class="modal-body" id="split_bodybackground">
                        <div id="split_border">
                            <div class="modal-header">
                                <div id="split_headerbackground">
                                    <button type="button" class="close" data-dismiss="modal"
                                            style="color:red;font-size:29px;">×
                                    </button>
                                    <center><h2 class="modal-title">Student FeedBack Form</h2></center>
                                </div>
                            </div>
                            <br>
                            <form id="studentFeedback" name="studentFeedback" action="<?php echo base_url()?>StudentManagement/feedBack" method="post">
                                <div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student id</label>
									<div class="col-lg-6 has-feedback">
									<input type="hidden" id="stud_id" name="stud_id">
									<span id="feedback_id"></span>
									</div>
								</div>
                                </div>   								
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student Course id</label>
									<div class="col-lg-6 has-feedback">
									<input type="hidden" id="course_id" name="course_id">
									<span id="feedback_course_id"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child’s attendance to your satisfaction?</label>
									<div class="col-lg-6 has-feedback">
									<span id="attendance"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child regular in doing practice of the given exercises?</label>
									<div class="col-lg-6 has-feedback">
									<span id="excercise"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child interested in doing the practice or was it out of force & constant
reminders?</label>
									<div class="col-lg-6 has-feedback">
									<span id="practice"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Were you involved in motivating your child and encouraging him to do Mental
Arithmetic?</label>
									<div class="col-lg-6 has-feedback">
									<span id="motivate"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Your observation regarding developmental changes in the child
Arithmetic?</label>
									<div class="col-lg-6 has-feedback">
									<span id="development"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">How do you feel about the Franchisee Center’s Infrastructure & Ambience?</label>
									<div class="col-lg-6 has-feedback">
									<span id="franchisee"></span>
									</div>
									</div>
									</div>
									<div class="row">
									<div class="form-group">
									<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">How do you feel about the trainer / instructor?</label>
									<div class="col-lg-6 has-feedback">
									<span id="trainer"></span>
									</div>
									</div>
									</div>
									<div class="row">
                                    <center>
									<label>Enter FeedBack here</label><br>
                                    <textarea id="feedback" name="feedback" cols="30" rows="10"></textarea>
                                    </center>
								</div>
                                <div class="row" id="roww1">
                                    <center>
                                        <label class="danger" id="rev-config-msg"></label>
                                        <button class="btn primaryCta small" type="button"
                                                role="button"
                                                id="feedback_form_save"><span>Save</span></button>
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
<div class="modal fade" id="success" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:green"></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        <link href="<?php echo base_url() ?>Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="<?php echo base_url() ?>Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="<?php echo base_url() ?>Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">FriendsFocus</a></p></footer>
</div>