<script type = "text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>scripts/admin/studentRegistration/studentRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Student Examination Form</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">

                        <form id="creatExams"
                              action="<?php echo base_url() ?>StudentManagement/creatExams" name="form"
                              class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                              enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-lg-6">
								<div class="form-group">
                                        <center style="font-size:20px;">Create Exams</center>
                                    </div>
									
                                    <div id="coursedetailsborder">
                                    <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Program *</label>
                                            <div class="col-lg-6">
                                                <select id="program" class="form-control" name="program_name">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="ACMAS">ACMAS</option>
                                                    <option value="WRITEASY">WRITEASY</option>
                                                    <option value="IAA">IAA</option>
                                                    <option value="FUNMATHS">FUNMATHS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Course *</label>
                                            <div class="col-lg-6">
                                                <div>
                                                    <select id="course" class="form-control" name="course_name">
                                                        <option selected="selected" value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-5  control-label " style="text-align:left">Level *</label>
                                            <div class="col-lg-6">
                                                <select id="level" class="form-control" name="level_name">
                                                    <option selected="selected" value="">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Upload
                                            </label>
                                        <div class="col-lg-6">
                                           <input type="file" class="form-control" name="userFiles[]" multiple/>
                                        </div>
                                    </div>
                                   
                                    </div>


                                    
                                </div>

                                <div class="col-lg-6">
                                    
							   
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <center>
                                        <div>
                                            <button type="submit" id="signup" role="button" class="btn btn-primary"
                                                    name="fileSubmit" value="Save" style="margin:10px;"><span
                                                    class="glyphicon glyphicon-save" style="margin:3px;"></span>SUBMIT
                                            </button>
                                            <button type="reset" class="btn btn-primary" name="cancel"
                                                    style="margin:10px;"><span class="glyphicon glyphicon-remove"
                                                                               style="margin:3px;"></span>CANCEL
                                            </button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="message_from_server" class="text-success"></p>
                                </div>
                            </div>


                            <div class="modal fade" id="success" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:Green;font-size:28px;"></label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /Modal -->
                            <script type='text/javascript'>
                                // CalTax is for calicualting 15% tax on Franchisee License Fee
                            $(function () {
                                alert('hi');
                                $(document).ready(function () {
                                    $("#program").change(function () {
                                        alert('hi');
                                        $("#course").html('<option value="">Select</option>');
                                        $("#level").html('<option value="">Select</option>');
                                        lookupManager.GetCourseLevels($(this).val(), function (courses) {
                                            var temp = [];
                                            for (i = 0; i < courses.length; i++) {
                                                var course = courses[i];
                                                if (temp.indexOf(course.CourseId) == -1) {
                                                    $("#course").append('<option value="' + course.CourseId + '" >' + course.CourseName + '</option>');
                                                    temp.push(course.CourseId)
                                                }
                                            }
                                        });
                                    });
                                    $("#course").change(function () {
                                        $("#level").html('<option value="">Select</option>');
                                        lookupManager.GetCourseLevels($("#program").val(), function (courses) {
                                            var temp = [];
                                            for (i = 0; i < courses.length; i++) {
                                                var course = courses[i];
                                                if (course.CourseId == parseInt($("#course").val())) {
                                                    if (temp.indexOf(course.LevelName) == -1) {
                                                        $("#level").append('<option value="' + course.CourseLevelId + '">' + course.LevelName + '</option>');
                                                        temp.push(course.LevelName)
                                                    }
                                                }

                                            }
                                        });
                                    });
                                    $("#level").change(function () {
                                        studentManager.GetStudentFeeByCourse($(this).val(), function (result) {
                                            if (result) {
                                                $("#RegistrationFee").val(result.RegistrationFee);
                                                $("#CourseFee").val(result.CourseFee);
                                                $("#KitFee").val(result.KitFee);
                                            }
                                        });
									
                                });
                            });
                            </script>
                        

                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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
        <link href="Skills%20Education%20Academy_files/tjquery-ui.css" rel="stylesheet">
        <script src="Skills%20Education%20Academy_files/jquery-students.js"></script>
        <script src="Skills%20Education%20Academy_files/jquery-ui.js"></script>
    </div>
    <footer><p>All right reserved by: <a href="#">FriendsFocus</a></p></footer>
</div>